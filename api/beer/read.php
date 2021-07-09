<?php

/**
 * API file for beer table
 * Communicats wih the database, 
 * Selects all data and outputs it in JSON
 */

//  Required HTTP headers
header('Access-Control-Allow-Origin: *');
header('Content-Type application/json');

// Include db.php and beer.php
include_once '../../config/db.php';
include_once '../../models/Beer.php';

// New object from Database class
$database = new Database();
// Use class connect() method and save as var
$db = $database->connect();

// New object from Beer class with above $db as argument for db connection
$beer = new Beer($db);

// Check if ID is displayed in URL
if (isset($_GET['id'])) {
    $beer->id = $_GET['id'];
} else {
    die();
}

// read_single method
$beer->read_single();

$beer_arr = [
    'id' => $beer->id,
    'beer' => $beer->beer,
    'style' => $beer->style,
    'alcohol' => $beer->alcohol,
    'fermentation' => $beer->fermentation,
    'since' => $beer->since,
    'brewery' => $beer->brewery
];

// Return array in JSON
print_r(json_encode($beer_arr));