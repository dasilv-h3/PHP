<?php
require_once "app/Model/ImageModel.php";

class BaseController {
    private $db;

    public function __construct($db) {
        $this->imageModel = new ImageModel($db);
    }
    public function index(){
        $cssName = "base.css";
        ob_start();
        require_once "app/View/base.php";
        $content = ob_get_clean();
        require_once "base.php";
    }
}