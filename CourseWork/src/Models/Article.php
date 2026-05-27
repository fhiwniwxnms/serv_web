<?php

class Article extends AbstractModel {  
    protected $title;
    protected $text;
    protected $author_id;
    protected $category_id;
    public function getTableName() {
        return 'articles';
    }

    public function getTitle() : string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }
    public function getText() : string {
        return $this->text;
    }

    public function setText(string $text): void {
        $this->text = $text;
    }
    
    public function getAuthor_id(): int {
        return $this->author_id;
    }

    public function setAuthor_id(int $author_id): void {
        $this->author_id = $author_id;
    }
    public function getCategory_id(): int {
        return $this->category_id;
    }

    public function setCategory_id(int $category_id): void {
        $this->category_id = $category_id;
    }

    public function getLatest($limit = 3) {
        $stmt = $this->db->prepare('
            SELECT * FROM articles 
            ORDER BY created_at DESC 
            LIMIT :limit
        ');
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}