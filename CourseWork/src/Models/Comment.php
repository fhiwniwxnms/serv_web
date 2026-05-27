<?php

class Comment extends AbstractModel {
    protected $article_id;
    protected $user_id;
    protected $text;
    public function getTableName() {
        return 'comments';
    }

    public function getByArticleId($articleId) {
        $stmt = $this->db->prepare('
            SELECT comments.*, users.nickname 
            FROM comments 
            JOIN users ON comments.user_id = users.id 
            WHERE comments.article_id = :article_id
        ');
        $stmt->execute([':article_id' => $articleId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticleId(): int {
        return $this->article_id;
    }

    public function setArticleId(int $article_id): void {
        $this->article_id = $article_id;
    }

    public function getUser(): User {
        return User::getById($this->user_id);
    }

    public function setUser(int $user_id): void {
        $this->user_id = $user_id;
    }

    public function getText(): string {
        return $this->text;
    }

    public function setText(string $text): void {
        $this->text = $text;
    }

    public function getAllWithArticles() {
        $stmt = $this->db->query('
            SELECT comments.*, users.nickname, articles.title as article_title
            FROM comments
            JOIN users ON comments.user_id = users.id
            JOIN articles ON comments.article_id = articles.id
        ');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}