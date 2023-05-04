<?php
require_once "connetion.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM user WHERE id=$id";
    $stmt =$conn->prepare($sql);
    $stmt->execute();
    
    //Chuyển hướng 
    $msg = "Xóa dữ liệu thành công";
    header("location: show_user.php?smg=$smg");
    exit;

}
header("location: show_user.php");