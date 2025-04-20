<?php

session_start();

$username = 'root';
$password = '';
try{
    $conn = new PDO('mysql:host=localhost;dbname=tready', $username, $password);
}
catch(PDOException $e){
}