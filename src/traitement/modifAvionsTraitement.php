<?php
include "../repository/AvionsRepo.php";
require_once "../bdd/BDD.php";
require_once "../modele/Avions.php";
var_dump($_POST);

if(empty($_POST["nomAvions"]) ||
    empty($_POST["placeTotale"]) ||
    empty($_POST["idAvions"]))
{
    echo "Erreur : Tous les champs doivent être remplis";
    return;
}

$avions = new Avions(array(
    'nomAvions' => $_POST['nomAvions'],
    'placeTotale' => $_POST['placeTotale'],
    'idAvions' => $_POST['idAvions']
));

var_dump($avions);
$repository = new AvionsRepo();
$resultat = $repository->modificationAvions($avions);
if($resultat){
    header("Location: ../../vue/afficherAvions.php");
}

