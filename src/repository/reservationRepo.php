<?php
class reservationRepo {
    private $bdd;
    public function __construct()
    {
        $this->bdd = new BDD();
    }

    public function ajouterReservation(Reservation $reservation){
        $sql= "INSERT INTO reservation (nb_place_reserver,ref_vol,ref_utilisateur) VALUES(:nbPlaceReserver,:refVol,:refUtilisateur)";
        $req=$this->bdd->getBdd()->prepare($sql);
        $res=$req->execute(array(
            'nbPlaceReserver' => $reservation->getNbPlaceReserver(),
            'refVol' => $reservation->getRefVol(),
            'refUtilisateur' => $reservation->getRefUtilisateur(),
        ));
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function afficherReservationsPasse($reservation){
        $afficherReservations="SELECT *,DATE_FORMAT(heure,'%H:%i') as heure_complete,date,(prix*nb_place_reserver) as prix_complet FROM reservation
        LEFT JOIN vol on id_vol=ref_vol
        LEFT JOIN avions on id_avions=ref_avions WHERE ref_utilisateur=:refUtilisateur   ";
        $reservations = $this->bdd->getBdd()->prepare($afficherReservations);
        $reservations->execute(array(
            'refUtilisateur' =>$reservation->getRefUtilisateur(),
        ));
        return $reservations->fetchAll();
    }
    public function afficherReservations(){
        $afficherReservations="SELECT *,DATE_FORMAT(heure,'%H:%i') as heure_complete,titre,date,(prix*nb_place_reserver) as prix_complet FROM reservation
        LEFT JOIN Vol on id_vol=ref_vol
        LEFT JOIN avions on id_avions=ref_avions";
        $reservations = $this->bdd->getBdd()->query($afficherReservations);
        $reservations->execute();
        return $reservations->fetchAll();
    }
    public function supprimerReservation(Reservation $reservation){
        $sql= "DELETE FROM reservation WHERE id_reservation=:idReservation";
        $req=$this->bdd->getBdd()->prepare($sql);
        $res=$req->execute(array(
            'idReservation'=>$reservation->getIdReservation(),
        ));
        if($res){
            return true;
        }
        else{
            return false;
        }
    }
    public function modifierReservation(Reservation $reservation){
        $req = 'UPDATE `reservation` SET ref_vol=:refvol,
        nb_place_reserver=:nbPlaceReserver WHERE id_reservation=:idReservation AND ref_utilisateur=:refUtilisateur';
        $modif = $this->bdd->getBdd()->prepare($req);
        $req = $modif->execute(array(
            'idReservation' => $reservation->getIdReservation(),
            'nbPlaceReserver' => $reservation->getNbPlaceReserver(),
            'refVol' => $reservation->getRefVol(),
            'refUtilisateur' => $reservation->getRefUtilisateur(),

        ));
    }
    public function getVols($id){
        $date="SELECT id_vol, date, prix FROM vol WHERE ref_avions=:avions ";
        $Vol = $this->bdd->getBdd()->prepare($date);
        $Vol->execute(array(
            'avions'=>$id,
        ));
        return $Vol->fetchAll();
    }
    public function afficherAvions($id){
        $film="SELECT * FROM avions WHERE id_avions=:avions";
        $avions = $this->bdd->getBdd()->prepare($film);
        $avions->execute(array(
            'avions'=>$id
        ));
        return $avions->fetch();
    }
    public function afficherLaReservation($id){
        $show="SELECT *,titre,id_avions,DATE_FORMAT(heure,'%H:%i') as heure_complete,date,(prix*nb_place_reserver) as prix_complet FROM reservation
        LEFT JOIN vol on id_vol=ref_vol
        LEFT JOIN avions on id_avions=ref_avions
        WHERE id_reservation=:idReservation";
        $reservations = $this->bdd->getBdd()->prepare($show);
        $reservations->execute(array(
            'idReservation'=>$id
        ));
        return $reservations->fetch();
    }
}

