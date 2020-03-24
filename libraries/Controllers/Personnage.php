<?php


namespace Controllers;


class Personnage extends MainController
{
    protected $modelName = \Models\Personnage\PersonnageManager::class;
    protected $infoTranmission = [];
    public function __construct()
    {
        parent::__construct();
    }

    public function afficheAllPersonnage($id)
    {
        $resp = $this->model->findAll("id_target_user", $id);
        if($resp){
            return $resp;
        }
    }

    public function foundPersonnage($name)
    {
        $resp = $this->model->find("name_personnage", $name);
        if($resp) {
            $classePerso = $resp["classe_personnage"];
            switch($classePerso) {
                case "rogue" :
                    $newPersonnage = new \Models\Personnage\Classes\Rogue($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
                    break;
                case "demonist":
                    $newPersonnage = new \Models\Personnage\Classes\Demonist($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
                    break;
                case "war":
                    $newPersonnage = new \Models\Personnage\Classes\War($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
                    break;
                case "paladin":
                    $newPersonnage = new \Models\Personnage\Classes\Paladin($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
                    break;
                case "hunt":
                    $newPersonnage = new \Models\Personnage\Classes\Hunt($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
                    break;
                case "priest":
                    $newPersonnage = new \Models\Personnage\Classes\Priest($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
                    break;
                case "shaman":
                    $newPersonnage = new \Models\Personnage\Classes\Shaman($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
                    break;
                case "mage":
                    $newPersonnage = new \Models\Personnage\Classes\Mage($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
                    break;
                case "monk":
                    $newPersonnage = new \Models\Personnage\Classes\Monk($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
                    break;
                case "druid":
                    $newPersonnage = new \Models\Personnage\Classes\Druid ($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
                    break;
                case "deathKnight":
                    $newPersonnage = new \Models\Personnage\Classes\deathKnight($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
                    break;
            }
            $perso = serialize($newPersonnage);
            return $perso;
        }

    }

    public function creationPlayer($idTargetUser, $name, $classe, $sex, $race)
    {
        $verifNamePerso = $this->model->find("name_personnage", $name);
        if(empty($verifNamePerso)) {
            switch($classe) {
                case "rogue" :
                    $newPersonnage = new \Models\Personnage\Classes\Rogue($name, $sex, $race);
                    break;
                case "demonist":
                    $newPersonnage = new \Models\Personnage\Classes\Demonist($name, $sex, $race);
                    break;
                case "war":
                    $newPersonnage = new \Models\Personnage\Classes\War($name, $sex, $race);
                    break;
                case "paladin":
                    $newPersonnage = new \Models\Personnage\Classes\Paladin($name, $sex, $race);
                    break;
                case "hunt":
                    $newPersonnage = new \Models\Personnage\Classes\Hunt($name, $sex, $race);
                    break;
                case "priest":
                    $newPersonnage = new \Models\Personnage\Classes\Priest($name, $sex, $race);
                    break;
                case "shaman":
                    $newPersonnage = new \Models\Personnage\Classes\Shaman($name, $sex, $race);
                    break;
                case "mage":
                    $newPersonnage = new \Models\Personnage\Classes\Mage($name, $sex, $race);
                    break;
                case "monk":
                    $newPersonnage = new \Models\Personnage\Classes\Monk($name, $sex, $race);
                    break;
                case "druid":
                    $newPersonnage = new \Models\Personnage\Classes\Druid ($name, $sex, $race);
                    break;
                case "deathKnight":
                    $newPersonnage = new \Models\Personnage\Classes\DeathKnight($name, $sex, $race);
                    break;
            }
            $viePersonnage = $newPersonnage->getVie();
            $totalEnergyPersonnage = $newPersonnage->getTotalEnergy();
            $degatPersonnage = $newPersonnage->getDegat();
            $this->model->addPersonnage($idTargetUser, $name, $viePersonnage, $totalEnergyPersonnage, $degatPersonnage, $race, $classe, $sex);

        } else {
            $error = "Nom déjà prix";
            \Renderer::redirect("choixPersonnage/choixPersonnage", compact('error'));
        }
        

        
    }

}