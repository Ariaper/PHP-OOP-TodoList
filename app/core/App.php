<?php

class App
{
    use Db;
    function add($note)
    {
        $query_add = $this->connect()->prepare("INSERT INTO notes (note) VALUES (:note)");
        $query_add->execute(['note' => $note]);

    }

    function read()
    {
        $query_read = $this->connect()->prepare("SELECT * FROM notes");
        $query_read->execute();
        return $query_read->fetchAll(PDO::FETCH_ASSOC);
    }

    function delete($id)
    {
        $query_delete = $this->connect()->prepare("DELETE FROM notes WHERE id = :id");
        $query_delete->execute(['id' => $id]);
    }
}