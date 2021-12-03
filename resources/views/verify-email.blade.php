<x-layout>
    <div class="homepage">
      @php
          $picName = "homepage"
      @endphp
    
    {{-- Preloader --}}
      {{-- <link rel="stylesheet" href="loader/loader.css">
      <script src="loader/loader.js"></script>
      <div class="loader-body" id="loader">
        <img src="assets\5thgen Logo.png" width="300px" height="300px" alt="" class="mb-5">
        <div class="loader"></div>
      </div> --}}
    
    <div class = "flex justify-center">
            <div class="w-6/12 p-4 rounded-lg bg-white">
                <p>Verification email has been sent</p>
                <form action="{{ route('verification.send') }}" method="post">
                    @csrf
                    <button type="submit" class="black text-white">Resend Email</button>
                </div>
            </div>
        </div>
    </x-layout>