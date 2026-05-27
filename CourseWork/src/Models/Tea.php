<?php

class Tea extends AbstractModel implements Filterable { 
    protected $mood;
    protected $flavor; 
    public function getTableName() {
        return 'teas';
    }

    public function getMood() {
        return $this->mood;
    }

    public function setMood(string $mood): void {
        $this->mood = $mood;
    }
    public function getFlavor() {
        return $this->flavor;
    }
    public function setFlavor(string $flavor): void {
        $this->flavor = $flavor;
    }

    public function matchesCriteria(array $criteria) : bool {
        if (isset($criteria['mood']) && $this->mood !== $criteria['mood']) {
            return false;
        }
        if (isset($criteria['flavor']) && $this->flavor !== $criteria['flavor']) {
            return false;
        } 
        return true;
    }
}