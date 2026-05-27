<?php

class AdminController {

    public function articles() {
        $articleModel = new Article();
        $articles = $articleModel->getAll();
        require_once __DIR__ . '/../../views/admin/articles/index.php';
    }

    public function createArticle() {
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        require_once __DIR__ . '/../../views/admin/articles/create.php';
    }

    public function storeArticle() {
        $article = new Article();
        $article->setTitle($_POST['title']);
        $article->setText($_POST['text']);
        $article->setAuthor_id(1);
        $article->setCategory_id($_POST['category_id']);
        $article->save();
        header('Location: ' . BASE_URL . '/admin/articles');
        exit;
    }

    public function editArticle($id) {
        $articleModel = new Article();
        $article = $articleModel->getById($id);
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        require_once __DIR__ . '/../../views/admin/articles/edit.php';
    }

    public function updateArticle($id) {
        $articleModel = new Article();
        $article = $articleModel->getById($id);
        $newArticle = new Article();
        $newArticle->setTitle($_POST['title']);
        $newArticle->setText($_POST['text']);
        $newArticle->setAuthor_id($article['author_id']);
        $newArticle->setCategory_id($_POST['category_id']);
        $newArticle->update($id);
        header('Location: ' . BASE_URL . '/admin/articles');
        exit;
    }

    public function deleteArticle($id) {
        $articleModel = new Article();
        $articleModel->delete($id);
        header('Location: ' . BASE_URL . '/admin/articles');
        exit;
    }

    public function comments() {
        $commentModel = new Comment();
        $comments = $commentModel->getAllWithArticles();
        require_once __DIR__ . '/../../views/admin/comments/index.php';
    }

    public function deleteComment($id) {
        $commentModel = new Comment();
        $commentModel->delete($id);
        header('Location: ' . BASE_URL . '/admin/comments');
        exit;
    }
}