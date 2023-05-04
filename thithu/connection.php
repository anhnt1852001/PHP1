<?php
try {
    //code...
    $conn = new PDO("mysql:host=localhost; dbname=thithu1; charset=utf8", "root", "");
} catch (PDOException $th) {
    //throw $th;
    echo "Lỗi kết nối" > $th->getMessage();
}
