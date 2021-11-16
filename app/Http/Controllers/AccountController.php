<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AccountController extends Controller
{

    public function showRegister()
    {
        return view('register');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login()
    {
        $userInfo = request()->validate([
           'email' => 'required|email|max:255',
           'password' => 'required'
        ]);

        if (Auth::attempt($userInfo)) {
            return redirect('/')->with('loginSuccess', 'You are now logged in');
        }

        return back()
                ->withInput()
                ->withErrors(['email'=>'The credentials you provided is wrong'])
    ;}

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    
    }

    public function register()
    {
        $userInfo = request()->validate([
            'name' => 'required|max:255|unique:users,name',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:8|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|digits:11',
            'birthday' => 'required|date',
           
            
            
        ]); 
        
                $userInfo['name'] = ucfirst($userInfo['name']);
                $userInfo['password'] = bcrypt($userInfo['password']);
                $userInfo['isAdmin'] = FALSE;
                $userInfo['favorites'] = '';
                $captcha = request()->validate([
                    'g-recaptcha-response' => function ($attribute, $value, $fail){
                        $secretKey = config('services.recaptcha.secret');
                        $response = $value;
                        $userIP = $_SERVER['REMOTE_ADDR']; 
                        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=&userIP";
                        $response = \file_get_contents($url);
                        $response = json_decode($response);
                        if(!$response->success){
                            Session::flash('g-recaptcha-response', 'Please check reCaptcha box!');
                            Session::flash('alert-class' , 'alert-danger');
                            $fail($attribute.'google reCaptcha failed!');
                        }
                    },
                ]);
                $user = User::create($userInfo);
                return redirect('/login')->with('registered', 'Your account has been created. Log in now to order!');

    }
    public function showProfile()
    {

        return view('profile', [
            'user' => Auth::user(),
            'edit' => FALSE
        ]);
    }

    public function editProfile()
    {

        return view('profile', [
            'user' => Auth::user(),
            'edit' => TRUE
        ]);
    }

    public function changedProfile()
    {
        $user = User::find(request()->id);
        $updateInfo = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|digits:11',
            'birthday' => 'required|date'
        ]);
        $updateInfo['name'] = ucfirst($updateInfo['name']);
        $user->name = request()->name;
        $user->email = request()->email;
        $user->address = request()->address;
        $user->phone_number = request()->phone_number;
        $user->birthday = request()->birthday;
        $user->save();
        return redirect('/profile')->with('profileUpdated', 'Your profile has been updated');
    }
}
