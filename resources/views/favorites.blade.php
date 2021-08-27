@php
    $faveCards = [];
@endphp
@foreach ($menu as $fave)
    @if (in_array($fave->id, $faves))
        @php
            $faveCards[] = $fave
        @endphp
    @else
        @continue;
    @endif   
@endforeach
<x-layout>
    <div class="p-5 bg-secondary">
        <h1 class="fw-bold text-center m-3 gagalinfont">Favorites</h1>
    </div>
    <div class="container py-5"> 
    @if (empty($faveCards))
        @php $page = 'favorites'; @endphp
        <x-empty-note :page="$page" />
    @else
        <div class="row justify-content-center px-3">
            <x-menu-card :menu="$faveCards" :limit=0 :withCategory=FALSE :faves=$faves :alternate=FALSE />
        </div>
    @endif
    </div>
</x-layout>