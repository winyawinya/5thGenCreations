{{--
    Variables to pass pag gagamitin tong component
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
      <!-- NOTE! Kung iibahin niyo yung carousel images, iresize niyo yung MISMONG image na ipapalit gamit MS Paint. -->
      <!-- yung ginawa ko is HEIGHT = 1200px and WIDTH = 450px, kung gusto niyo ibahin size make sure pareparehas ng size lahat. -->
      <div class="carousel-content">
        <h1 style="font-size: 8vw;">
          Welcome <br>
          To <br>
          5thgen Creations!
        </h1>
        <a href="/products" class="btn btn-danger mt-4" style="font-size: 1.5vmax">Check out our Menu!</a>
      </div>
      <div class="carousel-item active">
        <img src="assets\menu\carousel\{{$picName}}1.jpg" class="d-block w-100 carouselpic" alt="...">
        
      </div>
      <div class="carousel-item">
        <img src="assets\menu\carousel\{{$picName}}2.jpg" class="d-block w-100 carouselpic" alt="...">
      </div>
      <div class="carousel-item">
        <img src="assets\menu\carousel\{{$picName}}3.jpg" class="d-block w-100 carouselpic" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>