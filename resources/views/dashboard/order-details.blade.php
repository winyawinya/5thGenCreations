@php
    $active = "active";
    $nope = '';
    $items = explode('|', $order->items);
    $total = 0;
@endphp
<x-admin-layout :dash="$nope" :prod="$nope" :ord="$active">
    <main>
        <div class="container" style="padding:30px 0;">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                    <h4>Shipping Details</h4>
                </div>
                <div class="row">
                  <div class="d-flex">
                    <div class="p-3">
                      <h4><b>Tracking Number:</b> {{$order->tracking_number}}</h4>
                      <h4><b>Customer Name:</b> {{$order->name}}</h4>
                      <h4><b>Phone:</b> {{$order->phonenumber}}</h4>
                      <h4><b>Address:</b> {{$order->address}}</h4>
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                    <h4>Ordered Items</h4>
                </div>
                  <div class="row">
                    <div class="p-4">
                      @foreach ($items as $item)
                        @if (!$item=="")
                          @php
                            $item = explode('-', $item);
                            $size = explode(':', $item[2]);
                            $flavor = [];
                            if ($item[3] != '') {
                                $flavor = explode(':', $item[3]);
                                $flavor[1] = "-".$flavor[1];
                            }else{
                                $flavor[1] = "";
                            }
                          @endphp
                          <h4> Items</h4>
                          <h5>x{{$item[1]." ".$item[0]."-".$size[1].$flavor[1]}}</h5>
                        @endif
                      @endforeach
                    </div>
                    <div class="align-self-lg-baseline">
                      @foreach ($items as $item)
                        @if (!$item=="")
                          @php
                            $item = explode('-', $item);
                            $price = explode(':', $item[2]);
                            $total += $price[0]*$item[1];
                          @endphp
                          <h5>₱{{$price[0]*$item[1]}}</h5>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                    <h4>Transaction</h4>
                </div>
                <div class="row">
                  <div>
                  <h4 class="ps-5"><b>Shipping Fee:</b> ₱{{number_format($order->shipping_fee,2)}}<br></h4>
                    <h4 class="ps-5"><b>Total:</b> ₱{{$total+$order->shipping_fee}}<br></h4>
                    <h4 class="ps-5"><b>Status:</b> 
                          
                    {{ucfirst($order->status)}}
                    
                    <br></h4>
                    <h4 class="ps-5"><b>Payment Method:</b> {{$order->getAttribute('payment-method')}}</h4>
                    <h4 class="ps-5"><b>Delivery Method:</b> {{$order->getAttribute('delivery-method')}}</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @if ($order->status != 'completed')
            <div class="w-50 p-5">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Order</button><br><br>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#statusModal">Change Delivery Status</button><br><br>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#completeModal">Mark as Completed</button><br><br>
            </div>
        @endif
        </div>
    </main>
</x-admin-layout>

{{-- Modals --}}
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="statusModalLabel">Delivery Status</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <span style="font-size: 48px;">
                <i class="fas fa-mortar-pestle prepIcon"></i>
                <i class="fas fa-arrows-alt-h"></i>
                <i class="fas fa-truck otwIcon"></i>
                <i class="fas fa-arrows-alt-h"></i>
                <i class="fas fa-check-circle checkIcon"></i>
            </span>
            <h6 class="mt-1">Current Status: {{ucfirst($order->status)}}</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="completeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="completeModalLabel">Mark as Complete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <h5>Are you sure?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <form action="/completed-orders" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$order->id}}"/>
            <button type="submit" class="btn btn-primary">Confirm</button>
          </form> 
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <h5>Are you sure?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <form action="/pending-orders" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$order->id}}"/>
            <button type="submit" class="btn btn-primary">Confirm</button>
          </form> 
        </div>
      </div>
    </div>
  </div>