<?php

class PJ
{
    protected $name;
    protected $sex;
    protected $race;
    protected $classe;

    public function __construct($name, $sex, $race, $classe)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->race = $race;
        $this->classe = $classe;
    }
}