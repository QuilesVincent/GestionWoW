<?php


require_once "../controller/controleur.php";
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
    DeathKnight,
};

session_start();

$namePersonnage = $_POST["namePersonnage"];

switch($_POST['classe']) {
    case "rogue" :
        $newPersonnage = new Rogue($namePersonnage, $_POST['sex'], $_POST['race']);
        break;
    case "demonist":
        $newPersonnage = new Demonist($namePersonnage,$_POST['sex'], $_POST["race"]);
        break;
    case "war":
        $newPersonnage = new War($namePersonnage, $_POST['sex'], $_POST['race']);
        break;
    case "paladin":
        $newPersonnage = new Paladin($namePersonnage, $_POST['sex'], $_POST["race"]);
        break;
    case "hunt":
        $newPersonnage = new Hunt($namePersonnage, $_POST['sex'], $_POST["race"]);
        break;
    case "priest":
        $newPersonnage = new Priest($namePersonnage, $_POST['sex'], $_POST["race"]);
        break;
    case "shaman":
        $newPersonnage = new Shaman($namePersonnage, $_POST['sex'], $_POST["race"]);
        break;
    case "mage":
        $newPersonnage = new Mage($namePersonnage, $_POST['sex'], $_POST["race"]);
        break;
    case "monk":
        $newPersonnage = new Monk($namePersonnage, $_POST['sex'], $_POST["race"]);
        break;
    case "druid":
        $newPersonnage = new Druid ($namePersonnage, $_POST['sex'], $_POST["race"]);
        break;
    case "deathKnight":
        $newPersonnage = new DeathKnight($namePersonnage, $_POST['sex'], $_POST["race"]);
        break;
}




$personnageTransfert = serialize($newPersonnage);
$_SESSION['Personnage'] = $personnageTransfert;
$userObj->addPlayerToUser($_SESSION['userName']);
$personnageManagerObj->addPersonnage($_SESSION['id'], $namePersonnage, $newPersonnage->niveau, $newPersonnage->vie, $newPersonnage->totalEnergy, $newPersonnage->degat, $newPersonnage->race, $newPersonnage->classe);



header("location:mesPersos.php");



