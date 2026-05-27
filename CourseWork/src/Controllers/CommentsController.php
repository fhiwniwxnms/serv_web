<?php

class CommentsController {
    public function store($id) {
        $text = $_POST['text'];
        $comment = new Comment();
        $comment->setArticleId($id);
        $comment->setUser(1);
        $comment->setText($text);
        $comment->save();
        header('Location: ' . BASE_URL . '/articles/' . $id);
        exit;
    }

    public function edit($id) {
        $commentModel = new Comment();
        $comment = $commentModel->getById($id);
        require_once __DIR__ . '/../../views/comments/edit.php';
    }

    public function update($id) {
    $text = $_POST['text'];
    $commentModel = new Comment();
    $commentData = $commentModel->getById($id); 
    $newComment = new Comment();
    $newComment->setArticleId($commentData['article_id']);
    $newComment->setUser($commentData['user_id']);
    $newComment->setText($text);
    $newComment->update($id);
    header('Location: ' . BASE_URL . '/articles/' . $commentData['article_id']);
    exit;
}
}