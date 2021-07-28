@php
    $active = "active";
    $nope = '';
@endphp
<x-admin-layout :dash="$nope" :prod="$active" :ord="$nope">
    <main>
        <div class="container-fluid px-4">
            @if (!$edit)
                <div class="d-flex justify-content-between">
                    <h1 class="mt-4">All Products</h1>
                    <a href="/admin-edit-products" class="btn btn-primary btn-sm mt-4 mb-3 me-5 fs-4">Edit Stocks</a>
                </div>
                <div class="d-flex justify-content-center text-center">
                    <table class="table table-hover table-success table-bordered border border-3 border-dark" style="width: 70%">
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
                    <div class="d-flex justify-content-between">
                        <h1 class="mt-4">All Products</h1>
                        <button type="submit" class="btn btn-primary btn-sm mt-4 mb-3 me-5 fs-4">Done</button>
                    </div>
                    <div class="d-flex justify-content-center text-center">
                        <table class="table table-hover table-success table-bordered border border-3 border-dark" style="width: 70%">
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
                            </tbody>
                        </table>
                    </div>
                </form>
            @endif
        </div>
    </main>
</x-admin-layout>