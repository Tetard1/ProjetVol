<?php
class Vol
{
    private $idVol;
    private $destination;
    private $date;
    private $heure_depart;
    private $heure_arrive;
    private $ville_depart;
    private $ville_arrive;
    private $nbPlaceDispo;
    private $prix;
    private $refAvions;
    private $refPilotes;

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
    public function getIdVol()
    {
        return $this->idVol;
    }

    /**
     * @param mixed $idVol
     */
    public function setIdVol($idVol)
    {
        $this->idVol = $idVol;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param mixed $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getHeureDepart()
    {
        return $this->heure_depart;
    }

    /**
     * @param mixed $heure_depart
     */
    public function setHeureDepart($heure_depart)
    {
        $this->heure_depart = $heure_depart;
    }

    /**
     * @return mixed
     */
    public function getHeureArrive()
    {
        return $this->heure_arrive;
    }

    /**
     * @param mixed $heure_arrive
     */
    public function setHeureArrive($heure_arrive)
    {
        $this->heure_arrive = $heure_arrive;
    }

    /**
     * @return mixed
     */
    public function getVilleDepart()
    {
        return $this->ville_depart;
    }

    /**
     * @param mixed $ville_depart
     */
    public function setVilleDepart($ville_depart)
    {
        $this->ville_depart = $ville_depart;
    }

    /**
     * @return mixed
     */
    public function getVilleArrive()
    {
        return $this->ville_arrive;
    }

    /**
     * @param mixed $ville_arrive
     */
    public function setVilleArrive($ville_arrive)
    {
        $this->ville_arrive = $ville_arrive;
    }

    /**
     * @return mixed
     */
    public function getNbPlaceDispo()
    {
        return $this->nbPlaceDispo;
    }

    /**
     * @param mixed $nbPlaceDispo
     */
    public function setNbPlaceDispo($nbPlaceDispo)
    {
        $this->nbPlaceDispo = $nbPlaceDispo;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getRefAvions()
    {
        return $this->refAvions;
    }

    /**
     * @param mixed $refAvions
     */
    public function setRefAvions($refAvions)
    {
        $this->refAvions = $refAvions;
    }

    /**
     * @return mixed
     */
    public function getRefPilotes()
    {
        return $this->refPilotes;
    }

    /**
     * @param mixed $refPilotes
     */
    public function setRefPilotes($refPilotes)
    {
        $this->refPilotes = $refPilotes;
    }

}