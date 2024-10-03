<?php

$host = 'localhost';
$username ='root';
$password ='';
$db_name ='student_database';


try{

    $pdo = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "Connection Failed: " . $e->getMessage();
}










?>