<?php
class Pilotes
{
    private $idPilotes;
    private $nomPilotes;
    private $placeTotale;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);

    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdPilotes()
    {
        return $this->idPilotes;
    }

    /**
     * @param mixed $idPilotes
     */
    public function setIdPilotes($idPilotes)
    {
        $this->idPilotes = $idPilotes;
    }

    /**
     * @return mixed
     */
    public function getNomPilotes()
    {
        return $this->nomPilotes;
    }

    /**
     * @param mixed $nomPilotes
     */
    public function setNomPilotes($nomPilotes)
    {
        $this->nomPilotes = $nomPilotes;
    }

    /**
     * @return mixed
     */
    public function getPlaceTotale()
    {
        return $this->placeTotale;
    }

    /**
     * @param mixed $placeTotale
     */
    public function setPlaceTotale($placeTotale)
    {
        $this->placeTotale = $placeTotale;
    }


}