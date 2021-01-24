<?php
date_default_timezone_set('Asia/Manila');

class Connection
{
    public $pdo = null;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:server=localhost; dbname=it110', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "ERROR: " . $exception->getMessage();
        }

    }

    public function getNotes()
    {
        $statement = $this->pdo->prepare("SELECT * FROM tbl_notes WHERE user_ID = :user_id ORDER BY time_created DESC");
        $statement->bindValue('user_id', $_SESSION['userID']);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addNote($note)
    {
        $statement = $this->pdo->prepare("INSERT INTO tbl_notes (user_ID, title, description, time_created)
                                    VALUES (:user_ID, :title, :description, :date)");
        $statement->bindValue('user_ID', $note['user_ID']);
        $statement->bindValue('title', $note['title']);
        $statement->bindValue('description', $note['description']);
        $statement->bindValue('date', date('Y-m-d H:i:s'));
        return $statement->execute();
    }

    public function updateNote($id, $note)
    {
        $statement = $this->pdo->prepare("UPDATE tbl_notes SET title = :title, description = :description, time_updated = :date WHERE id = :id");
        $statement->bindValue('id', $id);
        $statement->bindValue('title', $note['title']);
        $statement->bindValue('description', $note['description']);
        $statement->bindValue('date', date('Y-m-d H:i:s'));
        return $statement->execute();
    }

    public function removeNote($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM tbl_notes WHERE id = :id");
        $statement->bindValue('id', $id);
        return $statement->execute();
    }

    public function getNoteById($id)
    {
        $statement = $this->pdo->prepare("SELECT ID, user_ID, title, description FROM tbl_notes WHERE id = :id");
        $statement->bindValue('id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}

return new Connection();
