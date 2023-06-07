<?php

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'shakeel_blog';

$connection = mysqli_connect($server,$user,$password,$db);
if(!$connection){
    echo "Failed to connect database";
}

?>