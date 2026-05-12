<?php 

require_once __DIR__ . '/../Models/Result.php';

class HomeController{
    public function index(){
        require 'Views/home.php';
    }

    public function ranking(){
        $results = Result::top10();

        require 'Views/ranking.php';
    }
}