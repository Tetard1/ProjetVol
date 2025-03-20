<?php

class avionsRepo{
    private $bdd;
    public function __construct(){
        $this->bdd = new BDD();
    }

    public function ajouterAvions(avions $avions)  {
        $sql="INSERT INTO avions(nom_avions,place_totale) VALUES(:nomAvions,:placeTotale)";
        $req=$this->bdd->getBdd()->prepare($sql);
        $res=$req->execute(array(
            "nomAvions"=>$avions->getNomavions(),
            "placeTotale"=>$avions->getPlaceTotale()
        ));
        if($res){
            return true;
        }else {
            return false;
        }
    }

    public function modificationAvions (avions $avions)  {

        var_dump($_POST);
        $sqlmodification = 'UPDATE avions SET nom_avions = :nomAvions,place_totale =:placeTotale WHERE id_avions = :idAvions';
        $reqmodification = $this->bdd->getBdd()->prepare($sqlmodification);
        $resmodification = $reqmodification->execute(array(
            'nomAvions' => $avions->getNomavions(),
            'placeTotale' => $avions->getPlaceTotale(),
            'idAvions' => $avions->getIdavions()
        ));

        return $resmodification ? "Modification réussie" : "Échec de la modification";
    }

    public function afficherAvions(){
        $affiche="SELECT * FROM `avions` ORDER BY nom_avions ASC";
        $req=$this->bdd->getBdd()->prepare($affiche);
        $req->execute(
        );
        return $req->fetchall();
    }
    public function afficherLAvions(avions $avions){
        $show="SELECT nom_avions,place_totale FROM `avions` WHERE id_avions=:idAvions 
            ORDER BY nom_avions ASC";
        $req=$this->bdd->getBdd()->prepare($show);
        $req->execute([
            'idAvions'=>$avions->getIdavions()
        ]);
        return $req->fetch();
    }

    public function suppressionAvions (avions $avions)
    {
        $supprimer = "DELETE FROM avions WHERE id_avions = :idAvions";
        $sup = $this->bdd->getBdd()->prepare($supprimer);
        $sup->execute(array('idAvions' => $avions->getIdavions()));
        if ($sup) {
            return true;

        } else {
            return false;
        }
    }
}