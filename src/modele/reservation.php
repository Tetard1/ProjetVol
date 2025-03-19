<?php
class Reservation
{
    private $idReservation;
    private $nbPlaceReserver;
    private $refVol;
    private $refUtilisateur;

    public function __construct(array $donnee)
    {
        $this->hydrate($donnee);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $valeur) {
            $methode = 'set' . ucfirst($key);

            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    /**
     * @param mixed $idReservation
     */
    public function setIdReservation($idReservation)
    {
        $this->idReservation = $idReservation;
    }

    /**
     * @return mixed
     */
    public function getNbPlaceReserver()
    {
        return $this->nbPlaceReserver;
    }

    /**
     * @param mixed $nbPlaceReserver
     */
    public function setNbPlaceReserver($nbPlaceReserver)
    {
        $this->nbPlaceReserver = $nbPlaceReserver;
    }

    /**
     * @return mixed
     */
    public function getRefVol()
    {
        return $this->refVol;
    }

    /**
     * @param mixed $refVol
     */
    public function setRefVol($refVol)
    {
        $this->refVol = $refVol;
    }

    /**
     * @return mixed
     */
    public function getRefUtilisateur()
    {
        return $this->refUtilisateur;
    }

    /**
     * @param mixed $refUtilisateur
     */
    public function setRefUtilisateur($refUtilisateur)
    {
        $this->refUtilisateur = $refUtilisateur;
    }

}