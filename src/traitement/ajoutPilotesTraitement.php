<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Pilotes.php';
require_once '../Repository/PilotesRepo.php';

if(empty($_POST["nomPilotes"])||empty($_POST["prenomPilotes"])){
    echo "Veuillez remplir tous les champs";
    header(" ../../vue/ajoutPilotes.php");
}else{
    $pilotes = new Pilotes([
        'nomPilotes'=>$_POST['nomPilotes'],
        'prenomPilotes'=>$_POST['prenomPilotes'],
    ]);
    $pilotesRepo = new PilotesRepo($pilotes);
    $resultat= $pilotesRepo->ajoutPilotes($pilotes);
    if($resultat){
        header("Location: ../../vue/afficherPilotes.php");
    }else{
        header("Location: ../../vue/ajoutPilotes.php");
    }

}

