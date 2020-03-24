<?php


namespace App\Personnage;
use App\Personnage\Race;


class DeathKnight extends Race
{

    public function __construct($name, $sex, $race)
    {
        parent::__construct($name, $sex, $race);
        $this->vie = 120;
        $this->arme = array("main"=>"epée", "second"=>"hache");
        $this->style = "dps";;
        $this->energy = "puissance runique";
        $this->totalEnergy = 150;
        $this->typeDegat = array("main"=>"physique", "second"=>"runique" );
        $this->degat = 3;
        $this->classe = "deathKnight";
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
    public function frenesieImpie(){
        echo "Je frappe 2 fois plus vite";
    }
    public function poigneDeLaMort(){
        echo "je t'attrape et t'amène directement vers moi";
    }
    public function iterate(){
        foreach($this as $key => $value){
            echo $key. " => " .$value;
        }
    }
}