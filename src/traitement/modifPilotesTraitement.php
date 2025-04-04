<?php
include "../repository/PilotesRepo.php";
require_once "../bdd/BDD.php";
require_once "../modele/Pilotes.php";
var_dump($_POST);

if(empty($_POST["nomPilotes"]) ||
    empty($_POST["prenomPilotes"]) ||
    empty($_POST["idPilotes"]))
{
    echo "Erreur : Tous les champs doivent être remplis";
    return;
}

$pilotes = new Pilotes(array(
    'nomPilotes' => $_POST['nomPilotes'],
    'prenomPilotes' => $_POST['prenomPilotes'],
    'idPilotes' => $_POST['idPilotes']
));

var_dump($pilotes);
$repository = new PilotesRepo();
$resultat = $repository->modifPilotes($pilotes);
if($resultat){
    header("Location: ../../vue/afficherPilotes.php");
}

