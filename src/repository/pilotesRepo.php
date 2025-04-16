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
        $sql = 'INSERT INTO pilotes(nomPilotes,prenomPilotes) VALUES (:nomPilotes,:prenomPilotes)';
        $req = $this->bdd->getBDD()->prepare($sql);
        $req->execute(array(
            'nomPilotes' => $pilotes->getnomPilotes(),
            'prenomPilotes' => $pilotes->getprenomPilotes(),
        ));
        header('location:../../vue/afficherPilotes.php');
    }
    public function modifPilotes(pilotes $pilotes)
    {
        $sql = 'UPDATE `pilotes` SET `nomPilotes`=:nomPilotes,`prenomPilotes`=:prenomPilotes WHERE id_pilotes = :id';
        $req = $this->bdd->getBDD()->prepare($sql);
        $req->execute(array(
            'nomPilotes' => $pilotes->getnomPilotes(),
            'prenomPilotes' => $pilotes->getprenomPilotes(),
            'id' => $pilotes->getIdPilotes()
        ));
        header('location:../../vue/afficherPilotes.php');
    }
    public function suppressionPilotes(pilotes $pilotes)
    {
        $sql = 'DELETE FROM pilotes WHERE id_pilotes = :id';
        $req = $this->bdd->getBDD()->prepare($sql);
        return $req->execute(array(
            'id' => $pilotes->getIdPilotes()));
    }


    public
    function pilotesAffiche()
    {
        $sqlpilotes = 'SELECT * FROM pilotes';
        $reqpilotes = $this->bdd->getBDD()->prepare($sqlpilotes);
        $reqpilotes->execute();

        return $reqpilotes->fetchAll();
    }
    public function afficherLePilotes(Pilotes $pilotes){
        $show="SELECT nomPilotes,prenomPilotes FROM `pilotes` WHERE id_pilotes=:idPilotes
            ORDER BY nomPilotes ASC";
        $req=$this->bdd->getBdd()->prepare($show);
        $req->execute([
            'idPilotes'=>$pilotes->getIdPilotes()
        ]);
        return $req->fetch();
    }
}