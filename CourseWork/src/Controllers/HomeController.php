<?php

class HomeController {
    public function index() {
        $articleModel = new Article();
        $articles = $articleModel->getLatest(3);
        require_once __DIR__ . '/../../views/home/index.php';
    }
}