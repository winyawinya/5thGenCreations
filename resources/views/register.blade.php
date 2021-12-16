<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8 col-xl-8 col-12 my-5 px-5 rounded-3 shadow-lg" style="
            background: #9fcef8; 
            color: #000000;
            font-weight: bold;
            ">
                <form action="/register" method="POST">
                    @csrf
                    <div class="px-5">
                        <div class="my-3 pt-5 text-center">
                            <h1 class="fw-bold playfairfont">REGISTER</h1>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label fs-3 playfairfont">Name:</label>
                            <input type="text" class="form-control" id="name" aria-describedby="nameError" value="{{old('name')}}" 
                            name="name">
                            @error('name')
                                <div id="nameError" class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3"> 
                            <label for="email" class="form-label fs-3 playfairfont">Email address:</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailError" value="{{old('email')}}" 
                            name="email">
                            @error('email')
                                <div id="emailError" class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fs-3 playfairfont">Password:</label>
                            <input type="password" class="form-control" id="password" aria-describedby="passError" 
                            name="password">
                            @error('password')
                                <div id="passError" class="form-text text-danger">{{$message}}</div>
                            @enderror 
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fs-3 playfairfont">Confirm Password:</label>
                            <input type="password" class="form-control" id="password_confirmation" aria-describedby="pass2Error"
                            name="password_confirmation">
                            @error('password')
                                <div id="pass2Error" class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label fs-3 playfairfont">Address:</label>
                            <input type="text" class="form-control" id="address" aria-describedby="addressError" value="{{old('address')}}"
                            name="address">
                            @error('address')
                                <div id="addressError" class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label fs-3 playfairfont">Phone Number:</label>
                            <input type="tel" class="form-control" id="phone_number" aria-describedby="phone_numberError" 
                            value="{{old('phone_number')}}" pattern="[0]{1}[9]{1}[0-9]{9}" placeholder="ex:09XXXXXXXXX"
                            name="phone_number">
                            @error('phone_number')
                                <div id="phone_numberError" class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label fs-3 playfairfont">Date of Birth:</label>
                            <input type="date" class="form-control" id="birthday" aria-describedby="birthdayError" value="{{old('birthday')}}"
                            name="birthday">
                            @error('birthday')
                                <div id="birthdayError" class="form-text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <br/>

               
                        <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>
                        @if(Session::has('g-recaptcha-response'))
                        <p class="alert {{Session::get('alert-class', 'alert-info')}}">
                        {{Session::get('g-recaptcha-response')}}
                        </p>
                        @endif
                        <br/><br/>
                     
                        
                        <div class="d-flex pb-4 align-items-center justify-content-end">
                           
                           <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
                    </div>
                </form>

            </div>
            <script type="text/javascript">
                var onloadCallback = function() {
                  alert("grecaptcha is ready!");
                };
            </script>
        </div>
    </div>
</x-layout>
