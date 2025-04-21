<?php
require_once '../bdd/Bdd.php';
require_once '../modele/vol.php';
require_once '../Repository/volRepo.php';

if(empty($_POST["nomVol"])||empty($_POST["placeTotale"])){
    echo "Veuillez remplir tous les champs";
    header(" ../../vue/ajoutVol.php");
}else{
    $vol = new Vol([
        'destination' =>$_POST['destination'],
        'date' =>$_POST['date'],
        'heure_depart' =>$_POST['heure_depart'],
        'heure_arrive' =>$_POST['heure_arrive'],
        'ville_depart' =>$_POST['ville_depart'],
        'ville_arrive' => $_POST['ville_arrive'],
        'nbPlaceDispo' =>$_POST['nbPlaceDispo'],
        'avions' => $_POST['avions'],
        'pilotes' => $_POST['pilotes'],
        'prix' => $_POST['prix']
    ]);
    $volRepo = new volRepo($vol);
    $resultat= $volRepo->ajouterVol($vol);
    if($resultat){
        header("Location: ../../vue/afficherVol.php");
    }else{
        header("Location: ../../vue/afficherVol.php");
    }

}