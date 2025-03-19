<?php
class Avions
{
    private $idAvions;
    private $nomAvions;
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
    public function getIdAvions()
    {
        return $this->idAvions;
    }

    /**
     * @param mixed $idAvions
     */
    public function setIdAvions($idAvions)
    {
        $this->idAvions = $idAvions;
    }

    /**
     * @return mixed
     */
    public function getNomAvions()
    {
        return $this->nomAvions;
    }

    /**
     * @param mixed $nomAvions
     */
    public function setNomAvions($nomAvions)
    {
        $this->nomAvions = $nomAvions;
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