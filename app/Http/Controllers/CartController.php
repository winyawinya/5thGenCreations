<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Gloudemans\Shoppingcart\Facades\Cart;
use function GuzzleHttp\Promise\all;
use Auth;
use Session;
use PDF;
use App\Models\Product;
use App\Models\OrderDetail;
class CartController extends Controller
{

    public function showCart()
    {
        
        return view('cart', [
            'cart' => Cart::content(),
            'total' => Cart::subtotal()
        ]);
    }

    public function addToCart(Request $request)
    {   
        
        $id = $request->id;
        $name = $request->itemName;
        $quantity = intval($request->itemQuantity);
        $price = ltrim($request->itemPrice, '₱');
        $size = $request->itemSize;
        $flavor = $request->itemFlavor;
        Cart::add($id, $name, $quantity, $price, 0, ['size' => $size, 'flavor' => $flavor]);
        return redirect(route('products-data'));
    }

    public function remove(Request $request)
    {
        Cart::remove($request->rowId);
        return redirect('cart');
    }

    public function checkout()
    {
        return view('checkout', [
            'cart' => Cart::content(),
            'total' => Cart::subtotal()
        ]);
    }
    public function showFunctions(Request $request,$postMode){
        $data = $request->all();
        $user = Auth::user();
        if($request->ajax()){
            if($postMode=='update-cart'){
                $selectCart =  Cart::content();
                $selectQuery =   $selectCart[$data['id']];
                $selectQuery->qty = $data['qty'];
                $selectQuery->update();
                return $selectQuery;
            }elseif($postMode=='refund'){
                $updateOrder = Orders::find($data['id']);
                $updateOrder->status = 'refund';
                $updateOrder->save();
            }elseif($postMode=='delete-product'){
                $delteProduct = Product::where('id',$data['id'])->delete();
            }elseif($postMode=='details-product'){
                $selectQuery = Product::find($data['id']);

                return $selectQuery;
            }else{
                return array('success' => 0, 'message' => 'Undefined Method');
            }
           
        }else{
            if($postMode=='place-order'){
                $cart = Cart::content();
                $itemsDB = "";
        
                foreach ($cart as $item) {
                    $itemsDB .= $item->name."-".$item->qty."-".$item->options->size."-".$item->options->flavor."-".$item->id."|";
                }
                $order = Orders::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'phonenumber' => $user->phone_number,
                    'address' => $data['address'],
                    'city'=>$data['city'],
                    'house_number'=>$data['house_num'],
                    'lot_blk'=>$data['lot_blk'],
                    'barangay'=>$data['barangay'],
                    'landmark'=>$data['landmark'],
                    'payment-method' => "COD",
                    'delivery-method' => "Own Courier",
                    'tracking_number' => rand(1111111111,9999999999),
                    'items' => $itemsDB,
                    'grand_total'=>$data['grand_total'],
                    'shipping_fee'=>$data['fee']
                ]); 
               
                return redirect(route('thankyou'));
            }elseif($postMode=='send-inquiry'){
                $message = '
                <b>Name: </b> '.$data['fullname'].' <br>
                <b>Email: </b> '.$data['email'].'<br>
                <b>Reason: </b> '.$data['reason'].'<br>
                <b>Message: </b> '.$data['message'].'<br>
                ';
                $layout = array(
                    'receiver' => array($data['email'],'5thgencreates@gmail.com'),
                    'name' => '5th Gen Creations',
                    'from' =>'5thgencreates@gmail.com',
                    'messageData' => $message,
                    'subject' => '5th Gen Creations Inquiry',
                    'template' => 'email_panel', 
                );
                $resultEmail  = sendEmails($layout,'5thgencreates@gmail.com','5th Gen Creations');
                if($resultEmail===true){
                    
                    
                }
                Session::flash('success', 1);
                    Session::flash('message', 'Email has been sent please wait in your Gmail account for sellers reply');
                return back();
            }elseif($postMode=='add-product'){
                $addProduct = new Product();
                $addProduct->name = $data['name'];
                $addProduct->category = $data['category'];
                $addProduct->variant = $data['variant'];
                $addProduct->size = $data['size'];
                $addProduct->flavors = $data['flavors'];
                $addProduct->price = $data['price'];
                $addProduct->allegens = $data['allergens'];
                $addProduct->description = $data['description'];
                $addProduct->stocks = $data['stocks'];
                if($addProduct->save()){
                    $filename= $data['name'];
                    $destination  = 'assets/menu/';
                    $file = $data['image'];
                    $isExist = isExistFile($destination.''.$filename); 
                    if ($isExist['is_exist'] == true){
                        unlink($isExist['path']);
                    }
                    $result = fileStorageUpload($file,$destination,$filename,'resize','','');
                }
                return back();
            }elseif($postMode=='update-product'){
                $addProduct = Product::find($data['product-id']);
                $addProduct->name = $data['name'];
                $addProduct->category = $data['category'];
                $addProduct->variant = $data['variant'];
                $addProduct->size = $data['size'];
                $addProduct->flavors = $data['flavors'];
                $addProduct->price = $data['price'];
                $addProduct->allegens = $data['allergens'];
                $addProduct->description = $data['description'];
                if($addProduct->save()){
                    if(isset($data['image'])){
                        $filename= $data['name'];
                        $destination  = 'assets/menu/';
                        $file = $data['image'];
                        $isExist = isExistFile($destination.''.$filename); 
                        if ($isExist['is_exist'] == true){
                            unlink($isExist['path']);
                        }
                        $result = fileStorageUpload($file,$destination,$filename,'resize','','');
                    }
                }
                return back();
            }else{
                Session::flash('success', 0);
                Session::flash('message', 'Undefined method please try again');
                return back();
            }
            
        }
    }
    public function print_orders(Request $request){
        $user = Auth::user();
        $data = $request->all();
        $selectQuery = Orders::whereBetween('created_at', [$data['start-date'], $data['end-date']])->where('city',$data['city'])->get();

        $pdf = PDF::loadView('print_order', array('selectQuery'=>$selectQuery,'data'=>$data));
        return $pdf->stream();
    }
}
