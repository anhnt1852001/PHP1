<?php
 $host = "localhost";
$dbname = 'lab6';
$username = 'root';
$password = '';

try{
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Lỗi kết nối dữ liệu".$e->getMessage();
    throw $e;
}