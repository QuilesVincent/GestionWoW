<?php
require_once('../controller/controleur.php');
require_once('../vendor/autoload.php');

$firstName = $_POST['firstNameInscription'];
$lastName = $_POST['lastNameInscription'];
$userName = $_POST['userNameInscription'];
$password = $_POST['passwordInscription'];


if (empty($firstName) || empty($lastName) || empty($userName) || empty($password)) {
    $missDonnee = 'mdic=o';
    header("Location:pageInscriptionConnexion.php?page=0&$missDonnee");
} else {
    //On vérifie qu'il n'y a pas d'utilisateur avec l'username déjà prix
    //Si la réponse est vide ou nul, on effectue l'ajout à la base de donnée
    //On pense à bien sur sauvegarde les donnees utilisateurs dans des $_SESSION
    $verifUser = $userObj->getUser($userName);
    $donnees = $verifUser->fetch();
    if(empty($donnees))
    {
        $affectedLines = $userObj->addUser($firstName,$lastName, $userName,$password);
        session_start();
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['userName'] = $userName;
        $resp = $userObj->getIdUser($userName);
        $newDonne = $resp->fetch();
        $_SESSION['id'] = $newDonne['id_user'];
        $idSafe = htmlspecialchars($_SESSION['id']);
        header("Location:../partie_2_choix_personnage/choix_personnage_test1form.php?user=$idSafe&page=1");
    }
    else{
        header('Location:pageInscriptionConnexion.php?unf=o');
    }
}
//vérification de la présence d'un compte avec l'username avant la création du compte



?>