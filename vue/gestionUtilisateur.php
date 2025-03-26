<?php
require_once "../src/bdd/BDD.php";
require_once '../src/modele/utilisateur.php';
require_once '../src/repository/utilisateurRepo.php';
session_start();
if(!isset($_SESSION["userConnecte"])){
header('Location:../index.php');
session_destroy();
}
$user=new Utilisateur([
'idUtilisateur'=>$_SESSION['userConnecte']['idUtilisateur'],
]);
$repository=new utilisateurRepo();
$result=$repository->afficherUtilisateur($user);
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
                            <a href="javascript:">Gestion Utilisateur</a>
                            <ul>
                                <li><a href="modification_compte.php">Modifier le compte</a></li>
                                <li><a href="deconnexion.php">Déconnexion</a></li>
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

<!-- ***** Modification Compte Section ***** -->
<section id="gestion-utilisateur" class="py-5">
    <div class="container">
        <h1>Modification du compte</h1>
        <form action="../src/traitement/modifUtilisateurTraitement.php" method="post">
            <input type="hidden" name="action" value="modification">
            <div class="mb-3">
                <input type="hidden" class="form-control" id="idUtilisateur" name="idUtilisateur" value="<?=$_SESSION["userConnecte"]['idUtilisateur']?>">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?=$result["nom"]?>">
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?=$result["prenom"]?>">
            </div>
            <div class="mb-3">
                <label for="date_de_naissance" class="form-label">Date de naissance :</label>
                <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" value="<?=$result["date_de_naissance"]?>">
            </div>
            <div class="mb-3">
                <label for="ville" class="form-label">Ville :</label>
                <input type="text" class="form-control" id="ville" name="ville" value="<?=$result["ville"]?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" class="form-control" id="email" name="email" value="<?=$result["email"]?>">
            </div>
            <input type="submit" class="btn btn-warning" value="Modifier">
        </form>

        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe :</label>
            <a href="modifMdp.php" role="button" class="btn btn-secondary">Modifier le mot de passe</a>
        </div>

        <h1 class="mt-5">Deconnexion du compte</h1>
        <form action="../src/traitement/deconnexionUtilisateurTraitement.php" method="post">
            <input type="submit" class="btn btn-primary" value="Deconnexion" name="deconnexion">
        </form>

        <h1 class="mt-5">Suppression du compte</h1>

        <!-- Bouton pour ouvrir la modale -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">
            Supprimer
        </button>
    </div>
</section>

<!-- Modal de Confirmation -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="../src/traitement/suppresionUtilisateurTraitement.php" method="post">
                    <input type="hidden" name="action" value="suppresion">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="idUtilisateur" name="idUtilisateur" value="<?=$_SESSION["userConnecte"]['idUtilisateur']?>">
                    </div>
                    <input type="submit" class="btn btn-danger" value="Supprimer le compte" name="supprimer">
                </form>
            </div>
        </div>
    </div>
</div>

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

