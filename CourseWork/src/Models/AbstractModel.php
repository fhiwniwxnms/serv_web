<?php

abstract class AbstractModel {
    abstract public function getTableName();

    protected $db;

    public function __construct() {
        $this->db = Db::getInstance();
    }

    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM ' . $this->getTableName());
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare('SELECT * FROM ' . $this->getTableName() . ' WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save() {
        $reflection = new ReflectionObject($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PROTECTED);
        
        $columns = [];
        $values = [];
        
        foreach ($properties as $property) {
            $property->setAccessible(true);
            $name = $property->getName();
            if ($name === 'db') continue; 
            $columns[] = $name;
            $values[':' . $name] = $property->getValue($this);
        }
        
        $sql = 'INSERT INTO ' . $this->getTableName() . 
            ' (' . implode(', ', $columns) . ')' .
            ' VALUES (' . implode(', ', array_keys($values)) . ')';
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($values);
        return $this->db->lastInsertId();
    }

    public function update($id) {
        $reflection = new ReflectionObject($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PROTECTED);
        
        $sets = [];
        $values = [];
        
        foreach ($properties as $property) {
            $property->setAccessible(true);
            $name = $property->getName();
            if ($name === 'db') continue;
            $sets[] = "$name = :$name";
            $values[':' . $name] = $property->getValue($this);
        }
        
        $values[':id'] = $id;
        
        $sql = 'UPDATE ' . $this->getTableName() . 
            ' SET ' . implode(', ', $sets) . 
            ' WHERE id = :id';
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($values);
    }

    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM ' . $this->getTableName() . ' WHERE id = :id');
        $stmt->execute([':id' => $id]);
    }
}