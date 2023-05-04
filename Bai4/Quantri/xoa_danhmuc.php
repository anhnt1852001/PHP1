<?php
require_once "../connection.php";

//Lấy id 
$cate_id = $_GET['id'];
//Viết câu lệnh sql delete 
$sql = "DELETE FROM categories WHERE cate_id=$cate_id";
//chuẩn bị
$stmt = $conn->prepare($sql);
//Thực thi 
if ($stmt->execute()) {
    header("location: Danhmuc.php?message=Xóa dữ liệu thành công");
    die;
} else {
    header("location: Danhmuc.php?message=Xóa dữ liệu thất bại !!!");
    die;
}
