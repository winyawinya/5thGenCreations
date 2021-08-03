{{--
    Variables to pass pag gagamitin tong component
    $cartItem = collection
--}}
@php
  $size = explode(":",$cartItem->options->size);
  $flavor = explode(":",$cartItem->options->flavor);
@endphp
<div class="card mb-3 border-0">
  <div class="card-body row">
    <div class="col-12 col-lg-4 justify-content-center h-100">
      <img src="\assets\menu\{{$cartItem->name}}.jpg" class="rounded-3" height="100%" width="100%">
    </div>
    <div class="col-9 col-lg-4 col-xl-6 mt-3 mt-lg-0">
      <h5 class="card-title fs-2">{{$cartItem->name}}</h5>
      <p class="card-text fs-5">
        Quantity: {{$cartItem->qty}}
        <br>
        Price: {{$cartItem->price}}
      @if ($cartItem->options->flavor != "")
        <br>
        Flavor: {{$flavor[1]}}    
      @endif
        <br>
        Size: {{$size[1]}} 
      </p>
    </div>
      <div class="col-1 mt-3 mt-lg-0">
        <form action="{{route('remove')}}" method="POST">
          @csrf
          <input type="hidden" name="rowId" value="{{$cartItem->rowId}}"/>
          <button type="submit" class="btn btn-danger me-3 fs-5">Remove</button>
        </form>
      </div>
  </div>    
</div>