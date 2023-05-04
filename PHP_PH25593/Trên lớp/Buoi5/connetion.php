<?php
// file kết nối đến CSDL
 
// thông tin host
$host = "localhost";
// tên CSDL
$dbname = 'we17317';
//thông tin tài khoản
$usename='root';
$passwor = '';

try{
    //Khai báo chuỗi kết nối
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset = utf8", $usename, $passwor);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}catch(PDOException $e){
    echo "Lỗi kết nối dữ liệu:". $e->getMessage();
    throw $e;
}