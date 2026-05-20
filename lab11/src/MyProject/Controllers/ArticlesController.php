<?php

namespace MyProject\Controllers;

use MyProject\Models\Comments\Comment;
use MyProject\View\View;
use MyProject\Models\Articles\Article;

class ArticlesController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        
        $comments = Comment::getCommentByArticleId($articleId);

        $this->view->renderHtml('articles/view.php', ['article' => $article, 'comments' => $comments]);
    }

    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $article->setName($_POST['name']);
            $article->setText($_POST['text']);
            $article->save();
            header('Location: /web_labs_tsuprun/lab11/articles/' . $article->getId());
            return;
        }

        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }

    public function comment(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $comment = new Comment();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment->setAuthor(1);
            $comment->setArticleId($articleId);
            $comment->setText($_POST['text']);
            $comment->save();
            header('Location: /web_labs_tsuprun/lab11/articles/'  . $article->getId() . '/#comment' . $comment->getId());
            return;
        }
    }
}