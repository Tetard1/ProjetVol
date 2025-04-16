<?php
include "../repository/AvionsRepo.php";
require_once "../bdd/BDD.php";
require_once "../modele/Avions.php";

var_dump($_POST);
if(empty($_POST["idAvions"]))
{
    var_dump($_POST);
    echo "Erreur : ID utilisateur requis";
    return;
}

$avions = new Avions(array(
    'idAvions' => $_POST["idAvions"]

));
$repository = new avionsRepo();
$resultat = $repository->suppressionAvions($avions);
header("Location:../../index2.php");
