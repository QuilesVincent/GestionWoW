<?php


namespace Controllers;

class Routeur extends mainController
{
    protected $modelName = \Models\Routeur\Routeur::class;
    protected $controllerUser;
    protected $controllerPersonnage;
    protected $controllerGaming;
 
    public function __construct()
    {
        parent::__construct();
        $this->controllerUser = new \Controllers\User();
        $this->controllerPersonnage = new \Controllers\Personnage();
        $this->controllerGaming = new \Controllers\Gaming();
    }

    public function chargerOne()
    {
        if(isset($_POST['submitConnexion'])) {
            $this->controllerUser->connexion($_POST['userNameConnexion'], $_POST['passwordConnexion']);
            if($this->controllerUser->infoTransmission) {
                $infoUser = $this->controllerUser->infoTransmission['info_user'];
                if($this->controllerUser->infoTransmission['containsPersonnage']) {
                    $personnages = $this->controllerPersonnage->afficheAllPersonnage($this->controllerUser->infoTransmission['info_user']['id_user']);
                    $pageTitle = "Mes Persos";
                    \Renderer::redirect("mesPersos/mesPersos", compact("personnages", "infoUser", "pageTitle"));
                } else {
                    $pageTitle = "Choix Personnage";
                    \Renderer::redirect('choixPersonnage/choixPersonnage', compact('infoUser', 'pageTitle'));
                }
            }
        } else {
            $this->controllerUser->inscription($_POST['firstNameInscription'], $_POST['lastNameInscription'], $_POST['userNameInscription'], $_POST['passwordInscription']);
            $infoUser = $this->controllerUser->getInfoTransmission();
            $pageTitle = "Création du personnage";
            \Renderer::redirect('choixPersonnage/choixPersonnage', compact('infoUser', 'pageTitle'));
        }
        
    } 

    public function creationPlayer()
    {
        $this->controllerPersonnage->creationPlayer($_GET['user'], $_POST['namePersonnage'], $_POST['classe'], $_POST['sex'], $_POST['race']);
        $userModel = new \Models\User\UserManager();
        $req = $userModel->find("id_user", $_GET['user']);
        $this->controllerUser->addPersonnageToUser($_GET['user'], $req['userName']);
        $personnages = $this->controllerPersonnage->afficheAllPersonnage($_GET['user']);
        \Renderer::redirect('mesPersos/mesPersos', compact('personnages'));

    }

    public function goMapp()
    {
        $article = $_GET['name_personnage'];
        $pageTitle = "mapp";
        $resp = $this->controllerPersonnage->foundPersonnage($article);
        \Renderer::redirect('mapp/mapp', compact('resp', "pageTitle"));
    }


}