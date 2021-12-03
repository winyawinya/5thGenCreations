
<x-layout>
<div class="p-5 bg-secondary">
        <h1 class="fw-bold text-center m-3 gagalinfont">Track Order</h1>
    </div>
    
<div class="container py-5"> 
    <center>
        

        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h5><id="userProfile" ></i>HI, {{strtoupper(auth()->user()->name)}}</h5>
                <h6>Check you order details</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>TRACKING NUMBER</th>
                                <th>NAME</th>
                                <th>PAYMENT METHOD</th>
                                <th>DELIVERY METHOD</th>
                                <th>ITEMS</th>
                                <th>TOTAL</th>
                                <th>ORDER RECEIVED</th> 
                            </tr>
                            <tbody>
                                @foreach($orders as $order)
                                    @php
                                        $items = explode('|', $order->items);
                                        $total = 0;
                                    @endphp

                                        <tr>
                                            <td>{{$order->tracking_number}}</td>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->getAttribute('payment-method')}}</td>
                                            <td>{{$order->getAttribute('delivery-method')}}</td>

                                            <td> @foreach ($items as $item)
                                            
                                             @if (!$item=="")
                                                  @php
                                                     $item = explode('-', $item);
                                                     $size = explode(':', $item[2]);
                                                @endphp
                                            <h5>x{{$item[1]." ".$item[0]."-".$size[1]}}</h5>
                                            @endif
                                        @endforeach </td>

                                            <td>@foreach ($items as $item)
                                            @if (!$item=="")
                                                @php
                                                    $item = explode('-', $item);
                                                    $price = explode(':', $item[2]);
                                                    $total += $price[0]*$item[1];
                                                @endphp
                                            <h5>₱{{$price[0]*$item[1]}}</h5>
                                                @endif
                                        @endforeach</td>
                                            <td>
                                                <form action="/confirm" method="POST">
                                                    <a href="orderconfirmed" button type="button" name="order_confirm" value="{{$order->tracking_number}}"class="btn btn-success">Confirm</button></a>
                                                </form>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </thead>
                       
                     </table>
                 </div>
             </div>
         </div>
    </div>
 </div>
</x-layout>