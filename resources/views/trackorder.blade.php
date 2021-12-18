
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

                                            <td>
                                            @php 
                                                $total_grand = 0;
                                            @endphp
                                            @foreach ($items as $item)
                                            @if (!$item=="")
                                                @php
                                                    $item = explode('-', $item);
                                                    $price = explode(':', $item[2]);
                                                    $total += $price[0]*$item[1];

                                                    $grand_total = $price[0]*$item[1];

                                                    $total_grand = $total_grand+$grand_total;
                                                @endphp
                                            <h5>₱{{number_format($grand_total,2)}}</h5>
                                                @endif
                                             
                                        @endforeach 
                                        <hr class="m-0">
                                        <b>   Shipping fee :</b> ₱{{number_format($order->shipping_fee,2)}} <br class="m-0">
                                               <b> Grand total : </b> ₱{{number_format($total_grand+$order->shipping_fee,2)}}
                                    </td>
                                            <td>
                                                @if($order->status=='refund')
                                                    <b class="text-danger">Refund Request</b>
                                                @else
                                                <form action="/confirm" method="POST">
                                                    <a href="orderconfirmed" button type="button" name="order_confirm" value="{{$order->tracking_number}}"class="btn btn-success">Confirm</button></a>
                                                </form>
                                                <a class="btn btn-danger refund" data-id="{{$order->id}}">Ask for Refund</a>
                                                @endif
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
<script>
    $(document).ready(function(index){
        $(document).on('click','.refund',function(){
            var id = $(this).data('id');
            if (confirm('Are you sure you want to refund this?')) {
                $.post("{{route('home-functions',['id' => 'refund'])}}",{"_token": "{{ csrf_token() }}",id:id},function(){
                    location.reload();
                });
            }
        });
    });
</script>