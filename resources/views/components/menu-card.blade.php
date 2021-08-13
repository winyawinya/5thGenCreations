{{--
    Variables to pass pag gagamitin tong component
    $menu = Collection
    $limit = int
    $withCategory = boolean

--}}


{{-- Variables for Looping--}}
@php
    $lastitem = ""; $lastcategory=""; $x=0;
    $faveStatus = "favorite";
@endphp

@if (!empty($menu))
    
    @foreach ($menu as $item)
        
        @if ($withCategory == TRUE)
            @if($lastcategory !== $item->category)
                @if ($lastcategory !== '')
                    </div>
                @endif
                    <h3 class="my-2 kaushanfont">{{$item->category}}</h3>
                    <div class="row menurow d-flex justify-content-center">
                @php
                    $lastcategory = $item->category;   
                @endphp
            @endif        
        @endif
        @if ($item->name !== $lastitem)
            <div class="col-xl-6 col-12 my-3 menu-card">
                <div class="bg-white rounded-3 mt-2  border border-1" style="max-width: 780px; overflow: elipsis; border-color: #9aa7b2;">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <img src="assets\menu\{{$item->name}}.jpg" class="card-img" height="100%">
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card-body">
                                <div style="height: 13em;">
                                <h5 class="card-title gagalinfont fs-3 mb-3" style="color: #54b8b6; text-shadow: 0 0 3px gray">{{$item->name}}</h5>
                                    <p class="card-text lorafont me-xl-3 me-5" style="font-size: .85em;">{{$item->description}}</p>
                                </div>
                                <div class="d-flex mt-3">
                                    <p class="fw-bold lorafont redtext mt-2" style="font-size: .9em;">Starts at ₱{{$item->price}}</p>
                                    @php
                                        if(in_array($item->id, $faves)){
                                            $faveStatus = "unfavorite";
                                        }else{
                                            $faveStatus = "favorite";
                                        }
                                    @endphp
                                    @if ($item->stocks == 0)
                                        <p class="text-secondary mt-2 ms-auto" style="font-size: .75em;">Out of Stock</p>
                                        @auth
                                            <a href="/" class="mx-3 menuicon {{$faveStatus}}" data-bs-toggle="modal" data-bs-target="#{{$faveStatus.$x}}"><i class="fas fa-heart"></i></a>
                                        @else
                                            <a href="#" class="mx-3 menuicon favorite" data-bs-toggle="modal" data-bs-target="#loginKaMuna"><i class="fas fa-heart"></i></a>
                                        @endauth

                                    @else
                                        <div class="d-flex ms-auto">
                                        @auth
                                            <a href="/" class="mx-3 menuicon" data-bs-toggle="modal" data-bs-target="#MenuModal{{$x}}"><i class="fas fa-shopping-bag"></i></a>
                                            <a href="/" class="mx-3 menuicon {{$faveStatus}}" data-bs-toggle="modal" data-bs-target="#{{$faveStatus.$x}}"><i class="fas fa-heart"></i></a>
                                        @else
                                            <a href="/" class="mx-3 menuicon" data-bs-toggle="modal" data-bs-target="#loginKaMuna"><i class="fas fa-shopping-bag"></i></a>
                                            <a href="#" class="mx-3 menuicon favorite" data-bs-toggle="modal" data-bs-target="#loginKaMuna"><i class="fas fa-heart"></i></a>
                                        @endauth
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="longdiv redbg" style="height: 25px;"></div>
                </div>
            </div>

            {{-- Modals --}}
            <x-item-modal :currentItem="$menu" :item="$item" :x="$x" />
            <x-fave-modal :item="$item" :x="$x" />

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
            @continue
        @endif
    @endforeach

@else
    <div class="d-flex justify-content-center">
        <h1 class="text-center antonfont alert alert-danger p-5">We do not have such product</h1>
    </div>
@endif

<div class="modal fade" id="loginKaMuna" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content playfairfont">
        <div class="modal-body">
            <h1 class="text-center fw-bold py-3 text-danger">Sign in first to order!</h1>
        </div>
        <div class="d-flex justify-content-center pb-4">
            <a href="/login" class="btn nav-link fw-bold me-3">LOGIN</a>
            <a href="/register" class="btn nav-link fw-bold ms-3">REGISTER</a>
        </div>
        </div>
    </div>
</div>