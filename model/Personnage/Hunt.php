<?php


namespace App\Personnage;
use App\Personnage\Race;
require_once 'TraitPet.php';

class Hunt extends Race
{
    use Pet;

    public function __construct($name, $sex, $race)
    {
        parent::__construct($name, $sex, $race);
        $this->vie = 120;
        $this->arme = "arc";
        $this->style = "dps";
        $this->energy = "mana";
        $this->totalEnergy = 330;
        $this->typeDegat = array("main"=>"physique", "second"=>"magie");
        $this->degat = 3;
        $this->classe = "hunt";
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
    public function arrowPerfect(){
        echo "toutes mes flèches font 30% de dégat en plus";
    }
    public function freeze(){
        echo "je te rend inutilisable pendant 5 secondes";
    }
    public function iterate(){
        foreach($this as $key => $value){
            echo $key. " => " .$value;
        }
    }
}