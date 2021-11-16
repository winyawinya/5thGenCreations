<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckoutComponent extends Component
{

    public $paymentmode;
    public $thankyou;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'paymentmode' => 'required'
        
        ]);
}
    public function placeorder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'paymentmode' => 'required'
        
        ]);
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->total = session()->get('checkout')['subtotal'];
        $order->firstname = $this->firstname;
        $order->lastnamename = $this->lastname;
        $order->email = $this->email;
        $order->phone = $this->phone;
        $order->address = $this->address;
        $order->zipcode = $this->zipcode;
        $order->city = $this->city;
        $order->status = 'ordered';
        $order->save();


        foreach(cart::instance('cart')->content()as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        $shipping = new Shipping();
        $shipping->order_id = $order_id;
        $shipping->firstname = $this->firstname;
        $shipping->lastnamename = $this->lastname;
        $shipping->email = $this->email;
        $shipping->phone = $this->phone;
        $shipping->address = $this->address;
        $shipping->zipcode = $this->zipcode;
        $shipping->city = $this->city;
        $shipping->save();
    

     if($this->paymentmode == 'cod')
        {
            $transaction = new Transcation();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }
 
        $this->thankyou = 1;
        Cart::intance('cart')->destroy();
        session()->forget('checkout');
    }

    public function verifyforCheckout()
    {
        if(Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route("thankyou");
        }
        else if(@session()->get('checkout'))
        {
            return redirect()->route('cart');
        }
    }
    
    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
