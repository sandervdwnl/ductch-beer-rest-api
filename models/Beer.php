<?php

/**
 * Beer Model
 * Contain table and col vars
 * Constructor method for DB connection, 
 * called in read.php, when creating a new object.
 * 
 * $db will be contain the connection for the statements,
 * created by an instance of class Database
 */

class Beer {

    // properties
    private $conn;
    private $table = 'beer';

    public $id;
    public $beer;
    public $style;
    public $alcohol;
    public $fermentation;
    public $since;
    public $brewery;

    // Construct $dbh property 
    // When called, the argument $conn will be saved as $db
    public function __construct($db) {
        $this->conn = $db;
    }

    // Read all Beers
    public function read() {

        $q = "SELECT * FROM $this->table";

        $stmt = $this->conn->prepare($q);
        $stmt->execute();

        return $stmt;
    }

    // Read single Beer

    public function read_single() {

        $q = "SELECT * FROM $this->table WHERE id = :id";

        // Prepare and execute stmt
        $stmt = $this->conn->prepare($q);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        // Fetch assoc row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Save values as properties
        $this->beer = $row['beer'];
        $this->style = $row['style'];
        $this->alcohol = $row['alcohol'];
        $this->fermentation = $row['fermentation'];
        $this->since = $row['since'];
        $this->brewery = $row['brewery'];
    }

    // Create a Beer

    public function create() {

        // Insert stmt
        $q = "INSERT INTO " . $this->table . 
        "(beer, style, alcohol, fermentation, since, brewery) 
        VALUES 
        (:beer, :style, :alcohol, :fermentation, :since, :brewery);";

        // Prepare stmt and execute
        $stmt = $this->conn->prepare($q);
        $stmt->execute([
            'beer' => $this->beer,
            'style' => $this->style,
            'alcohol' => $this->alcohol,
            'fermentation' => $this->fermentation,
            'since' => $this->since,
            'brewery' => $this->brewery
        ]);

        return true;
    }

    // Update Beer

    public function update() {

        // Update stmt
        $q = "UPDATE " . $this->table . " 
        SET
        beer = :beer,
        style = :style,
        alcohol = :alcohol,
        fermentation =:fermentation,
        since = :since,
        brewery = :brewery
        WHERE id = :id;";

        // Prepare stmt and execute
        $stmt = $this->conn->prepare($q);
        $stmt->execute([
            'beer' => $this->beer,
            'style' => $this->style,
            'alcohol' => $this->alcohol,
            'fermentation' => $this->fermentation,
            'since' => $this->since,
            'brewery' => $this->brewery,
            'id' => $this->id
        ]);

        return true;
    }

    // Delete Beer
    
    public function delete() {

        // Select record by id
        $q = "DELETE FROM " . $this->table . 
        " WHERE id = :id;";

        // Bind param and delete record
        $stmt = $this->conn->prepare($q);
        $stmt->execute([ 'id' => $this->id ]);

        return true;
    }

    
}