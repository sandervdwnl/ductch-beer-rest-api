<?php

/**
 * API file for beer table
 * Communicats wih the database, 
 * Creates data and outputs message JSON
 */

//  Required HTTP headers
header('Access-Control-Allow-Origin: *');
header('Content-Type application/json');

//Allow POST requests only
header('Acces-Contol-Allow-Methods: POST');
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

$beer->beer = $data->beer;
$beer->style = $data->style;
$beer->alcohol = $data->alcohol;
$beer->fermentation = $data->fermentation;
$beer->since = $data->since;
$beer->brewery = $data->brewery;

// read_single method
$beer->create();

if($beer->create()) {
// Return array in JSON
echo json_encode(['message' => 'Beer added']);
} else {
echo json_encode(['message' => 'Error while adding record']);
}