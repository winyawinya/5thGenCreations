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
                            <th scope="col">Action</th>
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
                                    <td align="center"><a class="btn btn-danger remove" data-id="{{$product->id}}"><span class="fa fa-times"></span></a>
                                   <a class="btn btn-warning update" data-id="{{$product->id}}"><span class="fa fa-pencil-alt text-white"></span></a></td>
                                </tr>
                            @else
                                <tr>
                                    <th scope="row">{{$index+1}}</th>
                                    <td>{{$product->stocks}}</td>
                                    <td>{{$product->category}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->size}}</td>
                                    <td>{{$product->flavors}}</td>
                                    <td align="center"><a class="btn btn-danger remove" data-id="{{$product->id}}"><span class="fa fa-times"></span></a>
                                    <a class="btn btn-warning update" data-id="{{$product->id}}"><span class="fa fa-pencil-alt text-white"></span></a></td>
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
        <div id="update-modal" class="modal fade" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title">Send Inquiry</h4>
        
      </div>
      <div class="modal-body">
      <form action="{{route('home-functions',['id' => 'update-product'])}}" method="POST" id="prodct-form" autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" required name="name">
                <input type="hidden" class="form-control" required name="product-id">
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
                <label for="">Description</label>
                <textarea name="description" required rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-11">
                <input type="file" name="image" class="form-control">
            </div>
        </div> 
      </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" form="prodct-form">Save Changes</button>
      </div>
    </div>

  </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
                $(document).ready(function(index){
                    $(document).on('click','.remove',function(){
                        var id = $(this).data('id');
                        if (confirm('Are you sure you want to delete this product?')) {
                                $.post("{{route('home-functions',['id' => 'delete-product'])}}",{"_token": "{{ csrf_token() }}",id:id},function(){
                                    location.reload();
                                });
                            }
                    });
                    $(document).on('click','.update',function(){
                        var id = $(this).data('id');
                        $('input[name="product-id"]').val(id);
                        $.post("{{route('home-functions',['id' => 'details-product'])}}",{"_token": "{{ csrf_token() }}",id:id},function(data){
                           $('input[name="name"]').val(data.name);
                           $('select[name="category"]').val(data.category);
                           $('input[name="variant"]').val(data.variant);
                           $('input[name="flavors"]').val(data.flavors);
                           $('input[name="price"]').val(data.price);
                           $('input[name="allergens"]').val(data.allegens);
                           $('input[name="stocks"]').val(data.stocks);
                           $('textarea[name="description"]').val(data.description);
                           $('input[name="size"]').val(data.size);
                        });
                        $('#update-modal').modal('show');
                    });
                });
            </script>
    </main>
</x-admin-layout>
