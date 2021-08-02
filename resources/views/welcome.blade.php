<x-layout>
  @php
      $picName = "homepage"
  @endphp

{{-- Preloader --}}
  <link rel="stylesheet" href="loader/loader.css">
  <script src="loader/loader.js"></script>
  <div class="loader-body" id="loader">
    <img src="assets\5thgen Logo.png" width="300px" height="300px" alt="" class="mb-5">
    <div class="loader"></div>
  </div>

<!-- carousel -->
  <x-carousel :midButtons=TRUE :picName="$picName"/>  
  <div class="container-fluid py-4" style="background: #d8f3dc; color: #ffc372; text-shadow: 3px 3px 3px black;">
    <h1 class="text-center otomanopeefont">BESTSELLERS</h1>
  </div>
  <div class="container-fluid">
<!-- Bestsellers -->
    <div class="container py-3">
      <div class="row d-flex justify-content-center">

          <x-menu-card :menu="$new" :limit=3 :withCategory=FALSE/>
        
      </div>
    </div>
  </div>

  <div class="container-fluid p-5 rounded-3" style="background: #d8f3dc; color: #ffc372;">
    <div class="container-fluid vh-10 longdiv" style="background: #d43535"></div>
    <div class="container-fluid py-5">
      <h1 class="fw-bold shadowText antonfont" style="font-size: 8vmax;">
        'PASTRIES <br> 
        LOVED BY <br> 
        EVERY <br> 
        GENERATION.'
      </h1>
    </div>
    <div class="container-fluid vh-10 longdiv" style="background: #d43535"></div>
  </div>
</x-layout>