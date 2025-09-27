<?php
$host="localhost";
$db="db";
$user="root";
$pass="";

try{
    $pdo=new PDO("mysql:host=$host;dbname=$db",$user,$pass);
    $sql="CREATE TABLE users (id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(30) not null,
    password varchar(50) not null)";

    $pdo->exec($sql);
    echo "Table created succesfully";

}catch(Exception $e){
    echo "Error catching table: " , $e->getMessage();
}


?>