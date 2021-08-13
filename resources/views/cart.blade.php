<x-layout>
  <div class="p-5 bg-secondary">
    <h1 class="fw-bold text-center m-3 gagalinfont">Cart</h1>
  </div>
  <div class="container-fluid py-5">
    @if ($cart->isNotEmpty())
    <div class="row px-4 justify-content-between">
      <div class="card col-lg-8 col-12 bg-white p-3 mb-3 mh-100">
        <h1 class="card-title mb-4">Items</h1>
        <div class="overflow-auto container">
          @foreach ($cart as $cartItem)
            @if (!$loop->first)
              <div class="container-fluid w-100" style="background: #d43535; height: 5px;"></div>
            @endif
            <x-cart-card :cartItem="$cartItem"/>
          @endforeach 
        </div>  
      </div>
      <div class="col-lg-4 col-12">
        <div class="card p-3">
          <h1 class="card-title">Summary</h1>
          <div class="card-body">
            @foreach ($cart as $cartItem)
              @php
                $size = explode(":",$cartItem->options->size);
                $flavor = explode(":",$cartItem->options->flavor);
              @endphp
              <div class="d-flex justify-content-between">
                <p class="fs-4">x{{$cartItem->qty}} {{$cartItem->name}} {{$size[1]}}</p class="fs-4">
                <p class="fs-4 ms-5">₱{{($cartItem->price)*($cartItem->qty)}}</p class="fs-4">
              </div>
            @endforeach    
          </div>
          <div class="card-footer bg-white">
            <div class="d-flex justify-content-between"><p class="fs-3">Total</p class="fs-3"><p class="fs-3">₱{{$total}}</p class="fs-3"></div>
            <a href="/checkout" class="btn cardbtn rounded-pill w-100 mt-4 fs-4">Checkout</a>
          </div>
        </div>
      </div>
    </div>
    @else
      <div class="container card rounded-3 w-75">
        <div class="d-flex justify-content-center">
          <i class="fas fa-shopping-bag fa-10x mt-5"></i>
        </div>
        <p class="text-center fs-1 my-5">Your cart is currently empty!</p>
        <a href="/products" class="btn cardbtn mt-4 fs-4 rounded-pill">Return to Products</a>
      </div>
    @endif
  </div>
  </x-layout>