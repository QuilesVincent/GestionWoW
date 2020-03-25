<?php


namespace Models\User;
Use Pdo;

class UserManager extends \Models\MainModel
{
    private $nbreUser = 0; //Incrémenté cette variable à chaque création d'utilisateur ou décrémenté à chaque suppression
    //Function pour selectionner tous les user
    public $errors = [];
    public $donneesrUser = [];
    protected $table = "user";

    public function userVerification(string $userName, string $userPassword)
    {
        //$passwordCryptUser = password_hash($passwordUser, PASSWORD_DEFAULT);
        $req = $this->pdo->prepare('SELECT * FROM user WHERE userName = :userName');
        $req->execute(array(
            ':userName' => $userName
        ));
        $resp = $req->fetch();
        if(password_verify($userPassword, $resp['userPassword'])){
            return $resp;
        }else{
            return false;
        }
    }

    //Function pour vérifier la validité d'un user en fonction de : username, secretQuestion et secretQuestionAnswser
    public function getUserResetPass(string $userName, string $secretQuestion, string $secretQuestionAnswer)
    {
        $req = $this->pdo->prepare('SELECT * FROM user WHERE userName = :userName AND secretQuestion = :secretQuestion AND secretQuestionAnswer = :secretQuestionAnswer');
        $req->execute(array(
            ':userName' => $userName,
            ':secretQuestion' => $secretQuestion,
            ':secretQuestionAnswer' => $secretQuestionAnswer
        ));
        return $req;
    }

    //Function pour ajouter un user
    public function addUser(string $lastName, string $firstName, string $userName, string $password):void
    {
        $passwordCrypt = password_hash($password, PASSWORD_DEFAULT);
        $req = $this->pdo->prepare('INSERT INTO user (lastName, firstName, userName, userPassword) VALUES (:lastName, :firstName, :userName, :userPassword)');
        $req->bindValue(':lastName',$lastName, \PDO::PARAM_STR);
        $req->bindValue(':firstName',$firstName, \PDO::PARAM_STR);
        $req->bindValue(':userName',$userName, \PDO::PARAM_STR);
        $req->bindValue(':userPassword',$passwordCrypt, \PDO::PARAM_STR);
        
        $req->execute();
    }

    //function pour ajouter le personnage à un compte User
    public function addPlayerToUser(int $newNumber, int $idUser)
    {
        $req = $this->pdo->prepare('UPDATE user SET nombre_Personnage = :nombre_Personnage WHERE id_user = :idUser');
        $req->bindValue(':nombre_Personnage', $newNumber, \PDO::PARAM_INT);
        $req->bindValue(':idUser', $idUser, \PDO::PARAM_INT);
        $req->execute();
    }

    //Function pour modifier le password d'un user
    public function modificationUserPassword(string $userName, string $secretQuestionAnswer, string $password)
    {
        $passwordCrypt = password_hash($password, PASSWORD_DEFAULT);
        $req = $this->pdo->prepare('UPDATE user SET userPassword = :newUserPassword WHERE userName = :userName AND secretQuestionAnswer = :secretQuestionAnswer');
        $donnees = $req->execute(array(
            ':newUserPassword' => $passwordCrypt,
            ':userName' => $userName,
            ':secretQuestionAnswer' => $secretQuestionAnswer,
        ));
    }

    //Function pour modifier les informations de comptes d'un user
    public function modificationUserInformation(string $newLastName, string $newFirstName, string $newUserName, string $newUserPassword, string $newSecretQuestion, string $newSecretQuestionAnswer, string $userName)
    {
        $newPasswordCrypt = password_hash($newUserPassword, PASSWORD_DEFAULT);
        $req = $this->pdo->prepare("UPDATE user SET lastName = :newLastName, firstName = :newFirstName, userName = :newUserName, userPassword = :newUserPassword, secretQuestion = :newSecretQuestion, secretQuestionAnswer = :newSecretQuestionAnswer WHERE userName = :userName");
        
        $req->bindValue(':newLastName', $newLastName, \PDO::PARAM_STR);
        $req->bindValue(':newFirstName', $newFirstName, \PDO::PARAM_STR);
        $req->bindValue(':newUserName', $newUserName, \PDO::PARAM_STR);
        $req->bindValue(':newUserPassword', $newPasswordCrypt, \PDO::PARAM_STR);
        $req->bindValue(':newSecretQuestion', $newSecretQuestion, \PDO::PARAM_STR);
        $req->bindValue(':newSecretQuestionAnswer', $newSecretQuestionAnswer, \PDO::PARAM_STR);
        $req->bindValue(':userName', $userName, \PDO::PARAM_STR);

        $req->execute();
    }

}

?>