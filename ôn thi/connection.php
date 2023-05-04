<?php
$host =  "localhost";
$dbname = "onthi";
$username = 'root';
$passwors = '';

try{
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charse=utf8", $username);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    echo "Lỗi kết nối dữ liệu: " .$e->getMessage();
    throw $e; 
}
