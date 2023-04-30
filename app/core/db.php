<?php

trait Db
{
    function connect()
    {
        try {
            return $dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . '', DB_USER, DB_PASS);
        } catch (PDOException $e) {
            print("error:" . $e->getMessage() . "<br>");
            exit();
        }
    }
}