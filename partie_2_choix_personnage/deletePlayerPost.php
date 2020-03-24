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
$data = $_POST["delete"];
$personnageManagerObj->deletePersonnage($data, $_SESSION['id']);