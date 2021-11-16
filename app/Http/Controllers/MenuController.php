<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;


class MenuController extends Controller
{

    public function HomePage()
    {
        if(Auth::check()){
            $user = Auth::user()->favorites;
            $faveID = explode(',',$user);
        }else{
            $faveID = [];
        }
        return view('welcome', [
            'faves' => $faveID,
            'new' => Menu::orderBy('category', 'DESC')->orderBy('created_at', 'DESC')->orderBy('name', "ASC")->orderBy('id', "ASC")->get()
        ]); 
    }


    public function MenuPage()
    {
        
        if(Auth::check()){
            $user = Auth::user()->favorites;
            $faveID = explode(',',$user);
        }else{
            $faveID = [];
        }
        return view('menu', [
            'faves' => $faveID,
            'menu' => Menu::filter(request(['search']))->orderBy('category', 'DESC')->orderBy('name', 'DESC')->get()
        ]);
    }

    public function fonts()
    {
        return view('font');
    }

    public function favorites()
    {
        $user = Auth::user()->favorites;
        $faveID = explode(',',$user);
        return view('favorites',[
            'faves' => $faveID,
            'menu' => Menu::orderBy('id', 'ASC')->get()
        ]);
    }

    public function changeFave()
    {
        $id = request()->id . ",";
        $userID = Auth::user()->id;
        $user = User::find($userID);
        
        if(request()->status == 'add'){
            $user->favorites = substr_replace($user->favorites,$id,0,0);
            
        }
        if(request()->status == 'remove'){
            $user->favorites = str_replace($id,'',$user->favorites);
        }

        $user->save();
        return redirect('/favorites');
    }

    public function checkout()
    {
        return view('checkout',['user'=> Auth::user(),
        'cart' => Cart::content(),
        'total' => Cart::subtotal()
    ]);
    }


}
