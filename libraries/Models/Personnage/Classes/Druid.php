<?php

namespace Models\Personnage\Classes;

class Druid extends \Models\Personnage\Race\Race
{
    public $forme;

    public function __construct($name, $sex, $race)
    {
        parent::__construct($name, $sex, $race);
        $this->vie = 120;
        $this->arme = "baton";
        $this->style = array("main"=>"healer", "second"=>"dps");;
        $this->energy = "mana";
        $this->totalEnergy = 310;
        $this->typeDegat = array("main"=>"magie", "second"=>"physique" );
        $this->degat = 1;
        $this->classe = "druid";
        $this->forme = "human";
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
    public function getForme()
    {
        return $this->forme;
    }

    public function degat(){
        echo "ta vie descend de " .$this->degat;
    }
    public function transformationBear(){
        if($this->forme === "human"){
            echo "Je me transforme en ours";
            $this->forme = "ours";
            $this->energy = "rage";
            $this->degat = $this->degat * 2;
        }else{
            echo "tu es déjà en ours";
        }
    }
    public function transformationHuman(){
        if($this->forme == "ours"){
            $this->forme ="human";
            $this->energy = "mana";
            $this->degat = $this->degat / 2;
        }else{
            echo "tu es déjà human";
        }
    }
    public function regenerationSolo(){
        echo "je te pose une fleur qui te régénère 10 points de vie toutes les 3 secondes pendant 12 secondes";
    }
    public function iterate(){
        foreach($this as $key => $value){
            echo $key. " => " .$value;
        }
    }
}