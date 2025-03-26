<?php
include "../repository/utilisateurRepo.php";
require_once "../bdd/BDD.php";
require_once "../modele/Utilisateur.php";
var_dump($_POST);
if(empty($_POST["nom"]) ||
    empty($_POST["prenom"]) ||
    empty($_POST["date_de_naissance"]) ||
    empty($_POST["ville"]) ||
    empty($_POST["email"]))
{
    echo "<p style='color: red; font-weight: bold;'>Erreur : Tous les champs doivent être remplis.</p>";
    echo "<button onclick='history.back()' style='padding: 10px; font-size: 16px; cursor: pointer;'>Retour à la modification</button>";
    return;
}

$user = new Utilisateur(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'email' => $_POST['email'],
    'dateDeNaissance' => $_POST['date_de_naissance'],
    'ville' => $_POST['ville'],
    'idUtilisateur' => $_POST['idUtilisateur']
));

var_dump($user);
$repository = new utilisateurRepo();
$resultat = $repository->modification($user);
header("Location:../../vue/gestionUtilisateur.php");

