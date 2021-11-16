<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>5thGen Creations</title>
    <link rel="icon" href="assets\5thgen Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/26a6967f0b.js">
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="/app.css">
    @livewireStyles
    <script>
    $(document).ready(function(){
      $("#myBtn").click(function(){
        $("#myModal").modal("show");
      });
    });
</script>
  </head>
  <body>
    <!-- navigation bar -->
    <nav class="navbar hammersmithfont navbar-light bg-white sticky-top navbar-expand-lg pb-3 pb-lg-0">
      <div class="container">
        <a href="/" class="navbar-brand me-5"><img src="assets\5thgen Logo.png" width="100rem" height="100rem" alt=""></a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="navbar-nav text-center">
            <li class="nav-item ms-0 ms-lg-3"><a href="/" class="nav-link">HOME</a></li>
            <li class="nav-item ms-0 ms-lg-3"><a href="/products" class="nav-link">PRODUCTS</a></li>
          </ul>
          <ul class="navbar-nav login text-center ms-auto me-lg-3">
            @guest
            <li class="nav-item">
              <a href="/login" class="nav-link">LOGIN</i></a>
            </li>
            <li class="nav-item">
              <a href="/register" class="nav-link">REGISTER</a>
            </li>
            @endguest
            @auth
              @if (auth()->user()->isAdmin)
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link" id="adminProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-shield navicon"></i></a>
                  <ul class="dropdown-menu" aria-labelledby="adminProfile">
                    <li><a class="dropdown-item" href="/admin">Admin Panel</a></li>
                    <li><a class="dropdown-item" href="#">Favorites</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                  </ul>
                </li>
              @else
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link" id="userProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user navicon me-2"></i>HI, {{strtoupper(auth()->user()->name)}}</a>
                  <ul class="dropdown-menu" aria-labelledby="userProfile">
                    <li><a class="dropdown-item" href="/profile"><i class="fas fa-address-card navicon me-1"></i>My Profile</a></li>
                    <li><a class="dropdown-item" href="/favorites"><i class="fas fa-heart navicon me-1"></i>Favorites</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                  </ul>
                </li>
              @endif
              <li class="nav-item ms-lg-4"><a href="/cart" class="nav-link"><i class="fas fa-shopping-bag navicon me-2"></i>CART</a></li>
            @endauth
            <form class="d-flex justify-content-center align-items-center flex-row ms-lg-3" action="/products" method="GET">
              <input class="form-control searchbar" type="text" name="search" placeholder="&#xF002; SEARCH" aria-label="Search" value="{{request('search')}}">
            </form>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid longdiv" style="background: #4fd6ef; height: 10px; position: fixed; z-index: 21;"></div> 
    

    {{ $slot }}
    
    @livewireScripts
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
          <p class="card-text">Payment Options<br>Cash on Delivery</p>
          <h5 class="card-title fw-bold">CONTACT US</h5><br>
          <p class="card-text">Phone Number:<br> 0998 854 2435 <br>Email:<br>5thgencreates@gmail.com</p>
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
          <p class="card-text">[Mon-Sat] 9:00am - 8:00pm</p>
        </div>
      </div>
      <div class="card footer text-center me-auto col-5" style="width: 400px;">
        <div class="card-body">
          <h5 class="card-title fw-bold">FOLLOW 5THGEN CREATIONS</h5>
          <br>
          <div class="d-flex justify-content-center fs-2">
            <a href="https://www.facebook.com/5thgenCreate" class="fab fa-facebook-f me-auto ms-auto"></a>
            <a href="https://www.instagram.com/5thgencreations_/" class="fab fa-instagram me-auto"></a>
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
        </div>
      </div>
    </div>
  </div>     
  <div class="container-fluid row align-items-center py-3 bg-white mb-auto">
    <div class="col-lg-1 col-6 d-flex">
      <i class="fas fa-map-marker-alt" style="font-size: 40px;"></i>
      <p class="fw-bold fs-6 ms-3 pt-3">Philippines</p>
    </div>
    <div class="col-lg-5 col-6 d-flex">
      <p class="fs-6 ms-5 me-auto pt-3"><i class="fas fa-copyright"></i> 2021 5thgen CREATIONS. Inc. All Rights Reserved</p>
    </div>
    <div class="col-lg-2 col-6 d-flex">
      <img src="assets\5thgen Logo.png" class="me-auto" width="60px" height="60px" alt="">
    </div>
    
    <div class="col-lg-3 col-6 d-flex">
      <button class="card-text fw-bold bg-white text-black" data-bs-toggle="modal" data-bs-target="#terms">Terms and Condition</button>
      <button class="card-text fw-bold bg-white text-black" data-bs-toggle="modal" data-bs-target="#privacy">Privacy Policy</button> 
    </div>

<div class="modal fade" id="terms" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1 class="text-center fw-bold antonfont">Terms and Conditions</h1>
        <p> 5thgen Creations, a small online baking business (“Seller”) and Buyer hereby agree that the following terms and conditions will apply to all Products sold by Seller to Buyer.
        <br><br>
        I. PRODUCT ORDERS <br>All transactions shall be made through the online website 5thgen Creations. The buyer shall fill out the order form stating their name, contact number, delivery address, delivery date, order, and mode of payment. All orders are pre-order unless stated, otherwise by the buyer through their online page. The orders are confirmed once the seller replied and acknowledged the order form sent by the buyer. Cancellation of orders is not allowed on the day of the buyer’s preferred delivery.
        <br><br>
        II. PAYMENT <br> Payments for small pastries is Limited only to Cash on Delivery. Transaction using different online payments would be available soon. Buyer must send a screenshot as proof of their payment for the pastries they have ordered. Buyers shall have the option to pay the delivery fee ahead of time or to cash it directly to the delivery rider.
        <br><br>
        III. DELIVERY <br>Buyer can choose their preferred third-party app (Grab, Lalamove, Angkas) in booking for the delivery of the products. Seller will not be liable to any damage, loss or any incidents done once the products were transferred to the delivery service. The seller shall send out a tracking link to the buyer for the delivery.
        <br><br>
        IV. REFUND/RETURN <br>Once the products are released for delivery, buyers cannot refund or return it. The seller will not refund any percentage of the paid amount when there is no necessary reasons. If by any chance, the buyer encounter product issue made by the seller, the buyer shall contact immediately and shall have enough evidence to prove their points. By that time, the seller and buyer shall agree to a compromised solution. </p> 
          
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="privacy" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1 class="text-center fw-bold antonfont">Privacy Policy</h1>
        <p> Here at 5thgen Creations, we value our customers and we want to make their ordering process easy and safe. All information we have collected through your order forms shall be kept confidential and shall not be used in any other way by the seller. All names, address, and number are protected and shall not be taken away in our private messaging and inventory. Furthermore, if we will be needing to contact or use your information, we will be asking for your permission to allow us to use the following details. </p>
      </div>
    </div>
  </div>
</div>

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