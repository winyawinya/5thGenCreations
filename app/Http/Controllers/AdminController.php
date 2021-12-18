<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use Session;
use Validator;
use Auth;
use Cart;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AdminController extends Controller
{
    public function adminPanel()
    {
        return view('dashboard/admin', [
            'inStock' => Menu::where('stocks', '!=', 0)->get(),
            'outOfStock' => Menu::where('stocks', '=', 0)->get(),
        ]);
    }

    public function adminAllProducts()
    {
        return view('dashboard/all-products', [
            'products' => Menu::orderBy('category', 'DESC')->orderBy('name', 'DESC')->orderBy('created_at', "ASC")->get(),
            'edit' => FALSE
        ]);
    }

    public function adminOutProducts()
    {
        return view('dashboard/out-of-stock', [
            'products' => Menu::where('stocks', '=', 0)->get(),
        ]);
    }

    public function adminEditProducts()
    {
        return view('dashboard/all-products', [
            'products' => Menu::orderBy('category', 'DESC')->orderBy('name', 'DESC')->orderBy('created_at', "ASC")->get(),
            'edit' => TRUE
        ]);
    }
    
    public function submitEditProducts()
    {
        $x = request()->all();
        $menu = Menu::all();
        foreach ($menu as $item) {
            $item->stocks = $x[$item->id];
            $item->save();
        }
        return redirect('/admin-all-products');
    }   

    public function viewregister()
    {
        return view('components/viewregister', [
            'users' => User::all()
        ]);
    }

    public function pendingOrders()
    {

        return view('dashboard/pending-orders', [
            'users' => User::all(),
            'orders' => Orders::all(),
        ]);
    }

    public function deleteOrder()
    {
        $order = Orders::find(request()->input('id')); 
        $order->delete();
        
        return view('dashboard/pending-orders', [
            'users' => User::all(),
            'orders' => Orders::all(),
        ]);
    }

    public function completedOrders()
    {
        return view('dashboard/completed-orders', [
            'users' => User::all(),
            'orders' => Orders::all()
        ]);
    }

    public function orderCompleter()
    {
        
        //order complete
        $order = Orders::find(request()->input('id'));    
        $order->status = 'completed';
        $order->save();

        //minus stocks
        $items = explode('|', $order->items);
        $stockID = [];
        $stockQTY = [];
        foreach ($items as $item) {
            if (!$item=="") {
                $WOWGALENG = explode('-', $item);
                array_push($stockID, $WOWGALENG[4]);
                array_push($stockQTY, $WOWGALENG[1]);
            }
        }
        foreach ($stockID as $key=>$id) {
            $item = Menu::find($id);
            $item->stocks = ($item->stocks)-($stockQTY[$key]);
            $item->save();
        }
        

        return view('dashboard/completed-orders', [
            'users' => User::all(),
            'orders' => Orders::all()
        ]);
    }

    public function orderDetails(Request $request, $id)
    {
        
        return view('dashboard/order-details',[
            'order' => Orders::find($id), 
        ]);
    }

    public function adminaddproduct()
    {
        return view('components/adminaddproduct');
            
    }
    
}
