<?php
include "../repository/utilisateurRepo.php";
require_once "../bdd/BDD.php";
require_once "../modele/utilisateur.php";
var_dump($_POST);

if(empty($_POST["nom"]) ||
    empty($_POST["prenom"]) ||
    empty($_POST["date_de_naissance"]) ||
    empty($_POST["ville"]) ||
    empty($_POST["email"]) ||
    empty($_POST["mdp"])

){
    echo "C'est pas bien tetard";
    header("Location: ../../vue/connexion.php");
}else{

    $user = new Utilisateur(array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'dateDeNaissance' => $_POST['date_de_naissance'],
        'ville' => $_POST['ville'],
        'email' => $_POST['email'],
        'mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT),

    ));
    var_dump($user);
    $repository = new utilisateurRepo();
    $resultat = $repository->inscription($user);
    var_dump($resultat);
    if($resultat == true){
        header("Location: ../../vue/connexion.php");
    }


}

