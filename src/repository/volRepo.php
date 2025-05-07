<?php

class volRepo
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new BDD();
    }

    public function ajouterVol(vol $vol)
    {
        $req = 'INSERT INTO `vol`(destination,date,heure_depart,heure_arrive,
                  ville_depart,ville_arrive,nb_place_dispo,prix,ref_avions,ref_pilotes)
        VALUES(:destination,:date,:heure_depart,:heure_arrive,:ville_depart,
               :ville_arrive,:nbPlaceDispo,:prix,:avions,:pilotes)';
        $ajout = $this->bdd->getBdd()->prepare($req);
        $res = $ajout->execute(array(
            'destination' => $vol->getDestination(),
            'date' => $vol->getDate(),
            'heure_depart' => $vol->getHeureDepart(),
            'heure_arrive' => $vol->getHeureArrive(),
            'ville_depart' => $vol->getVilleDepart(),
            'ville_arrive' => $vol->getVilleArrive(),
            'nbPlaceDispo' => $vol->getNbPlaceDispo(),
            'avions' => $vol->getRefAvions(),
            'pilotes' => $vol->getRefPilotes(),
            'prix' => $vol->getPrix()
        ));
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function modifiervol(vol $vol)
    {
        $req = 'UPDATE `vol` SET ref_avions=:refAvions,ref_pilotes=:refPilotes,prix=:prix,
heure_depart=:heure_depart,heure_arrive=:heure_arrive,ville_depart=:ville_depart,
ville_arrive=:ville_arrive,destination=:destination,date=:date,
nb_place_dispo=:nbPlaceDispo WHERE id_vol=:idVol';
        $modif = $this->bdd->getBdd()->prepare($req);
        $req = $modif->execute(array(
            'id_vol' => $vol->getIdvol(),
            'refPilotes' => $vol->getRefPilotes(),
            'refAvions' => $vol->getRefAvions(),
            'date' => $vol->getDate(),
            'destination' => $vol->getDestination(),
            'heure_depart' => $vol->getHeureDepart(),
            'heure_arrive' => $vol->getHeureArrive(),
            'ville_depart' => $vol->getVilleDepart(),
            'ville_arrive' => $vol->getVilleArrive(),
            'nb_place_dispo' => $vol->getNbPlaceDispo(),
            'prix' => $vol->getPrix()
        ));
        if ($req) {
            return true;
        } else {
            return false;
        }
    }

    public function affichervols()
    {
        $affiche = "SELECT CONCAT('Départ: ', heure_depart, ' - Arrivée: ', heure_arrive) AS heure_complete, 
    nb_place_dispo, 
    ref_pilotes, 
    ref_avions, 
    id_avions, 
    id_pilotes
FROM `vol`
LEFT JOIN avions ON id_avions = ref_avions
LEFT JOIN pilotes ON id_pilotes = ref_pilotes
LEFT JOIN reservation ON id_vol = ref_vol";

        $req = $this->bdd->getBdd()->prepare($affiche);
        $req->execute();
        return $req->fetchAll();
    }
    public function afficherLesVols()
    {
        $affiche= "SELECT * FROM vol";
        $req = $this->bdd->getBdd()->prepare($affiche);
        $req->execute();
        return $req->fetchAll();
    }

    public function afficherLevol(vol $vol)
    {
        $affiche = "SELECT *,DATE_FORMAT(heure,'%H:%i') as heure_complete,(nb_place_dispo-nb_place_reserver) as nb_plc_dispo,nom_pilotes,id_avions,id_pilotes FROM `vol`
LEFT JOIN avions on id_avions=ref_avions
LEFT JOIN pilotes on id_pilotes=ref_pilotes
WHERE id_vol=:idvol";
        $req = $this->bdd->getBdd()->prepare($affiche);
        $req->execute(array('idvol' => $vol->getIdvol()));
        return $req->fetch();
    }

    public function getpilotesAvions()
    {
        $get = "SELECT *,nom_pilotes,id_avions,id_pilotes FROM vol
LEFT JOIN avions on id_avions=ref_avions
LEFT JOIN pilotes on id_pilotes=ref_pilotes";
        $res = $this->bdd->getBdd()->prepare($get);
        $res->execute();
        return $res->fetchAll();
    }

    public function getAvions()
    {
        $get="SELECT id_avions,nom,place_totale FROM avions ORDER BY nom ASC";
        $res = $this->bdd->getBdd()->prepare($get);
        $res->execute();
        return $res->fetchAll();
    }
    public function getpilotes()
    {
        $show="SELECT id_pilotes,nomPilotes FROM pilotes ORDER BY nomPilotes ASC  ";
        $res = $this->bdd->getBdd()->prepare($show);
        $res->execute();
        return $res->fetchAll();
    }
    public function supprimervol($vol)
    {
        $supprimer = "DELETE FROM vol WHERE id_vol=:idvol";
        $sup = $this->bdd->getBdd()->prepare($supprimer);
        $sup->execute(array('idvol' => $vol->getIdvol()));
        if ($sup) {
            return true;

        } else {
            return false;
        }
    }
}