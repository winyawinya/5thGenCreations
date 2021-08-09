<!DOCTYPE html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>5thGen Creations</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <script src="https://use.fontawesome.com/26a6967f0b.js"></script>
      <link rel="stylesheet" href="/app.css">
    </head>
    <body>
      <!-- navigation bar -->
      <nav class="navbar hammersmithfont navbar-light bg-white sticky-top navbar-expand-lg">
        <div class="container">
          <a href="/" class="navbar-brand me-5"><img src="assets\5thgen Logo.png" width="100rem" height="100rem" alt=""></a>
          <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse collapse" id="navbar">
            <ul class="navbar-nav text-center">
              <li class="nav-item ms-0 ms-lg-3"><a href="/" class="nav-link">HOME</a></li>
              <li class="nav-item ms-0 ms-lg-3"><a href="/products" class="nav-link">PRODUCTS </a></li>
            </ul>
            <ul class="navbar-nav login text-center ms-auto me-lg-3">
              <li class="nav-item">
                @guest
                  <a href="/login" class="nav-link">LOGIN</a>
                @else
                  @if (auth()->user()->isAdmin)
                    <a href="/admin" class="nav-link">ADMIN</a>
                  @else
                    <a href="/profile" class="nav-link">PROFILE</a>
                  @endif
                @endguest
              </li>
              <li class="nav-item ms-0 ms-lg-3">
                @guest
                  <a href="/register" class="nav-link">REGISTER</a>
                @else
                  <a href="/logout" class="nav-link">LOGOUT</a>
                @endguest
                @auth
                  <li class="nav-item ms-0 ms-lg-3"><a href="/cart" class="nav-link"><i class="fas fa-shopping-bag"></i></a></li>
                @endauth
              </li>
            </ul>
            <form class="d-flex justify-content-center align-items-center flex-row" action="/products" method="GET">
              <input class="form-control searchbar" type="text" name="search" placeholder="&#xF002; SEARCH" aria-label="Search" value="{{request('search')}}">
            </form>
          </div>
        </div> 
      </nav>

      {{ $slot }}
      
    </body>
    <!-- footer -->
      <div class="container-fluid vh-10 longdiv" style="background: #d43535"></div>
      <div class="container-fluid vh-10 longdiv" style="background: #ffc372"></div>
      <div class="container-fluid py-5 mt-auto footer px-5">
        <div class="row d-flex">
          <div class="card footer col-3" style="width: 250px;">
            <div class="card-body">
              <h5 class="card-title fw-bold">GET HELP</h5>
              <br>
              <p class="card-text">Delivery</p>
              <p class="card-text">Payment Options</p><br>
              <h5 class="card-title fw-bold">CONTACT US</h5><br>
              <p class="card-text">0998 854 2435<br>Email:<br>geneviegabriel0331@gmail.com</p>
            </div>
          </div>
          <div class="card footer col-3" style="width: 200px;">
            <div class="card-body">
              <h5 class="card-title fw-bold">ADDRESS</h5>
              <br>
              <p class="card-text">173, Leo Pasig, Philippines
              <br><br>
              <h5 class="card-title fw-bold">OPENING HOURS</h5>
              <br>
              <p class="card-text">[Mon-Fri] 9:00am - 8:00pm</p>
            </div>
          </div>
          <div class="card footer text-center me-auto col-5" style="width: 400px;">
            <div class="card-body">
              <h5 class="card-title fw-bold">FOLLOW 5THGEN CREATIONS</h5>
              <br>
              <div class="d-flex justify-content-center fs-2">
                <i class="fab fa-facebook-f me-auto ms-auto"></i><i class="fab fa-twitter me-auto"></i>
                <i class="fab fa-instagram me-auto"></i><i class="fab fa-youtube me-auto"></i>
              </div>
            </div>
          </div>
          <div class="card footer me-5 col-5" style="width: 300px;">
            <div class="card-body">
              <br><br>
              <p class="card-text fw-bold">ABOUT US</p>
              <p class="card-text">5thgen Creations is a small baking business whisking
                since 2019. We offer different pastries like cookies,
                cheesecakes, brownies, banana breads and more other
                desserts freshly baked from the heart! ❤️</p>
              <button class="card-text fw-bold bg-dark text-white" data-bs-toggle="modal" data-bs-target="#facks">FAQs</button>
              <br><br><br>
              <h5 class="card-title fw-bold">SUBSCRIBE</h5>
              <br>
              <p class="card-text">Receive product news and updates on your email</p>
              <div class="d-flex"><input class="form-control" placeholder="Enter your email here..."><a href="font" class="btn btn-danger">
                <i class="fas fa-greater-than"></i>
              </a></div>
            </div>
          </div>
        </div>
      </div>     
      <div class="container-fluid d-flex align-items-center py-3 bg-white mb-auto">
        <i class="fas fa-map-marker-alt" style="font-size: 40px;"></i>
        <p class="fw-bold fs-6 ms-3 pt-3">Philippines</p>
        <p class="fs-6 ms-5 me-auto pt-3"><i class="fas fa-copyright"></i> 2021 5thgen CREATIONS. Inc. All Rights Reserved</p>
        <img src="assets\5thgen Logo.png" class="me-auto" width="60px" height="60px" alt="">
        <p class="fs-6 ms-auto me-5 pt-3">Terms of Use</p>
        <p class="fs-6 me-2 pt-3">Privacy Policy</p>
      </div>
</html>

<div class="modal fade" id="facks" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1 class="text-center fw-bold antonfont">FAQs</h1>
        <p class="fs-4">
          <b>1. Do you deliver?</b> <br>
          If you are around Pasig area, we deliver with scheduled day per week (Usually Wednesday or Friday) with a minimal fee of 50 pesos.
          <br>
          <b>2. Where are you located?</b><br>
          We are located at Pasig City near Cainta Boundary. You can check our location at Google maps/Waze: 173 Leo, Pasig
          <br>
          <b>3. How many days shall i pre-order?</b><br>
          For our small pastries, we highly suggest that you preorder at least 3 days before your preferred delivery date. For cakes, we recommend to pre-order 5 days before.</p>
      </div>
    </div>
  </div>
</div>