<?php
$host = "localhost";
$dbname = 'ph25645_examphp1.1';
$usename = 'root';
$password = '';

try{
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $usename,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "lỗi kết nối".$e->getMessage();
    throw$e;
}