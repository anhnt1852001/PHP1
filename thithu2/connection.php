<?php
$host = "localhost";
$dbname = 'thithu2';
$username = 'root';
$password = '';

try{
    $conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Lỗi kết nối".$e->getMessage();
    throw $e;
}