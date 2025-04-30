<?php
require_once '../bdd/Bdd.php';
require_once '../modele/vol.php';
require_once '../Repository/volRepo.php';

if(empty($_POST["destination"])||empty($_POST["prix"])){
    echo "Veuillez remplir tous les champs";
    header(" ../../vue/ajoutVol.php");
}else{
    $vol = new Vol([
        'destination' =>$_POST['destination'],
        'date' =>$_POST['date'],
        'HeureDepart' =>$_POST['heure_depart'],
        'HeureArrive' =>$_POST['heure_arrive'],
        'VilleDepart' =>$_POST['ville_depart'],
        'VilleArrive' => $_POST['ville_arrive'],
        'NbPlaceDispo' =>$_POST['nb_place_dispo'],
        'RefAvions' => $_POST["ref_avions"],
        'RefPilotes' => $_POST["ref_pilotes"],
        'prix' => $_POST['prix']
    ]);
    $volRepo = new volRepo();
    $resultat= $volRepo->modifiervol($vol);
    header("Location: ../../vue/afficherVol.php");


}
