<?php


namespace Models\Personnage\Classes;

class Paladin extends \Models\Personnage\Race\Race
{


    public function __construct($name, $sex, $race)
    {
        parent::__construct($name, $sex, $race);
        $this->vie = 120;
        $this->arme = array("main"=>"masse", "second"=>"epée");
        $this->style = array("main"=>"dps", "second"=>"healer");;
        $this->energy = "mana";
        $this->totalEnergy = 310;
        $this->typeDegat = array("main"=>"magie", "second"=>"physique" );
        $this->degat = 3;
        $this->classe = "paladin";
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
    public function healSort(){
        echo "Je me soigne de 10%";
    }
    public function staunt(){
        echo "je te rend inutilisable pendant 3 sec";
    }
    public function iterate(){
        foreach($this as $key => $value){
            echo $key. " => " .$value;
        }
    }
}