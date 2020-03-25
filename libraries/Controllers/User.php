<?php


namespace Controllers;


class User extends \Controllers\MainController
{
    public $modelName = \Models\User\UserManager::class;
    public $containsPersonnage = false;
    public $infoTransmission = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function connexion($UserName, $password)
    {
        //reset the information of transmission
        $this->resetInformation();
        //Check user with username and password
        $resp = $this->model->userVerification($UserName, $password);
        //If it's good, add in infoTransmission the key info_user with the data of user
        if($resp) {
            $this->infoTransmission['info_user'] = $resp;
            //If user already has personnage, add in infoTransmission the key cotainsPersonnage with the data true
            if($resp['nombre_Personnage'] > 0){
                $this->infoTransmission["containsPersonnage"] = true;
            }
            //If THE userVerification did bad, redirect with a notation get
        } else {
            \Http::redirect('index.php?identif=wrong');
        }
    }

    public function inscription($firstName, $lastName, $userName, $password)
    {
        //reset the information of transmission
        $this->resetInformation();
        //Check if userName already existes
        $verifUserNameFree = $this->model->find("userName", $userName);
        //If doesn't
        if(empty($verifUserNameFree)) {
            //add user in the table user
            $this->model->addUser($lastName, $firstName, $userName, $password);
            //Add in infoTransmission the key info_user this all the data on the user found with the function find
            $this->infoTransmission['info_user'] = $this->model->find('userName', $userName);
        //If does, redirect with notation get userName not free
        } else {
            \Http::redirect('index.php?userName=nf');
        }
    }

    public function addPersonnageToUser($idUser)
    {
        //Find the user with the id
        $req = $this->model->find('id_user', $idUser);
        //If existes
        if($req) {
            //recuperate the number of the personnage and add 1
            $newNumber = $req['nombre_Personnage'] + 1;
            //Set the new number of the number of personnage
            $this->model->addPlayerToUser($newNumber, $idUser);
        }

    }

    public function resetInformation()
    {
        $this->infoTransmission = [];
    }

    public function getInfoTransmission(): array
    {
        return $this->infoTransmission;
    }

    public function logOut()
    {
        session_start();
        $_SESSION = [];
        session_destroy();
        \Http::redirect('index.php');
    }

}