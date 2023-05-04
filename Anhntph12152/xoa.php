<?php
require_once "./connection.php";
$news_id = $_GET['id'];
$sql = "DELETE FROM news WHERE news_id=$news_id";
$stmt = $conn->prepare($sql);
if ($stmt->execute()) {
    header("location: new.php?message=Bạn đã xóa thành công");
    die;
} else {
    header("location: new.php?message=Bạn đã xóa thất bại");
    die;
}
