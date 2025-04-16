<?php
include "../repository/pilotesRepo.php";
require_once "../bdd/BDD.php";
require_once "../modele/pilotes.php";

var_dump($_POST);
if(empty($_POST["idPilotes"]))
{
    var_dump($_POST);
    echo "Erreur : ID utilisateur requis";
    return;
}

$pilotes = new Pilotes(array(
    'idPilotes' => $_POST["idPilotes"]

));
$repository = new pilotesRepo();
$resultat = $repository->suppressionPilotes($pilotes);
header("Location:../../index2.php");
