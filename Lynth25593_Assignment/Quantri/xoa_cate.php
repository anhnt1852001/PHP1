<?php
require_once "../connection.php";
$cate_id = $_GET['id'];
$sql = "DELETE FROM categories WHERE cate_id=$cate_id";
$stmt = $conn->prepare($sql);
if ($stmt->execute()) {
    header("location: show_cate.php?message=Bạn đã xóa thành công");
    die;
} else {
    header("location: show_cate.php?message=Bạn đã xóa thất bại");
    die;
}