<x-layout>
    <div class="container my-3 p-5 rounded-3 shadow-lg">
    @if($edit == FALSE)
        @if (session()->has('profileUpdated'))
            <div class="alert mt-4 alert-primary">{{session('profileUpdated')}}</div>
        @endif

    <section class="py-3W">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h1 class="fw-bold"> My Profile</h1>
        <hr> 
        <form action="">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{$user->name}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" value="{{$user->email}}">
                    </div>
                </div>
                <div class="col-md-13">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" value="{{$user->address}}">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control" value="{{$user->phone_number}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Birthday</label>
                        <input type="text" class="form-control" value="{{$user->birthday}}">
                    </div>
                </div>
                <a href="/edit-profile" class="btn btn-lg btn-secondary my-3">Edit Profile</a>
            </div>
        </form>
                </div>
            </div>
        </div>
    </section>

    @else
        <h1 class="fw-bold">Edit Profile</h1>
        <div class="container ms-4 pe-4">
            <form action="/profile" method="POST">
                @csrf
                <h2 class="fw-bold">Name: </h2>
                <input type="text" name="name" id="name" class="form-control ms-3" value="{{$user->name}}">
                @error('name')
                    <div id="nameError" class="form-text text-danger">{{$message}}</div>
                @enderror
                <h2 class="fw-bold">Email: </h2>
                <input type="text" name="email" id="email" class="form-control ms-3" value="{{$user->email}}">
                @error('email')
                    <div id="emailError" class="form-text text-danger">{{$message}}</div>
                @enderror
                <h2 class="fw-bold">Address: </h2>
                <input type="text" name="address" id="address" class="form-control ms-3" value="{{$user->address}}">
                @error('address')
                    <div id="addressError" class="form-text text-danger">{{$message}}</div>
                @enderror
                <h2 class="fw-bold">Phone Number: </h2>
                <input type="text" name="phone_number" id="phone_number" class="form-control ms-3" value="{{$user->phone_number}}">
                @error('phone_number')
                    <div id="phone_numberError" class="form-text text-danger">{{$message}}</div>
                @enderror
                <h2 class="fw-bold">Birthday: </h2>
                <input type="date" name="birthday" id="birthday" class="form-control ms-3" value="{{$user->birthday}}">
                @error('birthday')
                    <div id="birthdayError" class="form-text text-danger">{{$message}}</div>
                @enderror
                <input type="hidden" name="id" value="{{$user->id}}">
                <button type="submit" class="btn btn-lg btn-secondary my-3">Done</button>
            </form>
        </div>
     @endif
    </div>
</x-layout>