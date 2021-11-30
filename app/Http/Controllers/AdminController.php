<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\User;

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

    public function orders()
    {
        return view('components/orders', [
            'users' => User::all()
        ]);
    }
}
