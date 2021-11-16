<x-layout>
    <div class="container"> 

            <div>
                <ul>
                  
                </ul>
            </div>

                
            </div>

        <div class="summary summary-checkout">
            <div class="summary-item details">   
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Basic Details</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="firstname">Name</label>
                                            <input type="text" name="name" id="name"  class="form-control" placeholder="Enter First Name" value="{{$user->name}}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{$user->email}}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phonenumber">Phone Number</label>
                                            <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Enter Phone Number" value="{{$user->phone_number}}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address"  value="{{$user->address}}" readonly>
                                        </div><br><br><br>
                                <hr>
                                    <h4 class="title-box"> Payment Method </h4>           
                                    <div class="choose-payment-methods">
                                      <label class="payment-method">
                                      <input name="payment-method" id="payment-method-cod" value="cod" type="radio">
                                         <span> Cash on Delivery </span>
                                      </label><br>
                                @error('paymentmode') <span class="text-danger">{{$message}} </span> @enderror
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Order Details</h4>
                                    <hr>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total<th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $cartItem)
                                            <tr>
                                                <td>{{$cartItem->name}}</td>
                                                <td>{{$cartItem->qty}}</td>
                                                <td>{{$cartItem->price}}</td>
                                                <td>₱{{($cartItem->price)*($cartItem->qty)}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <thead>
                                            <tr>
                                                 <th>Total<th>
                                                 <td><td>₱{{$total}}</td></td>
                                            </tr>
                                        </thead>
                                       
                                    </table>
                                    <hr>
                                    <a href="thankyou" class="btn cardbtn rounded-pill w-100 mt-4 fs-4">Place Order</a>
                                </div>
                            </div>
                        </div>
                    <div>
                </div>   
        </div>
    </div>
</x-layout>
