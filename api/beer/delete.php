<?php

/**
 * API file for beer table
 * Communicates wih the database, 
 * Deletes record and outputs message in JSON
 */

//  Required HTTP headers
header('Access-Control-Allow-Origin: *');
header('Content-Type application/json');

//Allow POST requests only
header('Acces-Contol-Allow-Methods: DELETE');
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

// Set id
$beer->id = $data->id;

// delete method
$beer->delete();

if ($beer->delete()) {
// Return array in JSON
echo json_encode(['message' => 'Record deleted']);
} else {
echo json_encode(['message' => 'Error, record not deleted']);
}