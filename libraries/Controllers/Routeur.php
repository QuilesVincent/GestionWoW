<?php


namespace Controllers;

class Routeur extends mainController
{
    protected $modelName = \Models\Routeur\Routeur::class;
    protected $controllerUser;
    protected $controllerPersonnage;
 
    public function __construct()
    {
        parent::__construct();
        $this->controllerUser = new \Controllers\User();
        $this->controllerPersonnage = new \Controllers\Personnage();
    }

    public function chargerOne()
    {
        //If it's a connexion of an user already exist
        if(isset($_POST['submitConnexion'])) {
            //Check for the connexion in userController
            $this->controllerUser->connexion($_POST['userNameConnexion'], $_POST['passwordConnexion']);
            //If it was good, we have infoTransmission array
            if($this->controllerUser->infoTransmission) {
                //recuperate the info of the array
                $infoUser = $this->controllerUser->infoTransmission['info_user'];
                //If the player already has personnage, 
                if($this->controllerUser->infoTransmission['containsPersonnage']) {
                    // charge all personnage of the user and redirect with data on the page of his personnages
                    $personnages = $this->controllerPersonnage->afficheAllPersonnage($this->controllerUser->infoTransmission['info_user']['id_user']);
                    $pageTitle = "Mes Persos";
                    \Renderer::redirect("mesPersos/mesPersos", compact("personnages", "infoUser", "pageTitle"));
                //If the player has'nt yet personnage, redirect on the page of creation personnages
                } else {
                    $pageTitle = "Choix Personnage";
                    \Renderer::redirect('choixPersonnage/choixPersonnage', compact('infoUser', 'pageTitle'));
                }
            }
        //If it's an incription
        } else {
            //Do the inscription
            $this->controllerUser->inscription($_POST['firstNameInscription'], $_POST['lastNameInscription'], $_POST['userNameInscription'], $_POST['passwordInscription']);
            //recuperate the info of the array
            $infoUser = $this->controllerUser->getInfoTransmission();
            $pageTitle = "Création du personnage";
            //redirect on the page of creation personnage to create a new personnage
            \Renderer::redirect('choixPersonnage/choixPersonnage', compact('infoUser', 'pageTitle'));
        }
        
    }
    
    public function chargeNewPersonnage()
    {
        \Http::redirect('index.php?controllers=afficheur&task=afficheCreationPersonnage');
    }
    //Function to return on the page mesPersos after delete a personnage
    public function chargeBackMesPersos()
    {
        //Find the data of the personnage with the name in the get
        $reqUser = $this->controllerPersonnage->model->find("name_personnage", $_GET['name_personnage']);
        //take the id user
        $reqUserId = $reqUser['id_target_user'];
        //Delete the personnage with the namepersonnage and the iduser
        $this->controllerPersonnage->model->deletePersonnage($_GET['name_personnage'], $reqUserId);
        //Record the personnages of the user without the last delete
        $personnages = $this->controllerPersonnage->afficheAllPersonnage($reqUserId);
        $pageTitle = "Mes Persos";
        //Redirect on the page mes persos
        \Renderer::redirect("mesPersos/mesPersos", compact("personnages", "pageTitle"));
    }

    public function creationPlayer()
    {
        //If we have data of post
        if($_POST['namePersonnage']) {
            //Create a personnage with all the data necessary in the game and in the table sql
            $this->controllerPersonnage->creationPlayer($_GET['user'], $_POST['namePersonnage'], $_POST['classe'], $_POST['sex'], $_POST['race']);
            //set in the table sql user the new number of personnages
            $this->controllerUser->addPersonnageToUser($_GET['user']);
            //Recuperate all the personnages of the user
            $personnages = $this->controllerPersonnage->afficheAllPersonnage($_GET['user']);
            //Redirect on the page of mesPersos
            \Renderer::redirect('mesPersos/mesPersos', compact('personnages'));
        }
    }

    public function goMapp()
    {
        $namePersonnage = $_GET['name_personnage'];
        $pageTitle = "mapp";
        //Search the personnage with the name send in a get
        $resp = $this->controllerPersonnage->foundPersonnage($namePersonnage);
        //Redirect on the mapp with the data
        \Renderer::redirect('mapp/mapp', compact('resp', "pageTitle"));
    }


}