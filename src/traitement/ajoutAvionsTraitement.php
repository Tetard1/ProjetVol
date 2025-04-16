<?php
require_once '../bdd/Bdd.php';
require_once '../modele/avions.php';
require_once '../Repository/avionsRepo.php';

if(empty($_POST["nomAvions"])||empty($_POST["placeTotale"])){
    echo "Veuillez remplir tous les champs";
    header(" ../../vue/ajoutAvions.php");
}else{
    $avions = new Avions([
        'nomAvions'=>$_POST['nomAvions'],
        'placeTotale'=>$_POST['placeTotale'],
    ]);
    $avionsRepo = new avionsRepo($avions);
    $resultat= $avionsRepo->ajouterAvions($avions);
    if($resultat){
        header("Location: ../../vue/afficherAvions.php");
    }else{
        header("Location: ../../vue/afficherAvions.php");
    }

}

