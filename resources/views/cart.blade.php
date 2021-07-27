<x-layout>
    <div class="container maincontainer py-2">
      <h1 class="fw-bold mb-4">Cart</h1>
          <div class="row">
            @if ($cart->count() != 0)
                <div class="container col-8 col-md-11 col-sm-12">   
                    @foreach ($cart as $cartItem)
                        <x-cart-card :cartItem="$cartItem"/>
                    @endforeach
                    
            @else
            <div class="container">
              <div class="row p-5 justify-content-center">
                  <div class="col-md-8 col-lg-8 col-xl-8 col-12 my-5 p-5 rounded-3 shadow-lg" style="
                  background: #d8f3dc; 
                  color: #425545;
                  font-weight: bold;
                  "><h1 class="text-center p-5 antonfont">CART IS EMPTY</h1>
                  </div>
              </div>
            @endif
            </div>
          </div>
          @if ($cart->count() != 0)
            <div class="d-flex justify-content-end">
              <button class="btn btn-primary fs-3">Checkout</button>
            </div>
          @endif
    </div>
  </x-layout>