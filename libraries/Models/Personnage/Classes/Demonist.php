<?php


namespace Models\Personnage\Classes;


class Demonist extends \Models\Personnage\Race\Race
{
    use \Models\Personnage\Pet\Pet;;

    public function __construct($name, $sex, $race)
    {
        parent::__construct($name, $sex, $race);
        $this->vie = 120;
        $this->arme = "baton";
        $this->style = "dps";
        $this->energy = "mana";
        $this->totalEnergy = 420;
        $this->typeDegat = "magie";
        $this->degat = 3;
        $this->classe = "demonist";
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
    public function teleportation(){
        echo "Je me teleporte ailleur";
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