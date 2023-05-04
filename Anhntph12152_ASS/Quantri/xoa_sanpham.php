<?php
require_once "../connection.php";

//Lấy id 
$pro_id = $_GET['id'];
//Viết câu lệnh sql delete 
$sql = "DELETE FROM products WHERE pro_id=$pro_id";
//chuẩn bị
$stmt = $conn->prepare($sql);
//Thực thi 
if ($stmt->execute()) {
    header("location: product.php?message=Xóa dữ liệu thành công");
    die;
} else {
    header("location: product.php?message=Xóa dữ liệu thất bại !!!");
    die;
}
