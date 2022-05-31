<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'vc_survey';

$conn = mysqli_connect($server, $username, $password, $database);
if(!$conn){
    die("Error ". mysqli_connect_error());
}
?>