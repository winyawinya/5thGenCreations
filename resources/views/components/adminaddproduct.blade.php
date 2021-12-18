@php
    $active = "active";
    $nope = '';
@endphp
<x-admin-layout :dash="$nope" :prod="$nope" :ord="$nope">
    <main>
    <div class="container-fluid-px-4">
    <h3 class="mt-4">5thGen Creations</h3>
    <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li> 
            <li class="breadcrumb-item active">Add New Product</li> 
    </ol>
    <div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add New Product</h4>
                </div>
                <form action="{{route('home-functions',['id' => 'add-product'])}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" required name="name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Category</label>
                            <select class="form-select" name="category" required aria-label="Defaulf select example">
                                <option value="">SELECT A CATEGORY</option>
                                <option value="BANANA BREAD">BANANA BREAD</option>
                    <option value="BROWNIES">BROWNIES</option>
                    <option value="CAKES">CAKES</option>
                    <option value="CHEESECAKES">CHEESECAKES</option>
                    <option value="COOKIES">COOKIES</option>
                    <option value="TRUFFLES">TRUFFLES</option>

                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Variant</label>
                            <input type="text" class="form-control" required name="variant">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Size</label>
                            <input type="text" class="form-control" required name="size">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Flavors</label>
                            <input type="text" class="form-control" required name="flavors">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Price</label>
                            <input type="text" class="form-control" required name="price">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Allergens</label>
                            <input type="text" class="form-control" required name="allergens">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Stocks</label>
                            <input type="number" class="form-control" required name="stocks">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" required rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-11">
                            <input type="file" name="image" required class="form-control">
                        </div><br><br><br>
                        <div class="col-md-5">
                            <button type="sumbit" class="btn btn-primary">Submit</button>
                        </div>
                    </div> 
</form>
                </div>
            </div>
        </div>
    </div>
</main>
</x-admin-layout>