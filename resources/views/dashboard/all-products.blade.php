@php
    $active = "active";
    $nope = '';
@endphp
<x-admin-layout :dash="$nope" :prod="$active" :ord="$nope">
    <main>
        <div class="container-fluid px-4">
            @if (!$edit)
            <div class="container-fluid-px-4">
                <h3 class="mt-4">5thGen Creations</h3>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li> 
                        <li class="breadcrumb-item active">All Products</li> 
                    </ol>
            <div class="row">
             <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Products </h4>
                        <a href="/admin-edit-products" class="btn btn-primary">Edit Stocks</a>
                    </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Stocks</th>
                            <th scope="col">Category</th>
                            <th scope="col">Name</th>
                            <th scope="col">Size</th>
                            <th scope="col">Flavor</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($products as $index=>$product)
                            @if ($product->stocks==0)
                                <tr class="table-danger table-bordered border border-1 border-dark">
                                    <th scope="row">{{$index+1}}</th>
                                    <td>{{$product->stocks}}</td>
                                    <td>{{$product->category}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->size}}</td>
                                    <td>{{$product->flavors}}</td>
                                </tr>
                            @else
                                <tr>
                                    <th scope="row">{{$index+1}}</th>
                                    <td>{{$product->stocks}}</td>
                                    <td>{{$product->category}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->size}}</td>
                                    <td>{{$product->flavors}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div> 
                @else
                <form action="{{route('afterEdit')}}" method="POST">
                    @csrf
                    <h3 class="mt-4">5thGen Creations</h3>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li> 
                        <li class="breadcrumb-item active">All Products</li> 
                    </ol>
            <div class="row">
             <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Products </h4>
                        <button type="submit" class="btn btn-primary">Done</button>
                    </div>
                    <div class="card-body">
                     <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Stocks</th>
                                <th scope="col">Category</th>
                                <th scope="col">Name</th>
                                <th scope="col">Size</th>
                                <th scope="col">Flavor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index=>$product)
                                @if ($product->stocks==0)
                                    <tr class="table-danger table-bordered border border-1 border-dark">
                                        <th scope="row">{{$index+1}}</th>
                                        <td><input type="number" class="border border-1 border-dark" name="{{$product->id}}" id="{{$product->id}}" value="{{$product->stocks}}"></td>
                                        <td>{{$product->category}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->size}}</td>
                                        <td>{{$product->flavors}}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <th scope="row">{{$index+1}}</th>
                                        <td><input type="number" name="{{$product->id}}" id="{{$product->id}}" value="{{$product->stocks}}"></td>
                                        <td>{{$product->category}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->size}}</td>
                                        <td>{{$product->flavors}}</td>
                                    </tr>
                                @endif
                            @endforeach
                </table>
            </div>
            @endif
            
        </div>
    </main>
</x-admin-layout>