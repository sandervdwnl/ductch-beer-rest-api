<?php

/**
 * This file sets up a database connection with PDO
 * Creates a connection as $conn and returns it.
 * 
 * This is called in api/beer files. 
 * The connenction is saved as $db
 */

 class Database {

    // DB info
    private $host = 'localhost';
    private $db = 'dutch-beer';
    private $user = 'root';
    private $pass = 'pass';
    public $conn;

    // Make a connection
    public function connect() {

        $this->conn = null;
        
        // Create new object
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

        return $this->conn;
    }

}





