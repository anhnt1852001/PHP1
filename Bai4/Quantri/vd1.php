<?php
require_once "../connection.php";
if (isset($_POST['btnLuu'])) {
    $cate_name = $_POST['cate_name'];
    $description = $_POST['description'];
    if ($_FILES['cate_image']['size'] > 0) {
        $cate_image = $_FILES['cate_image']['name'];
    } else {
        $cate_image = "";
    }
    $sql = "INSERT INTO categories(cate_name, cate_image, description) VALUES ('$cate_name', '$cate_image', '$description')";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        if (!empty($cate_image)) {
            move_uploaded_file($_FILES['cate_image']['tmp_name'], "../images/" . $cate_image);
        }
        header("location: Danhmuc.php?message=Thêm dữ liệu thành công");
        die;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Thêm danh mục sản phẩm</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Tên danh mục: </label>
        <br>
        <input type="text" name="cate_name" id="">
        <br>
        <label for="">Hình ảnh</label>
        <input type="file" name="cate_image" id="">
        <br>
        <label for="">Mô tả</label>
        <br>
        <textarea name="description" id="" cols="100" rows="10"></textarea>
        <br>
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>