<?php

class Renderer
{
    public static function redirect($viewpath, $variables = [])
    {
        extract($variables);
        ob_start();
        require_once "vue/parties/$viewpath.html.php";
        $pageContent = ob_get_clean();
        require "vue/layout.html.php";
    }
}
