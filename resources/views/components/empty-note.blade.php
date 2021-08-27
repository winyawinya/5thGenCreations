{{-- 
    Variables to Pass    
    $page = name of the page duh

--}}
@php
$pageName = '';
$iconName = '';
 
switch ($page) {
    case 'cart':
        $pageName = "cart";
        $iconName = "shopping-bag";
        break;
    case 'favorites':
        $pageName = "favorites list";
        $iconName = "heart";
        break;
}   
@endphp

<div class="container rounded-3 w-75 pb-5 text-center gagalinfont">
    <p><i class="fas fa-{{$iconName}} fa-10x"></i></p>
    <p class="fs-1 my-5">Your {{$pageName}} is currently empty!</p>
    <a href="/products" class="btn cardbtn mt-4 fs-4 rounded-pill"><i class="fas fa-cookie-bite"></i> Return to Products</a>
</div>