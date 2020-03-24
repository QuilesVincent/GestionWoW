<?php
namespace Models\Personnage;

abstract class Player
{

    public $name;
    public $niveau;
    public $vie;
    public $arme;
    public $style;
    public $energy;
    public $totalEnergy;
    public $typeDegat;
    public $degat;
    public $classe;
    public $sex;


    public function __construct($name, $sex){
        $this->name = $name;
        $this->niveau = 1;
        $this->sex = $sex;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getSex()
    {
        return $this->sex;
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
}