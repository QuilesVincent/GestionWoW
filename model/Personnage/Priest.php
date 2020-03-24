<?php


namespace App\Personnage;
use App\Personnage\Race;

class Priest extends Race
{

    public function __construct($name, $sex, $race)
    {
        parent::__construct($name, $sex, $race);
        $this->vie = 120;
        $this->arme = "baton";
        $this->style = array("main"=>"healer", "second"=>"dps");
        $this->energy = "mana";
        $this->totalEnergy = 470;
        $this->typeDegat = "magie";
        $this->degat = 3;
        $this->classe = "priest";
    }

    public function getName()
    {
        return $this->name;
    }
    public function getSex()
    {
        return $this->sex;
    }
    public function getRace()
    {
        return $this->race;
    }
    public function getVie()
    {
        return $this->vie;
    }
    public function getArme()
    {
        return $this->arme;
    }
    public function getStyle()
    {
        return $this->style;
    }
    public function getEnergy()
    {
        return $this->energy;
    }
    public function getTotalEnergy()
    {
        return $this->totalEnergy;
    }
    public function getTypeDegat()
    {
        return $this->typeDegat;
    }
    public function getDegat()
    {
        return $this->degat;
    }
    public function getClasse()
    {
        return $this->classe;
    }

    public function degat(){
        echo "ta vie descend de " .$this->degat;
    }
    public function fullHeal(){
        echo "je soigne 3 fois plus vite";
    }
    public function fear(){
        echo "je te rend inutilisable";
    }
    public function iterate(){
        foreach($this as $key => $value){
            echo $key. " => " .$value;
        }
    }
}