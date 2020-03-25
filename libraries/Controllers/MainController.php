<?php


namespace Controllers;


abstract class MainController
{
    protected $model;
    protected $modelName;

    public function __construct()
    {
        $this->model = new $this->modelName();
    }
}




?>