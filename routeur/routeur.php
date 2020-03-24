<?php
require '../vendor/autoload.php';
$page = $_GET['page'] ?? '404';

if($_SERVER['REQUEST_URI'] === 'localhost/code/jeuxCombatPHPJS/routeur/routeur.php/inscription-connexion') {
    require '../partie_1_inscription_connexion/pageInscriptionConnexion.php';
}
