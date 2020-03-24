<?php


namespace App\Personnage;
use App\Personnage\Race;


class Shaman extends Race
{

    public function __construct($name, $sex, $race)
    {
        parent::__construct($name, $sex, $race);
        $this->vie = 120;
        $this->arme = array("main"=>"masse", "second"=>"epée", "third"=>"baton");;
        $this->style = array("main"=>"healer", "second"=>"dps");
        $this->energy = "mana";
        $this->totalEnergy = 380;
        $this->typeDegat = "magie";
        $this->degat = 3;
        $this->classe = "shaman";
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
    public function multiHeal(){
        echo "Je soigne 3 personne en même temps";
    }
    public function totemDeFeu(){
        echo "je mets un totem qui fait 2 dégat aux personnes à moins de 10 mètres toutes les 3 secondes";
    }
    public function iterate(){
        foreach($this as $key => $value){
            echo $key. " => " .$value;
        }
    }
}