<?php
require_once "connection.php";

if(isset($_GET['id'])){
    $product_id = $_GET['id'];

    $sql = "DELETE FROM products WHERE product_id=$product_id";
    $stmt =$conn->prepare($sql);
    $stmt->execute();
    
    //Chuyển hướng 

    $msg = "Xóa dữ liệu thành công";
    header("location: show_products.php?msg=$msg");
    exit;

}
header("location: show_products.php");