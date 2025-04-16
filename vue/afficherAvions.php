<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/avions.php';
require_once '../src/repository/avionsRepo.php';
session_start();
if($_SESSION["userConnecte"]["role"]=="user"){
    header('Location:../index.html');
}
$avionsRepo = new AvionsRepo();
$resultat = $avionsRepo->afficherAvions();
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
<script>
    function filterAvions() {
        let input = document.getElementById("search").value.toLowerCase();
        let rows = document.querySelectorAll("tbody tr");

        rows.forEach(row => {
            let title = row.cells[0].innerText.toLowerCase();
            row.style.display = title.includes(input) ? "" : "none";
        });
    }

    function confirmDelete(id) {
        document.getElementById("deleteIdInput").value = id;
        var confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        confirmModal.show();
    }
</script>

<input type="text" id="search" class="search-bar" onkeyup="filterAvions()" placeholder="Rechercher un avions">

<table>
    <thead>
    <tr>
        <th>Nom Avion </th>
        <th>place Totale </th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($resultat as $avions):;?>
        <tr>
            <td><?= htmlspecialchars($avions['nom_avions']) ?></td>
            <td><?= $avions["place_totale"] ?></td>
            <td><a href='modifAvions.php?id=<?= $avions["id_avions"] ?>'><button type='button' class='btn btn-warning'>Modifier</button></a></td>
            <td><button type='button' class='btn btn-danger' onclick="confirmDelete(<?= $avions['id_avions'] ?>)">Supprimer</button></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<section>
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmation de suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cette avions ? Cette action est irréversible.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form id="confirmDeleteForm" method="post" action="../src/traitement/suppresionAvionsTraitement.php">
                        <input type="hidden" name="idAvions" id="deleteIdInput">
                        <button type="submit" class="btn btn-danger">Confirmer</button>
                    </form>

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