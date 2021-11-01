<?php

namespace app;
use app\models\Birthday;
use PDO;

class Database
{
    public \PDO $pdo;
    public static Database $db;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3307;dbname=birthdays', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::$db = $this;
    }

    public function getBirthdays($thisMonth)
    {
        if ($thisMonth)
        {
            $statement = $this->pdo->prepare('SELECT * FROM birthdays WHERE MONTH(date) = :thisMonth;');
            $statement->bindValue(':thisMonth', $thisMonth);
        }
        else
        {
            $statement = $this->pdo->prepare('Select * from birthdays');
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);            
    }

    public function addBirthday(Birthday $birthday)
    {
        $statement = $this->pdo->prepare("INSERT INTO birthdays (name, date) VALUES (:name, :date)");
        $statement->bindValue(':name', $birthday->name);
        $statement->bindValue(':date', $birthday->date);
        $statement->execute();
    }

    public function deleteBirthday($id)
    {
        $statement = $this->pdo->prepare('DELETE FROM birthdays WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
    }

    public function getBirthdayById($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM birthdays WHERE id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function changeBirthday(Birthday $birthday)
    {
        $statement = $this->pdo->prepare("UPDATE birthdays SET name = :name, date = :date WHERE id = :id");
        $statement->bindValue(':name', $birthday->name);
        $statement->bindValue(':date', $birthday->date);
        $statement->bindValue(':id', $birthday->id);
        $statement->execute();
    }

}