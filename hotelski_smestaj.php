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
            <table id="myTable" class="table table-hover table-striped" style="color: black; background-color: grey;">
                <thead class="thead">
                    <tr>
                        <th scope="col">Tip Smeštaja</th>
                        <th scope="col">Kapacitet</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Rezerviši</th>
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

                            <td>
                                <label class="custom-radio-btn">
                                    <input type="radio" name="checked-donut" value=<?php echo $red["idtip"] ?>>
                                    <span class="checkmark"></span>
                                </label>
                            </td>

                        </tr>
                <?php
                    endwhile;
                 #zatvaranje elsa otvorenog na liniji 21
                ?>
               

                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-4">
        <button id="btn-dodaj" type="button" class="btn btn-success btn-block"
                style="background-color:black ; border: 1px solid white;" data-toggle="modal" data-target="#myModal"> Rezerviši smeštaj</button>

    </div>

    <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog">

        
        
    </div>
            
           


    
</body>


    
</html>