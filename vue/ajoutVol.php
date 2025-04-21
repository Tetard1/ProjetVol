<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/vol.php';
require_once '../src/repository/volRepo.php';
session_start();
if(!isset($_SESSION["userConnecte"])){
    header('Location:../index.php');
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Patapouf Airport - Ajout des Vols</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-breezed.css">
    <link rel="stylesheet" href="../assets/css/owl-carousel.css">
    <link rel="stylesheet" href="../assets/css/lightbox.css">

    <!-- Appliquer un fond bleu ciel à la page entière -->
    <style>
        /* Appliquer un fond bleu ciel à toute la page */
        body {
            background-color: #87CEEB; /* Bleu ciel */
            justify-content: center; /* Centrer horizontalement */
            align-items: center; /* Centrer verticalement */
            height: 100vh; /* Prendre toute la hauteur de la fenêtre */
            margin: 0; /* Enlever les marges par défaut */
            padding: 0;
            flex-direction: column;
        }

        .container {
            max-width: 600px; /* Limiter la largeur du formulaire */
            background-color: white; /* Fond blanc pour le formulaire */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-warning {
            width: 100%;
        }

        .btn-primary, .btn-danger {
            width: 100%;
            margin-top: 10px;
        }

        .modal-content {
            border-radius: 10px;
        }

    </style>

</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="../index2.php" class="logo">
                        <img src="../assets/images/projetvol.png" height="70" width="100"/>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="submenu">
                            <a href="javascript:">Liste Vols</a>
                            <ul>
                                <li><a href="inscription.html">Ajout des Vols</a></li>
                                <li><a href="connexion.php">liste des Vols</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<section id="inscription" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Ajout Des Vols</h3>
                        <form action="../src/traitement/ajoutVolTraitement.php" method="post">
                            <div class="form-group mb-3">
                                <label for="destination">Destination du vol (ville) </label>
                                <input type="text" class="form-control" id="destination" name="destination" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="date">Date du vol </label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="heure_depart">Heure de depart du vol </label>
                                <input type="datetime-local" class="form-control" id="heure_depart" name="heure_depart" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="heure_arrive">Heure d'arriver du vol </label>
                                <input type="datetime-local" class="form-control" id="heure_arrive" name="heure_arrive" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="ville_depart">Ville de depart du vol </label>
                                <input type="text" class="form-control" id="ville_depart" name="ville_depart" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="ville_arrive">Ville d'arriver du vol </label>
                                <input type="text" class="form-control" id="ville_arrive" name="ville_arrive" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nbPlaceDispo">Nombre de Place Disponible</label>
                                <input type="number" class="form-control" id="nbPlaceDispo" name="nbPlaceDispo" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="prix">Prix du vol</label>
                                <input type="number" class="form-control" id="prix" name="prix" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Ajouter l'avion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery -->
<script src="../assets/js/jquery-2.1.0.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/js/popper.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="../assets/js/owl-carousel.js"></script>
<script src="../assets/js/scrollreveal.min.js"></script>
<script src="../assets/js/waypoints.min.js"></script>
<script src="../assets/js/jquery.counterup.min.js"></script>
<script src="../assets/js/imgfix.min.js"></script>
<script src="../assets/js/slick.js"></script>
<script src="../assets/js/lightbox.js"></script>
<script src="../assets/js/isotope.js"></script>

<!-- Global Init -->
<script src="../assets/js/custom.js"></script>

<script>
    $(function() {
        var selectedClass = "";
        $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
                $("."+selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);
        });
    });
</script>

</body>
</html>
