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
    
    <div class="bg-light p-5 m-5 rounded">
      <h1 class="my-5">Hello!</h1>
      
      @if (session('resent'))
          <div class="alert alert-success" role="alert">
              A fresh verification link has been sent to your email address.
          </div>
      @endif

      Before proceeding, please check your email for a verification link. If you did not receive the email,
      <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="d-inline btn btn-link p-0">
              click here to request another
          </button>.
      </form>
    </div>
</x-layout>