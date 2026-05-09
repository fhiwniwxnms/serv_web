<?php

namespace MyProject\Controllers;

use MyProject\Services\Db;
use MyProject\View\View;
use MyProject\Models\Articles\Article;

class ArticlesController
{
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
        $this->db   = new Db();
    }

    public function view(int $articleId)
    {
        $result = $this->db->query(
            'SELECT * FROM `articles` WHERE id = :id;',
            [':id' => $articleId],
            Article::class
        );

        
        if ($result === []) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        
        $author = $this->db->query(
            'SELECT * FROM `users` WHERE id = :id;',
            [':id' => $result[0]->getAuthorId()]
        );

        if ($author === []) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
            
        $this->view->renderHtml('articles/view.php', ['article' => $result[0], 'author' => $author[0]], 200);
    }
}