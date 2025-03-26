<?php
include "../repository/utilisateurRepo.php";
require_once "../bdd/BDD.php";
require_once "../modele/utilisateur.php";

var_dump($_POST);
if(empty($_POST["idUtilisateur"]))
{
    var_dump($_POST);
    echo "Erreur : ID utilisateur requis";
    return;
}

$user = new Utilisateur(array(
    'idUtilisateur' => $_POST["idUtilisateur"]

));
$repository = new utilisateurRepo();
$resultat = $repository->suppression($user);
header("Location:../../index.html");