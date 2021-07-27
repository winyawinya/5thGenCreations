{{--
    Variables to pass pag gagamitin tong component
    $menu = Collection
    $limit = int
    $withCategory = boolean

--}}


{{-- Variables for Looping--}}
@php
    $lastitem = ""; $lastcategory=""; $x=0;
@endphp
@if ($menu->isNotEmpty())
    
    @foreach ($menu as $item)
        
        @if ($withCategory == TRUE)
            <!-- check for category, pag nagbago category, matik next row agad with label pa  -->
            @if($lastcategory !== $item->category)
            <!-- check kung hindi eto yung unang category row, kasi pag hindi, iclose natin yung nauna bago tayo gumawa ng bagong row -->
                @if ($lastcategory !== '')
                </div>
                @endif
                <div class="longdiv" style="background: #89b0ae; height: 10px;"></div>
                <h3 class="my-2">{{$item->category}}</h3>
                <div class="container row menurow d-flex justify-content-center">
                @php
                $lastcategory = $item->category;   
                @endphp
            @endif        
        @endif
        
        <!-- check kung duplicate name dahil may iba ibang variants. unang variant lang dapat magpapakita -->
        @if ($item->name !== $lastitem)
            <div class="d-flex col-xxl-4 col-xl-5 col-7 my-3 mx-3">
                <div class="card mt-2" style="width: 400px; box-shadow: 10px 10px 3px grey;">
                    <img src="assets\menu\{{$item->name}}.jpg" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold bebasfont">{{$item->name}}</h5>
                    <p class="card-text uchenfont">{{$item->description}}</p>
                        <p class="fw-bold mt-auto float-end">Starts at ₱{{$item->price}}</p>
                    @auth
                        <a href="/" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MenuModal{{$x}}">Add to Cart</a>
                    @else
                        <a href="/" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginKaMuna">Add to Cart</a>
                    @endauth
                    
                    </div>
                </div>
            </div>
            <x-item-modal :currentItem="$menu" :item="$item" :x="$x" />
            
            @php
            $lastitem = $item->name;
            $x++;   
            @endphp
            @if ($limit != 0)
                @if ($x == $limit)
                    @break
                @endif
            @endif
        @else
            @php
            continue;   
            @endphp
        @endif
    @endforeach
@else
    <div class="d-flex justify-content-center">
        <h1 class="text-center antonfont alert alert-danger p-5">We do not have such product</h1>
    </div>
@endif
<div class="modal fade" id="loginKaMuna" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <h1 class="text-center fw-bold antonfont">Sign in first to order!</h1>
        </div>
        <div class="modal-footer">
          <a href="/login" class="btn btn-primary">Login</a>
          <a href="/register" class="btn btn-primary">Register</a>
        </div>
      </div>
    </div>
  </div>