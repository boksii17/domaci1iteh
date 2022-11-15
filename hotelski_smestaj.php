<?php

require "dbBroker.php";
require "model/smestaj.php";
require "model/tipSmestaja.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$psmestaj = Smestaj::getAll($conn);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HotelZLATIBOR: Početna</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Oswald:wght@400;500;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}


/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.btn {
  background-color: Orange;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: Green;
}
</style>
</head>

<body>

   
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3">
        <div class="container">
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container position-relative" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 display-5 text-white"><span class="text-primary">hotel</span>Zlatibor</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="home.php" class="nav-item nav-link active">Početna</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        <a href="hotelski_smestaj.php" class="nav-item nav-link active">Smeštaj</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        <a href="rezervacija.php" class="nav-item nav-link active">Rezervacije</a>
                    </div>
                    
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Under Nav Start -->
    <div class="container-fluid bg-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-left mb-3 mb-lg-0">
                    <div class="d-inline-flex text-left">
                        <h1 class="flaticon-office font-weight-normal text-primary m-0 mr-3"></h1>
                        <div class="d-flex flex-column">
                            <h5>Naš hotel</h5>
                            <p class="m-0">Dimitrija Tucovića 149, Užice</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-left text-lg-center mb-3 mb-lg-0">
                    <div class="d-inline-flex text-left">
                        <h1 class="flaticon-email font-weight-normal text-primary m-0 mr-3"></h1>
                        <div class="d-flex flex-column">
                            <h5>E-mail</h5>
                            <p class="m-0">office@hotel-zlatibor.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-left text-lg-right mb-3 mb-lg-0">
                    <div class="d-inline-flex text-left">
                        <h1 class="flaticon-telephone font-weight-normal text-primary m-0 mr-3"></h1>
                        <div class="d-flex flex-column">
                            <h5>Pozovite nas</h5>
                            <p class="m-0">+381(31) 516-188</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Under Nav End -->
    

</head>

<body>


    <div class="jumbotron" style="color: black;">
        <h1>Hotel Zlatibor</h1>
    </div>

   

    <div id="pregled" class="panel panel-success" style="margin-top: 1%;">

        <div class="panel-body">
            <table id="myTable" class="table table-hover table-striped" style="color: black; background-color: white;">
                <thead class="thead">
                    <tr>
                        <th scope="col">Tip Smeštaja</th>
                        <th scope="col">Kapacitet</th>
                        <th scope="col">Cena</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($red = $psmestaj->fetch_array()) :
                    ?>
                        <tr>
                            <td><?php echo $red["idtip"]?></td>
                            <td><?php echo $red["kapacitet"] ?></td>
                            <td><?php echo $red["cena"] ?></td>

                            

                        </tr>
                <?php
                    endwhile;
                 #zatvaranje elsa otvorenog na liniji 21
                ?>
               

                </tbody>
            </table>
        </div>
    </div>

    <!-- Trigger/Open The Modal -->
<button id="myBtn" style="border: 1px solid orange">Rezerviši</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Unesite potrebne podatke</p><br>
    <form>
  Ime:<br> <input type="text" /><br />
  Prezime:<br> <input type="text" /><br />
  TipSmestaja:<br> <input type="radio" name="tip" value="soba" 
    checked>Soba<br />
  <input type="radio" name="tip" value="apartman">
    Apartman<br />
  <input type="radio" name="tip" value="lux apartman">
    Lux apartman<br />
    Kapacitet:<br> <input type="text" /><br />
    Datum <br><input type="date"  style="border: 1px solid black" name="datum" class="form-control"/>
</form>
<button id="myBtn" style="border: 1px solid orange">Rezerviši</button>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>        
           


    
</body>


    
</html>