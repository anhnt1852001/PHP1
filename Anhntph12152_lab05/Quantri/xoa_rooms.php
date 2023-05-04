<?php
require_once "../connection.php";

//Lấy id 
$id = $_GET['id'];
//Viết câu lệnh sql delete 
$sql = "DELETE FROM rooms WHERE id=$id";
//chuẩn bị
$stmt = $conn->prepare($sql);
//Thực thi 
if ($stmt->execute()) {
    header("location: rooms.php?message=Xóa dữ liệu thành công");
    die;
} else {
    header("location: rooms.php?message=Xóa dữ liệu thất bại !!!");
    die;
}
