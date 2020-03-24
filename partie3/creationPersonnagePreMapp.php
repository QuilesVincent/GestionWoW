<?php

require_once '../controller/controleur.php';
use App\Personnage\{
    Rogue,
    Demonist,
    War,
    Paladin,
    Hunt,
    Priest,
    Shaman,
    Mage,
    Monk,
    Druid,
    DeathKnight
};
session_start();

$req = $_POST["param1"];
echo $_POST["param1"];

//Recherche du personnage grâce au nom envoyer en POST depuis le fichier "mesPersos.js"
$req = $personnageManagerObj->getPersonnageByName($_POST["param1"]);
$resp = $req->fetch();

$_SESSION["name_personnage"] = $resp["name_personnage"];
$classePerso = $resp["classe_personnage"];

switch($classePerso) {
    case "rogue" :
        $newPersonnage = new Rogue($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
        break;
    case "demonist":
        $newPersonnage = new Demonist($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
        break;
    case "war":
        $newPersonnage = new War($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
        break;
    case "paladin":
        $newPersonnage = new Paladin($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
        break;
    case "hunt":
        $newPersonnage = new Hunt($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
        break;
    case "priest":
        $newPersonnage = new Priest($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
        break;
    case "shaman":
        $newPersonnage = new Shaman($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
        break;
    case "mage":
        $newPersonnage = new Mage($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
        break;
    case "monk":
        $newPersonnage = new Monk($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
        break;
    case "druid":
        $newPersonnage = new Druid ($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
        break;
    case "deathKnight":
        $newPersonnage = new deathKnight($resp["name_personnage"], $resp["sex_personnage"], $resp["race_personnage"]);
        break;
}


$newPersoSerialize = serialize($newPersonnage);
$_SESSION["personnage_select"] = $newPersoSerialize;