<?php
class pilotesRepo
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new BDD();
    }

    public function ajoutPilotes(pilotes $pilotes)
    {
        $sql = 'INSERT INTO pilotes(nomPilotes,prenomPilotes,genre,durée,affiche) VALUES (:nomPilotes,:prenomPilotes)';
        $req = $this->bdd->getBDD()->prepare($sql);
        $req->execute(array(
            'nomPilotes' => $pilotes->getnomPilotes(),
            'prenomPilotes' => $pilotes->getprenomPilotes(),
        ));
        header('location:../../vue/pilotesAffiche.php');
    }
    public function modifPilotes(pilotes $pilotes)
    {
        $sql = 'UPDATE `pilotes` SET `nomPilotes`=:nomPilotes,`prenomPilotes`=:prenomPilotes WHERE id_pilotes = :id';
        $req = $this->bdd->getBDD()->prepare($sql);
        $req->execute(array(
            'nomPilotes' => $pilotes->getnomPilotes(),
            'prenomPilotes' => $pilotes->getprenomPilotes(),
        ));
        header('location:../../vue/pilotesAffiche.php');
    }
    public function suppressionPilotes(pilotes $pilotes)
    {
        $sql = 'DELETE FROM pilotes WHERE id_pilotes = :id';
        $req = $this->bdd->getBDD()->prepare($sql);
        return $req->execute(array(
            'id' => $pilotes->getId()));
    }


    public
    function pilotesAffiche()
    {
        $sqlpilotes = 'SELECT * FROM pilotes';
        $reqpilotes = $this->bdd->getBDD()->prepare($sqlpilotes);
        $reqpilotes->execute();

        return $reqpilotes->fetchAll();
    }
}