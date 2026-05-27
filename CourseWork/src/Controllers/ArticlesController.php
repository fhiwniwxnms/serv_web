<?php 

class ArticlesController {
    public function index() {
        $article = new Article();
        $articles = $article->getAll();
        require_once __DIR__ . '/../../views/articles/index.php';
    }

    public function show($id) {
        $articleModel = new Article();
        $article = $articleModel->getById($id);
        $commentsModel = new Comment();
        $comments = $commentsModel->getByArticleId($id);
        require_once __DIR__ . '/../../views/articles/show.php';
    }
}