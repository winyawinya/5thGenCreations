@php
 $currentModalItemName=$item->name;
 $currentModalItemSizes=array();
 $currentModalItemFlavors=array();
 $currentModalItemPrices=array();

 foreach ($currentItem as $modalItem) {
   if ($modalItem->name == $item->name) {
    if (!in_array($modalItem->size, $currentModalItemSizes)) {
      array_push($currentModalItemSizes, $modalItem->size);
      $currentModalItemPrices[$modalItem->size]=$modalItem->price;    
    }
    if ($item->flavors != null) {
      if (!in_array($modalItem->flavors, $currentModalItemFlavors)) {
        array_push($currentModalItemFlavors, $modalItem->flavors);
        $currentModalItemPrices[$modalItem->flavors]=$modalItem->price;  
      } 
    }
  }
 }
@endphp


<script>
  function price(select, x) {
    var value = select.value;
    var priceDisplay = document.getElementsByClassName('price');
    var itemPrice = document.getElementsByClassName('itemPrice');
    var split = value.split(":")
    priceDisplay[x].innerHTML = "₱"+split[0];
    itemPrice[x].value = "₱"+split[0];
  }
</script>

<div class="modal fade" id="MenuModal{{$x}}" tabindex="-1" aria-labelledby="item-title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="item-title">{{$currentModalItemName}}</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('cartAdd')}}" method="POST">
        @csrf
      <div class="modal-body">
        <!-- MODAL CONTENT -->
        
          <img src="assets\menu\{{$item->name}}.jpg" alt="" height="100%" width="100%"/>
          <input type="hidden" name="id" value="{{$item->id}}"/>
          <input name="itemName" type="hidden" value="{{$currentModalItemName}}">{{-- FORM PASS --}}
          <h2 class="price">{{"₱". $item->price}}</h2>
          <h6>Allergens: {{$item->allegens}}</h6>
          <input name="itemPrice" type="hidden" class="h2 itemPrice" value="{{"₱". $item->price}}">{{-- FORM PASS --}}
          <h5 class="mt-2">Size</h5>
          <select class="form-select" name="itemSize" id="select{{$x}}" onchange="price(this, {{$x}})" name="sizeOption">{{-- FORM PASS --}}
            @foreach ($currentModalItemSizes as $size)
              @if ($item->flavor == null)
                <option value="{{$currentModalItemPrices[$size]}}:{{$size}}">{{$size}}</option>
              @else
                <option value="{{$size}}">{{$size}}</option>
              @endif
            @endforeach
          </select>
          
          @if ($item->flavors != null)
            <h5 class="mt-2">Flavor</h5>
            @if (count($currentModalItemSizes)==1)
              <select class="form-select" name="itemFlavor" onchange="price(this, {{$x}})">{{-- FORM PASS --}}
            @else
              <select class="form-select" name="itemFlavor">
            @endif
              @foreach ($currentModalItemFlavors as $flavor)
                <option value="{{$currentModalItemPrices[$flavor]}}:{{$flavor}}">{{$flavor}}</option>
              @endforeach
            </select>
          @else
            <input type="hidden" name="itemFlavor" value=""/>
          @endif
          
          <h5 class="mt-2">Quantity</h5>
          <input type="number" name="itemQuantity" id="itemQuantity" value="1"/>

          @if ($item->name == "Minimalist Cake")
            <h5 class="mt-2">Shape</h5>
            <select name="itemShape" id="" class="form-select"> {{-- FORM PASS --}}
              <option value="round">Round</option>
              <option value="heart">Heart</option>
            </select>
            <h5 class="mt-2">Describe the Design</h5>
            <input type="kita" class="form-control" id="userDesign" placeholder="Describe your desired design...">
            <h5 class="mt-2">Dedication Message</h5>
            <textarea class="form-control" name="itemMessage" rows="3" placeholder="ex. Birthday mo? Palibre!"></textarea>{{-- FORM PASS --}}
          @endif
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn cardbtn" data-bs-target="#cartSuccess" data-bs-toggle="modal" data-bs-dismiss="modal">
              Add to Cart
            </button>
        </div>
      </form>
    </div>
  </div>
</div>