@php
  $size = explode(":",$cartItem->options->size);
  $flavor = explode(":",$cartItem->options->flavor)
@endphp

<div class="card mb-3" style="width: 100%;">
  <div class="card-body row">
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-3 col-xl-3">
      <img src="\assets\menu\{{$cartItem->name}}.jpg" class="rounded-3" height="200px" width="250px">
    </div>
    <div class="col-xs-8 col-sm-8 col-md-4 col-lg-6 col-xl-6">
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
      <div class="col-1">
        <form action="{{route('remove')}}" method="POST">
          @csrf
          <input type="hidden" name="rowId" value="{{$cartItem->rowId}}"/>
          <button type="submit" class="btn btn-danger fs-5 me-3">Remove</button>
        </form>
      </div>
  </div>    
</div>