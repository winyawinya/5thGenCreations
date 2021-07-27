<x-layout>
  @php
      $picName = "homepage"
  @endphp

  <div class="container maincontainer pt-2">

  <!-- carousel -->
    <x-carousel :midButtons=TRUE :picName="$picName"/>

  <!-- what's new -->
    <div class="container py-5 pt-2" style="background: #f2efed">
      <h2 class="text-start otomanopeefont">Bestsellers</h2>
      <div class="row d-flex justify-content-center">

          <x-menu-card :menu="$new" :limit=3 :withCategory=FALSE/>
        
      </div>
    </div>

  </div>

  <div class="container p-5 rounded-3" style="background: #d8f3dc; color: #ffc372;">
    <div class="container-fluid vh-10 longdiv" style="background: #d43535"></div>
    <div class="container-fluid py-5">
      <h1 class="fw-bold shadowText antonfont" style="font-size: 100px;">
        'PASTRIES <br> 
        LOVED BY <br> 
        EVERY <br> 
        GENERATION.'
      </h1>
    </div>
    <div class="container-fluid vh-10 longdiv" style="background: #d43535"></div>
  </div>
</x-layout>