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
        $this->resetInformation();
        $resp = $this->model->userVerification($UserName, $password);
        if($resp) {
            $this->infoTransmission['info_user'] = $resp;
            if($resp['nombre_Personnage'] > 0){
                $this->infoTransmission["containsPersonnage"] = true;
            }
        } else {
            \Http::redirect('index.php?identif=wrong');
        }
    }

    public function inscription($firstName, $lastName, $userName, $password)
    {
        $this->resetInformation();
        $verifUserNameFree = $this->model->find("userName", $userName);
        if(empty($verifUserNameFree)) {
            $this->model->addUser($lastName, $firstName, $userName, $password);
            $this->infoTransmission['info_user'] = $this->model->find('userName', $userName);
        } else {
            \Http::redirect('index.php?userName=nf');
        }
    }

    public function addPersonnageToUser($idUser, $userName)
    {
        $req = $this->model->find('id_user', $idUser);
        if($req) {
            $newNumber = $req['nombre_Personnage'] + 1;
            $this->model->addPlayerToUser($newNumber, $userName);
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