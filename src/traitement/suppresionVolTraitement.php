<?php
require_once '../bdd/Bdd.php';
require_once '../modele/vol.php';
require_once '../Repository/volRepo.php';

var_dump($_POST);
if(empty($_POST["idVol"]))
{
    var_dump($_POST);
    echo "Erreur : ID utilisateur requis";
    return;
}

$vol = new Vol(array(
    'idVol' => $_POST["idVol"]

));
$repository = new volRepo();
$resultat = $repository->supprimervol($vol);
header("Location:../../index2.php");
