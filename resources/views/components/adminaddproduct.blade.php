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
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Category</label>
                            <select class="form-select" aria-label="Defaulf select example">
                                <option value="">SELECT A CATEGORY</option>
                                <option value="1">BANANA BREAD</option>
                                <option value="2">BROWNIES</option>
                                <option value="3">CAKES</option>
                                <option value="4">CHEESECAKES</option>
                                <option value="5">COOKIES</option>
                                <option value="6">TRUFFLES</option>

                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Variant</label>
                            <input type="text" class="form-control" name="variant">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Size</label>
                            <input type="text" class="form-control" name="size">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Flavors</label>
                            <input type="text" class="form-control" name="flavors">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Price</label>
                            <input type="text" class="form-control" name="price">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Allergens</label>
                            <input type="text" class="form-control" name="allergens">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Stocks</label>
                            <input type="number" class="form-control" name="stocks">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-11">
                            <input type="file" name="image" class="form-control">
                        </div><br><br><br>
                        <div class="col-md-5">
                            <button type="sumbit" class="btn btn-primary">Submit</button>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</main>
</x-admin-layout>