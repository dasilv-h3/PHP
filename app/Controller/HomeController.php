<?php

class HomeController {

    public function home() {
        $cssName = "home.css";
        $pageTitle = "Home";
        ob_start();
        require_once "app/View/home.php";
        $content = ob_get_clean();
        require_once "base.php";
    }
}