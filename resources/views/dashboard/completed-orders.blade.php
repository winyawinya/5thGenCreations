@php
    $active = "active";
    $nope = '';
@endphp
<x-admin-layout :dash="$nope" :prod="$nope" :ord="$active">
    <main>
        <h1 class="m-3">Completed Orders</h1>
        <div class="p-5 container row">
            @foreach ($orders as $order)
                @if ($order->status == "completed")
                    <div class="border border-success border-2 p-2 m-1 col-3">
                        @php
                            $item = explode('|', $order->items);
                            $orderID = $order->id;
                        @endphp
                        <h6><b>Tracking Number:</b> {{$order->tracking_number}}</h6>
                        <h6><b>Customer Name:</b> {{$order->name}}</h6>
                        <h6><b>Phone:</b> {{$order->phonenumber}}</h6>
                        <h6><b>Items:</b> {{count($item)-1}}</h6>
                        <a href="{{ route('orderDetails', $order->id) }}" class="btn btn-success float-end">View Details</a>
                    </div>
                @endif
            @endforeach
        </div>
    </main>
</x-admin-layout>