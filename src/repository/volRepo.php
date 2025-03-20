<?php

class volRepo
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new BDD();
    }

    public function ajoutervol(vol $vol)
    {
        $req = 'INSERT INTO `vol`(date,heure,nb_place_dispo,ref_films,ref_salle,prix)
VALUES(:date,:heure,:nbplacedispo,:films,:salle,:prix)';
        $ajout = $this->bdd->getBdd()->prepare($req);
        $res = $ajout->execute(array(
            'date' => $vol->getDate(),
            'heure' => $vol->getHeure(),
            'nbplacedispo' => $vol->getNbPlcDispo(),
            'films' => $vol->getRefFilms(),
            'salle' => $vol->getRefSalle(),
            'prix' => $vol->getPrixPlc()
        ));
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function modifiervol(vol $vol)
    {
        $req = 'UPDATE `vol` SET ref_films=:refFilms,ref_salle=:refSalle,prix=:prixPlc,
heure=:heure,date=:date, nb_place_dispo=:nbPlcDispo WHERE id_vol=:idvol';
        $modif = $this->bdd->getBdd()->prepare($req);
        $req = $modif->execute(array(
            'idvol' => $vol->getIdvol(),
            'refSalle' => $vol->getRefSalle(),
            'refFilms' => $vol->getRefFilms(),
            'date' => $vol->getDate(),
            'heure' => $vol->getHeure(),
            'nbPlcDispo' => $vol->getNbPlcDispo(),
            'prixPlc' => $vol->getPrixPlc()
        ));
        if ($req) {
            return true;
        } else {
            return false;
        }
    }

    public function affichervols()
    {
        $affiche = "SELECT *,DATE_FORMAT(heure,'%H:%i') as heure_complete,(nb_place_dispo-nb_place_reserver) as nb_plc_dispo,nom_salle,titre,id_films,id_salle FROM `vol`
LEFT JOIN films on id_films=ref_films
LEFT JOIN salle on id_salle=ref_salle
LEFT JOIN reservation on id_vol=ref_vol";
        $req = $this->bdd->getBdd()->prepare($affiche);
        $req->execute();
        return $req->fetchAll();
    }

    public function afficherLavol(vol $vol)
    {
        $affiche = "SELECT *,DATE_FORMAT(heure,'%H:%i') as heure_complete,(nb_place_dispo-nb_place_reserver) as nb_plc_dispo,nom_salle,titre,id_films,id_salle FROM `vol`
LEFT JOIN films on id_films=ref_films
LEFT JOIN salle on id_salle=ref_salle
LEFT JOIN reservation on id_vol=ref_vol WHERE id_vol=:idvol";
        $req = $this->bdd->getBdd()->prepare($affiche);
        $req->execute(array('idvol' => $vol->getIdvol()));
        return $req->fetch();
    }

    public function getSalleFilm()
    {
        $get = "SELECT *,nom_salle,titre,id_films,id_salle FROM vol
LEFT JOIN films on id_films=ref_films
LEFT JOIN salle on id_salle=ref_salle";
        $res = $this->bdd->getBdd()->prepare($get);
        $res->execute();
        return $res->fetchAll();
    }

    public function getFilm()
    {
        $get="SELECT titre,id_films FROM films";
        $res = $this->bdd->getBdd()->prepare($get);
        $res->execute();
        return $res->fetchAll();
    }
    public function getSalle()
    {
        $show="SELECT id_salle,nom_salle,place_totale FROM salle ORDER BY nom_salle ASC  ";
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
?>