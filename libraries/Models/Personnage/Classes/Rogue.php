<?php

namespace Models\Personnage\Classes;


class Rogue extends \Models\Personnage\Race\Race
{


    public $visibility;

    //la function iterate marche pour les public mais pas static; chercher comment iterate du static

    public function __construct($name, $sex, $race)
    {
        parent::__construct($name, $sex, $race);
        $this->vie = 110;
        $this->arme = "dague";
        $this->style = "dps";
        $this->energy = "energy";
        $this->totalEnergy = 110;
        $this->typeDegat = "physique";
        $this->degat = 2;
        $this->classe = "rogue";
        $this->visibility = 100;

    }


    public function getVisibility()
    {
        return $this->visibility;
    }
    public function degat(){
        echo "ta vie descend de " .$this->degat;
    }
    public function camouflage(){
        echo "Je disparait dans l'ombre";
        $this->visibility = 0;
    }
    public function visible(){
        echo "Je suis de nouveau la";
        echo $this->visibility;
        $this->visibility = 100;
    }
    public function iterate(){
        foreach($this as $key => $value){
            echo $key. " => " .$value;
        }
    }
}