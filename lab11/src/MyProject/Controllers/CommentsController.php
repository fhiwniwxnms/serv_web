<?php

namespace MyProject\Controllers;

use MyProject\Models\Comments\Comment;
use MyProject\View\View;
use MyProject\Models\Articles\Article;

class CommentsController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function edit_comment(int $commentId): void
    {
        $comment = Comment::getById($commentId);

        if ($comment === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment->setText($_POST['text']);
            $comment->save();
            header('Location: /web_labs_tsuprun/lab11/articles/' . $comment->getArticleId() .'/#comment' . $comment->getId());
            return;
        }

        $this->view->renderHtml('comments/edit.php', ['comment' => $comment]);
    }
}