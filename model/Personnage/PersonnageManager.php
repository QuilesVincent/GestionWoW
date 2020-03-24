<?php

namespace App\Personnage;
use App\Pdo\DBManager as DBManagerAlias;
use PDO;


class PersonnageManager extends DBManagerAlias
{
    public function getAllPersonnage()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT name_personnage FROM personnage');
        return $req;
    }
    //Function pour selectionner un user en fonction de son username
    public function getPersonnageByName($namePersonnage)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT name_personnage, niveau_personnage, vie_personnage, total_energy_personnage, degat_personnage, race_personnage, classe_personnage FROM personnage WHERE name_personnage = :name_personnage');
        $req->execute(array(
            ':name_personnage' => $namePersonnage
        ));
        return $req;
    }
    //Function pour selectionner un user en fonction de son id
    public function getPersonnageByUserTarget($id_target_user)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM personnage WHERE id_target_user = :id_target_user');
        $req->execute(array(
            ':id_target_user' => $id_target_user
        ));
        return $req;
    }
    //Function pour selectionner l'id d'un user en fonction de son username
    public function getIDUser($name_personnage)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id_personnage FROM personnage WHERE name_personnage = :name_personnage');
        $req->execute(array(
            ':name_personnage' => $name_personnage,
        ));
        return $req;
    }
    //Function pour vérifier la validité d'un user en fonction de : username, secretQuestion et secretQuestionAnswser

    //Function pour ajouter un user
    public function addPersonnage($id_target_user, $name_personnage, $niveau_personnage, $vie_personnage, $total_energy_personnage, $degat_personnage, $race_personnage, $classe_personnage)
    {
        $reqVerif = $this->getPersonnageByName($name_personnage);
        $respReqVerif = $reqVerif->fetch();
        if(empty($respReqVerif))
        {
            $db = $this->dbConnect();
            $req = $db->prepare('INSERT INTO Personnage (id_target_user, name_personnage, niveau_personnage, vie_personnage, total_energy_personnage, degat_personnage, race_personnage, classe_personnage) VALUES (:id_target_user, :name_personnage, :niveau_personnage, :vie_personnage, :total_energy_personnage, :degat_personnage, :race_personnage, :classe_personnage)');
            $req->bindValue(':id_target_user', $id_target_user, PDO::PARAM_INT);
            $req->bindValue(':name_personnage', $name_personnage, PDO::PARAM_STR);
            $req->bindValue(':niveau_personnage', $niveau_personnage, PDO::PARAM_INT);
            $req->bindValue(':vie_personnage', $vie_personnage, PDO::PARAM_INT);
            $req->bindValue(':total_energy_personnage', $total_energy_personnage, PDO::PARAM_INT);
            $req->bindValue(':degat_personnage', $degat_personnage, PDO::PARAM_INT);
            $req->bindValue(':race_personnage', $race_personnage, PDO::PARAM_STR);
            $req->bindValue(':classe_personnage', $classe_personnage, PDO::PARAM_STR);

            $affectedLines = $req->execute();
            return $affectedLines;
        }
    }
    //function to delete a personnage
    public function deletePersonnage(string $name_personnage, int $id_user_target)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM Personnage WHERE name_personnage = ? AND id_target_user = ?');
        $affectedLines = $req->execute(array($name_personnage,$id_user_target));
        return $affectedLines;
    }
    //reste celle la à faire
    //Function pour modifier les informations de comptes d'un user
    //up d'un le level du personnage
    public function upLevelPersonnage($niveau_personnage, $name_personnage)
    {
        $niveau_personnage++;
        $db = $this->dbConnect();
        $req = $db->prepare("UPDATE Personnage SET niveau_personnage = :niveau_personnage WHERE name_personnage = :name_personnage");

        $req->bindValue(':niveau_personnage', $niveau_personnage, PDO::PARAM_INT);
        $req->bindValue(':name_personnage', $name_personnage, PDO::PARAM_STR);
        $affectedLines = $req->execute();
        return $affectedLines;
    }
    public function upLifePersonnage($vie_personnage, $name_personnage)
    {
        $vie_personnage = $vie_personnage * 1.1;
        $db = $this->dbConnect();
        $req = $db->prepare("UPDATE Personnage SET vie_personnage = :vie_personnage WHERE name_personnage = :name_personnage");

        $req->bindValue(':vie_personnage', $vie_personnage, PDO::PARAM_INT);
        $req->bindValue(':name_personnage', $name_personnage, PDO::PARAM_STR);
        $affectedLines = $req->execute();
        return $affectedLines;
    }
    public function upDegatPersonnage($degat_personnage, $name_personnage)
    {
        $degat_personnage++;
        $db = $this->dbConnect();
        $req = $db->prepare("UPDATE user SET degat_personnage = :degat_personnage WHERE name_personnage = :name_personnage");

        $req->bindValue(':degat_personnage', $degat_personnage, PDO::PARAM_INT);
        $req->bindValue(':name_personnage', $name_personnage, PDO::PARAM_STR);
        $affectedLines = $req->execute();
        return $affectedLines;
    }

}