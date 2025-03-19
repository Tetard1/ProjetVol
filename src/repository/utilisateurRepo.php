<?php

class utilisateurRepo
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new BDD();
    }

    public function inscription(Utilisateur $user)
    {
        $req2 = $this->bdd->getBdd()->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $req2->execute(array(
            'email' => $user->getEmail(),
        ));
        $donne = $req2->fetch();
        if ($donne == NULL) {
            $sql = 'INSERT INTO utilisateur(nom,prenom,date_de_naissance,ville,email,mdp) 
                Values (:nom,:prenom,:date_de_naissance,:ville,:email,:mdp)';
            $req = $this->bdd->getBdd()->prepare($sql);
            $res = $req->execute(array(
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'date_de_naissance' => $user->getDateDeNaissance(),
                'ville' => $user->getVille(),
                'email' => $user->getEmail(),
                'mdp' => $user->getMdp(),
            ));
            var_dump($res);

            if ($res) {
                return true;
                echo "Votre profil a été créé ! ";
                header('Location:../../vue/Connexion.html');
            } else {
                return false;
            }
            exit();
        } else {
            echo "Vous avez déjà un compte, veuillez vous connecter ! ";
            header('Location: ../../index.php');
            exit();
        }
    }

    public function connexion(Utilisateur $user)
    {
        $sqlconnexion = 'SELECT * FROM utilisateur WHERE email = :email';
        $reqconnexion = $this->bdd->getBdd()->prepare($sqlconnexion);
        $reqconnexion->execute(array(
            'email' => $user->getEmail(),
        ));
        $donne = $reqconnexion->fetch();
        if ($donne && password_verify($user->getMdp(), $donne['mdp'])) {
            $user->setNom($donne['nom']);
            $user->setPrenom($donne['prenom']);
            $user->setDateDeNaissance($donne['date_de_naissance']);
            $user->setVille($donne['ville']);
            $user->setEmail($donne['email']);
            $user->setMdp($donne['mdp']);
            $user->setRole($donne['role']);
            $user->setIdUtilisateur($donne['id_utilisateur']);

            return $user;
        } else {
            return null;
        }

    }

    public function modification(Utilisateur $user)
    {
        //var_dump($_POST);
        $sqlmodification = "UPDATE utilisateur SET nom = :nom, prenom = :prenom, email = :email WHERE id_utilisateur = :id_utilisateur";
        $reqmodification = $this->bdd->getBdd()->prepare($sqlmodification);
        $resmodification = $reqmodification->execute(array(
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'date_de_naissance' => $user->getDateDeNaissance(),
            'ville' => $user->getVille(),
            'email' => $user->getEmail(),
            'id_utilisateur' => $user->getIdUtilisateur()
        ));
        header("Location: ../../vue/ModificationUtilisateur.php");
        return $resmodification ? "Modification réussie" : "Échec de la modification";
    }


    public function suppression(Utilisateur $user)
    {
        $sqlsuppression = 'DELETE FROM utilisateur WHERE id_utilisateur = :id_utilisateur';
        $reqsuppression = $this->bdd->getBdd()->prepare($sqlsuppression);
        $ressuppression = $reqsuppression->execute(array(
            'id_utilisateur' => $user->getIdUtilisateur()
        ));

        return $ressuppression ? "Suppression réussie" : "Échec de la suppression";
    }

    public function afficherUtilisateur(Utilisateur $user)
    {
        $affiche = "SELECT * FROM utilisateur WHERE id_utilisateur=:idUtilisateur";
        $req = $this->bdd->getBdd()->prepare($affiche);
        $req->execute(array(
            'idUtilisateur' => $user->getIdUtilisateur()));
        return $req->fetch();
    }

    public function deconnect()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../../index.php");
    }

}

