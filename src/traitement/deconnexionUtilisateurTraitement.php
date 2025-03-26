<?php
include "../repository/utilisateurRepo.php";
require_once "../bdd/BDD.php";
require_once "../modele/utilisateur.php";



if(isset($_POST["deconnexion"])){
    $utilisateurRepo = new utilisateurRepo();
    $utilisateurRepo->deconnect();
}
