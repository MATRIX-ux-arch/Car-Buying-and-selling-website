<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home | The best Car Dealers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
 
        .navbar-brand {
            font-family: 'Arial', sans-serif;
            font-size: 40px; 
            font-weight: bold;
        }
        .navbar-brand .auto {
            color: #FF5733; 
        }
        .navbar-brand .motive {
            color: #33A1FF; 
        }
        .row .col-sm-4{
          color:#00b33c;
        }
        .container-fluid{
          color:#00b33c;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark cust">
<a class="navbar-brand" href="#">
    <span class="auto">AUTO</span><span class="motive">MOTIVE</span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav w-100">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown ml-auto">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="https://img.icons8.com/ios/20/ffffff/enter-2.png"/> &nbsp;Login
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="customerLogin.php">Customer</a>
          <a class="dropdown-item" href="salesPersonLogin.php">Sales Person/Manager</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="https://img.icons8.com/ios-glyphs/22/ffffff/manager--v1.png"/> &nbsp;Signup
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="customerSignup.php">Customer</a>
          <a class="dropdown-item" href="salesPersonSignup.php">Sales Person/Manager</a>
        </div>
      </li>
    </ul>  
  </div>
</nav>
<br>
    
<!--Corousel-->
    
<div style="margin-top: -2em" class="container">
  <div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="width: 100%" src="https://images.unsplash.com/photo-1471479917193-f00955256257?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1748&q=80">
      <div class="carousel-caption">
        <h3>Buy A Car</h3>
        <p>Buy a Car from our leading team of car dealers!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img style="width: 100%" src="https://images.unsplash.com/photo-1611236849860-0d678360a5ba?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1767&q=80">
      <div class="carousel-caption">
        <h3>Sell A Car</h3>
        <p>Your one stop for selling your car at the best prices!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

</div>

<!--Main-->
    
    <div class="jumbotron jumbotron-fluid main" style="background-color: black;">
        <div class="row">
            <div class="col-sm-4">
                <h3>Navigate Cars</h3>
                <p>Navigate through our best showroom of cars where you can find each and every car that your want.</p>
            </div>
            <div class="col-sm-4">
                <h3>Choose A Car</h3>
                <p>Choose from wide variety of car according to your specifications and needs.</p>
            </div>
            <div class="col-sm-4">
                <h3>Contact Sellers</h3>
                <p>Contact our best sellers with fully authenticated method where no one can perform any fraudulent activity.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid main">
        <p>2021 | All Rights Reserved.</p>
    </div>
</body>
</html>


