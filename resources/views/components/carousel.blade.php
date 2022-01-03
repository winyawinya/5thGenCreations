{{--
    Variables to pass
    $midButtons = boolean

--}}


<div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @if ($midButtons == true)
        <div class="carouselbuttons">
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
      @endif
    </div>

    <div class="carousel-inner">
      <div class="carousel-content playlistfont">
        
        <h1>Welcome<img src="assets\paint (2).png" class="splashpaint" style="top: -20%; left: -75%;"></h1>
        <h1>To<img src="assets\paint (2).png" class="splashpaint" style="top: 7%; left: -110%;"></h1>
        <h1>5thgen Creations!<img src="assets\paint (2).png" class="splashpaint" style="top: 30%; left: -55%; height: 10em;"></h1>
        <a href="/products" class="btn btn-danger mt-4 gagalinfont" style="font-size: 1.5em">Check out our Menu!</a>

      </div>
      <div class="carousel-item active">
        <img src="assets\menu\carousel\{{$picName}} (1).jpg" class="d-block carouselpic">
      </div>
      <div class="carousel-item">
        <img src="assets\menu\carousel\{{$picName}} (2).jpg" class="d-block carouselpic">
      </div>
      <div class="carousel-item">
        <img src="assets\menu\carousel\{{$picName}} (3).jpg" class="d-block carouselpic">
      </div>
    </div>
  </div>