@php
    $faveCards = [];
@endphp
<x-layout>
    <div class="p-5 bg-secondary">
        <h1 class="fw-bold text-center m-3 gagalinfont">Favorites</h1>
    </div>
    <div class="container py-5"> 
    @if ($faveCards.length == 0)
        <div class="container card w-75 pb-4">
            <div class="d-flex justify-content-center">
                <i class="fas fa-heart fa-10x mt-5"></i>
                
            </div>
            <p class="text-center fs-1 my-5">Your favorites list is currently empty!</p>
            <a href="/products" class="btn cardbtn mt-4 fs-4 rounded-pill w-100">Return to Products</a>
        </div>
    @else
        <div class="row justify-content-center px-3">
            @foreach ($menu as $fave)
                @if (in_array($fave->id, $faves))
                    @php
                        $faveCards[] = $fave
                    @endphp
                @else
                    @continue;
                @endif   
            @endforeach
            <x-menu-card :menu="$faveCards" :limit=0 :withCategory=FALSE :faves=$faves />
        </div>
    @endif
    </div>
</x-layout>