<?php

class Category extends AbstractModel {  
    protected $name;
    protected $slug;
    public function getTableName() {
        return 'categories';
    }
    public function getName() : string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }
    public function getSlug() : string {
        return $this->slug;
    }

    public function setSlug(string $slug): void {
        $this->slug = $slug;
    }
}