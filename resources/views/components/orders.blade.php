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
            <li class="breadcrumb-item active">All Orders</li> 
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Orders </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ORDER ID</th>
                                <th>NAME</th>
                                <th>PRODUCT</th>
                                <th>PRICE</th>
                                <th>TOTAL</th>
                                <th>EMAIL</th>
                            </tr>
                            <tbody>
                               
                            </tbody>
                        </thead>
                       
                     </table>
                 </div>
             </div>
         </div>
    </div>
</div>
</main>
</x-admin-layout>