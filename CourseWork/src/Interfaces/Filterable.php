<?php

interface Filterable {
    public function matchesCriteria(array $criteria): bool;
}