<?php


namespace App\Personnage;
use App\Personnage\Race;

class Monk extends Race
{

    public function __construct($name, $sex, $race)
    {
        parent::__construct($name, $sex, $race);
        $this->vie = 120;
        $this->arme = array("main"=>"masse", "second"=>"epée", "third"=>"baton");
        $this->style = array("main"=>"dps", "second"=>"healer");;
        $this->energy = "mana";
        $this->totalEnergy = 310;
        $this->typeDegat = array("main"=>"physique", "second"=>"magie" );
        $this->degat = 1;
        $this->classe = "monk";
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
    public function priereDuSage(){
        echo "Regeneration de 50 % mana et 25 % vie, pour tout mon groupe";
    }
    public function iterate(){
        foreach($this as $key => $value){
            echo $key. " => " .$value;
        }
    }
}