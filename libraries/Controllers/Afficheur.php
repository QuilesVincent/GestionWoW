<?php

namespace Controllers;

class Afficheur
{

    public function afficheConnexion()
    {
        $pageTitle = "Connexion/inscription";
        \Renderer::redirect('connexionInscription/pageConnexionInscription', compact("pageTitle"));
    }

    public function afficheCreationPersonnage()
    {
        \Renderer::redirect('choixPersonnage/choixPersonnage');
    }

}