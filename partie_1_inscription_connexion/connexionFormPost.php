<?php

require_once '../controller/controleur.php';

$userName = $_POST['userNameConnexion'];
$passwordUser = $_POST['passwordConnexion'];

$req = $userObj->getuser($userName);
$resp = $req->fetch();
//Vérification du bon userName et bon password pour accepter la connexion
if($resp['userName'] == $userName && password_verify($passwordUser,$resp['userPassword']))
{
    session_start();
    $_SESSION['lastName'] = $resp['lastName'];
    $_SESSION['firstName'] = $resp['firstName'];
    $_SESSION['userName'] = $userName;

    $nombrePerso = $userObj->howManyPlayers($userName);
    $respNombrePerso = $nombrePerso->fetch();

    if($respNombrePerso['nombre_Personnage'] > 0){
        $req = $userObj->getIdUser($userName);
        $donnees = $req->fetch();
        $userDonnees = $donnees['id_user'];
        $_SESSION['id'] = $userDonnees;
        header("Location:../partie_2_choix_personnage/mesPersos.php");
    }else{
        $req = $userObj->getIdUser($userName);
        $donnees = $req->fetch();
        $userDonnees = $donnees['id_user'];
        $_SESSION['id'] = $userDonnees;
        header("Location:../partie_2_choix_personnage/choix_personnage_test1form.php?user=$userDonnees&page=1&nbrePlayer=$nbre");
    }
}   
else
{
    header('Location:pageInscriptionConnexion.php?errConnexion=1');
    
};
?>