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
            <li class="breadcrumb-item active">Registered Users</li> 
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Registered User </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>USER ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                                <th>DELETE</th>
                            </tr>
                            <tbody>
                                @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone_number}}</td>
                                            <td>
                                                <form action="/delete" method="POST">
                                                    <button type="button" name="user_delete" value="{{$user->id}}"class="btn btn-success">Delete</button>
                                                </form>
                                            </td>
                                         </tr>
                                     
                                @endforeach


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