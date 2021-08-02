<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Gloudemans\Shoppingcart\Facades\Cart;

class MenuController extends Controller
{

    public function HomePage()
    {
        return view('welcome', [
            'new' => Menu::orderBy('category', 'DESC')->orderBy('name', 'DESC')->orderBy('created_at', "ASC")->get()
        ]); 
    }


    public function MenuPage()
    {
        return view('menu', [
            'menu' => Menu::filter(request(['search']))->orderBy('category', 'DESC')->orderBy('name', 'DESC')->get()
        ]);
    }

    public function fonts()
    {
        return view('font');
    }

}
