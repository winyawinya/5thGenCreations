@php
    $active = "active";
    $nope = '';
@endphp
<x-admin-layout :dash="$nope" :prod="$active" :ord="$nope">
    <main>
    <div class="container-fluid-px-4">
                <h3 class="mt-4">5thGen Creations</h3>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li> 
                        <li class="breadcrumb-item active">Out of Stocks</li> 
                    </ol>
            <div class="row">
             <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Out of Stocks</h4>
                <a href="/admin-edit-products" class="btn btn-primary">Edit Stocks</a>
            </div>
            <div class="d-flex justify-content-center text-center">
                @if ($products->isEmpty())
                    <div class="alert alert-success p-5 mt-5"><h1>You have no Out-of-Stock products!</h1></div>
                @else
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
                            <tr class="table-danger table-bordered border border-1 border-dark">
                                <th scope="row">{{$index+1}}</th>
                                <td>{{$product->stocks}}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->size}}</td>
                                <td>{{$product->flavors}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div> 
    </main>
</x-admin-layout>