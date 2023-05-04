<?php
require_once "connection.php";

//Lấy id 
$tour_id = $_GET['id'];
//Viết câu lệnh sql delete 
$sql = "DELETE FROM tours WHERE tour_id=$tour_id";
//chuẩn bị
$stmt = $conn->prepare($sql);
//Thực thi 
if ($stmt->execute()) {
    header("location: tour.php?message=Xóa dữ liệu thành công");
    die;
} else {
    header("location: tour.php?message=Xóa dữ liệu thất bại !!!");
    die;
}
