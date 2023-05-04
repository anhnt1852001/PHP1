<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ph12152_examphp1';
try {
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
} catch (PDOException $e) {
    echo "Kết nối dữ liệu thất bại" . $e->getMessage();
}
