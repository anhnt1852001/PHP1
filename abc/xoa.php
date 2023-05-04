<?php
require_once "./connection.php";
$product_id = $_GET['id'];
$sql = "DELETE FROM products WHERE product_id=$product_id";
$stmt = $conn->prepare($sql);
if ($stmt->execute()) {
    header("location: products.php?message=Bạn đã xóa thành công");
    die;
} else {
    header("location: products.php?message=Bạn đã xóa thất bại");
    die;
}
