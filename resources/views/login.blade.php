<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8 col-xl-8 col-12 my-5 px-5 rounded-3 shadow-lg" style="
            background: #d8f3dc; 
            color: #425545;
            font-weight: bold;
            ">
                 @if (session()->has('registered'))
                    <div class="alert mt-4 alert-primary">{{session('registered')}}</div>
                 @endif
                <form action="/login" method="POST">
                    @csrf
                    <div class="px-5">
                        <div class="my-3 pt-3 text-center">
                            <h1 class="fw-bold antonfont">LOGIN</h1>
                        </div>
                        <div class="mb-3"> 
                            <label for="email" class="form-label fs-3 antonfont">Email address:</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailError" value="{{old('email')}}" name="email">
                            @error('email')
                                <div id="emailError" class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fs-3 antonfont">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="d-flex pb-4 align-items-center justify-content-end">
                            <button type="submit" class="btn btn-primary btn-lg">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>