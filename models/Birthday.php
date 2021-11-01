<?php

namespace app\models;
use app\Database;
class Birthday 
{
    public ?int $id = null;
    public string $name;
    public string $date;

    public function load($data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'];
        $this->date = $data['date'];
    }

    
    public function save()
    {
        $errors = [];
        if (!$this->name) {
            $errors[] = 'Name is required';
        }

        if (!$this->date) {
            $errors[] = 'Date is required';
        }

        if (empty($errors)) {
            $db = Database::$db;
            if ($this->id) {
                $db->changeBirthday($this);
            } else {
                $db->addBirthday($this);
            }
        }
        return $errors;
    }
}