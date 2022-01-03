<x-layout>
    <div class="container"> 
        <div class="summary summary-checkout">
            <div class="summary-item details">   
                <div class="container mt-5">
                    <form action="{{route('home-functions',['id' => 'place-order'])}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Basic Details</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name"  class="form-control" placeholder="Enter First Name" value="{{ Auth::user()->name }}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{ Auth::user()->email }}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="phonenumber">Phone Number</label>
                                            <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Enter Phone Number" value="{{ Auth::user()->phone_number}}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="address">Address</label>
                                            <textarea type="text" class="form-control" name="address" rows="3" required placeholder="Enter Address">{{ Auth::user()->address}}</textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <br>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>City</label>
                                            <select class="form-control" name="city" required>
                                                <option value="">--Select City--</option>
                                                <option value="Mandaluyong" data-fee="120">Mandaluyong</option>
                                                <option value="Pasig" data-fee="50">Pasig</option>
                                                <option value="Cainta" data-fee="90">Cainta</option>
                                                <option value="Quezon City" data-fee="160">Quezon City</option>
                                                <option value="Makati" data-fee="100">Makati</option>
                                                <option value="Marikina" data-fee="120">Marikina</option>
                                                <option value="Pateros" data-fee="80">Pateros</option>
                                                <option value="Taguig" data-fee="100">Taguig</option>
                                            </select>
                                            <input class="form-control" name="fee" type="hidden" required  />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Barangay</label>
                                            <input class="form-control" name="barangay" required  />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                            <label>House #</label>
                                            <input class="form-control" name="house_num" required maxlength="10" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Lot / Blk</label>
                                            <input class="form-control" name="lot_blk" required maxlength="40"  />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Landmark</label>
                                            <input class="form-control" name="landmark" required  />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                        <br><br><br>
                                <hr>
                                    <h4 class="title-box"> Payment Method </h4>           
                                    <div class="choose-payment-methods">
                                      <label class="payment-method">
                                      <input name="payment-method" id="payment-method-cod" value="cod" required type="radio">
                                         <span> Cash on Delivery </span>
                                      </label><br>
                                    @error('paymentmode') <span class="text-danger">{{$message}} </span> @enderror
                                     </div><br>
                                     <hr>
                                    <h4 class="title-box"> Courier Delivery Options </h4>           
                                    <div class="choose-delivery-methods">
                                      <label class="delivery-method">
                                      <input name="delivery-method" id="delivery-method-cod" value="cod" required type="radio">
                                         <span> Own Courier </span><br>
                                       <input name="delivery-method" id="delivery-method-angkas" value="angkas" type="radio">
                                       <span> Angkas </span><br>
                                       <input name="delivery-method" id="delivery-method-lalamove" value="lalamove" type="radio">
                                       <span> Lalamove </span><br>
                                       <input name="delivery-method" id="delivery-method-toktok" value="toktok" type="radio">
                                       <span> Toktok </span><br>
                                      </label><br>
                                    @error('deliverymode') <span class="text-danger">{{$message}} </span> @enderror
                                     </div>
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
                                                 <th colspan="2">Delivery Charge<th>
                                                 <td>₱<span id="fee">0</span></td>
                                            </tr>
                                            <tr>
                                                 <th colspan="2">Total<th>
                                                 <td>₱<span id="total">{{$total}}</span></td>
                                            </tr>
                                        </thead>
                                       
                                    </table>
                                    <hr>
                                    <input class="form-control" type="hidden" name="grand_total" value="{{$total+50}}"/>
                                    <button type="submit" class="btn cardbtn rounded-pill w-100 mt-4 fs-4">Place Order</button>
                                </div>
                            </div>
                        </div>
                    <div>
                </div>   
        </div>
</form>
    </div>
    <br><br>
</x-layout>
<script>
    $(document).ready(function(index){
        $(document).on('change','select[name="city"]',function(){
            var city = $(this).find(':selected').val();
            var fee = $(this).find(':selected').data('fee');
            var total = $('#total').text();
            var grand_total = parseFloat(fee)+parseFloat(total);
            $('input[name="fee"]').val(fee);
            $('#fee').text(fee);
            $('#total').text(grand_total);
        });
    });
</script>
