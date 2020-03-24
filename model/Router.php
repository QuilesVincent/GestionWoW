<?php

class Router{

    /**
     * @var string
     */
    private $viewPath;
    /**
     * @var AltoRouter
     */
    private $router;

    public function __construct($viewPath) {
        $this->viewPath = $viewPath;
    }
}

$router = new AltoRouter();