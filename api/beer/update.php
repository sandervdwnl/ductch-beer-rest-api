<?php

/**
 * API file for beer table
 * Communicates wih the database, 
 * Updates and outputs message in JSON
 */

//  Required HTTP headers
header('Access-Control-Allow-Origin: *');
header('Content-Type application/json');

//Allow POST requests only
header('Acces-Contol-Allow-Methods: PUT');
//Allow these headers only 
// + X-Requested-With voor tegen XSS attacks
header('Acces-Control-Allow-Headers: Acces-Control-Allow-Headers, Content-Type, X-Requested-With');

// Include db.php and beer.php
include_once '../../config/db.php';
include_once '../../models/Beer.php';

// New object from Database class
$database = new Database();
// Use class connect() method and save as var
$db = $database->connect();

// New object from Beer class with above $db as argument for db connection
$beer = new Beer($db);

// Get raw data 
$data = json_decode(file_get_contents("php://input"));

// Set properties
$beer->id = $data->id;
$beer->beer = $data->beer;
$beer->style = $data->style;
$beer->alcohol = $data->alcohol;
$beer->fermentation = $data->fermentation;
$beer->since = $data->since;
$beer->brewery = $data->brewery;

// update method
$beer->update();

if($beer->update()) {
// Return array in JSON
echo json_encode(['message' => 'Record updated']);
} else {
echo json_encode(['message' => 'Error, record not updated']);
}