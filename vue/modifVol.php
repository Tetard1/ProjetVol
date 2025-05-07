<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Vol.php';
require_once '../src/repository/VolRepo.php';
session_start();
if(!isset($_SESSION["userConnecte"])){
    header('Location:../index.php');
    session_destroy();
}
$_SESSION["id"]=1;
$_SESSION["role"]="admin";
if(isset($_GET['id'])){
    $id=$_GET['id'];
} else{
    $id=null;
    header("Location:afficherVol.php");
}
$vol=new Vol([
    'idVol'=>$id
]);
$volRepo=new VolRepo();
$resultat= $volRepo->affichervols();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Patapouf Airport - Gestion Utilisateur</title>

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
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .container, table {
            margin: auto;
            text-align: center;
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
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
<div class="container">
    <div class="top-section">
        <h2>Modifications du vol</h2>
    </div>
    <form action="../src/traitement/modifVolTraitement.php" method="POST">
        <table>
            <thead>
            <tr>
                <th>Destination</th>
                <th>Date</th>
                <th>Heure de depart</th>
                <th>Heure d'arriver</th>
                <th>ville de depart</th>
                <th>ville d'arriver</th>
                <th>nombre de place disponible</th>
                <th>Avions</th>
                <th>Pilotes</th>
                <th>Prix</th>
                <th>Modifier</th>
                <input type="hidden" name="idVol" value="<?= $id ?>">
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <label for="destination" class="form-label"></label>
                    <input type='text' id="destination" name='destination' value="<?=$resultat["destination"]?>">
         (       </td>
                <td>
                    <label for="date" class="form-label"></label>
                    <input type='date' id="date" name='date' value="<?=$resultat["date"]?>">
                </td>
                <td>
                    <label for="heure_depart" class="form-label"></label>
                    <input type='time' id="heure_depart" name='heure_depart' value="<?=$resultat["heure_depart"]?>">
                </td>
                <td>
                    <label for="heure_arrive" class="form-label"></label>
                    <input type='time' id="heure_arrive" name='heure_arrive' value="<?=$resultat["heure_arrive"]?>">
                </td>
                <td>
                    <label for="ville_depart" class="form-label"></label>
                    <input type='text' id="ville_depart" name='ville_depart' value="<?=$resultat["ville_depart"]?>">
                </td>
                <td>
                    <label for="ville_arrive" class="form-label"></label>
                    <input type='text' id="ville_arrive" name='ville_arrive' value="<?=$resultat["ville_arrive"]?>">
                </td>
                <td>
                    <label for="nb_place_dispo" class="form-label"></label>
                    <input type='number' id="nb_place_dispo" name='nb_place_dispo' value="<?=$resultat["nb_place_dispo"]?>">
                </td>
                <td>
                    <label for="ref_avions" class="form-label"></label>
                    <input type='text' id="ref_avions" name='ref_avions' value="<?=$resultat["ref_avions"]?>">
                </td>
                <td>
                    <label for="ref_pilotes" class="form-label"></label>
                    <input type='text' id="ref_pilotes" name='ref_pilotes' value="<?=$resultat["ref_pilotes"]?>">
                </td>
                <td>
                    <label for="prix" class="form-label"></label>
                    <input type='number' id="prix" name='prix' value="<?=$resultat["prix"]?>">
                </td>
                <td>
                    <input class="btn btn-primary" type="submit" value="Modifier ">
                </td>
            </tr>
            </tbody>
        </table>
    </form>

    <!-- jQuery -->
    <script src="../assets/js/jquery-2.1.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Bootstrap JS (avec Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


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
