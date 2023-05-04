<?php
require_once "../connection.php";

if (isset($_POST['btnLuu'])) {
    //lấy dữ liệu từ form
    extract($_REQUEST);
    //Kiểm tra người dùng có cập nhật ảnh không
    if ($_FILES['cate_image']['size'] > 0) {
        $cate_image = $_FILES['cate_image']['name'];
    }
    //Viết câu lệnh sql
    $sql = "UPDATE categories SET cate_name='$cate_name', cate_image='$cate_image', description='$description' WHERE cate_id=$cate_id";
    //chuẩn bị
    $stmt = $conn->prepare($sql);
    //Thực thi
    if ($stmt->execute()) {
        $message = "Cập nhật dữ liệu thành công";
        if ($_FILES['cate_image']['size'] > 0) {
            move_uploaded_file($_FILES['cate_image']['tmp_name'], "../images/" . $cate_image);
        }
    } else {
        $message = "Cập nhật thất bại";
    }
}

//lấy id từ thanh url
$cate_id = $_GET['id'];
//viest câu lệnh SELECT có điều kiện
$sql = " SELECT * FROM categories WHERE cate_id=$cate_id";
//Chuẩn bị
$stmt = $conn->prepare($sql);
//Thực thi 
$stmt->execute();
//lấy dữ liệu 
$result = $stmt->fetch(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Cập nhật danh mục sản phẩm</h2>
    <a href="Danhmuc.php">Danh Mục</a>
    <?php
    if (isset($message)) : ?>
        <h4><?= $message ?></h4>
    <?php endif; ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="cate_id" value="<?= $result['cate_id'] ?>">
        <label for="">Tên danh mục: </label>
        <br>
        <input type="text" name="cate_name" id="" value="<?= $result['cate_name'] ?>">
        <br>
        <label for="">Hình ảnh: </label>
        <br>
        <input type="file" name="cate_image" id="">
        <?php
        if (!empty($result['cate_image'])) : ?>
            <input type="hidden" name="cate_image" value="<?= $result['cate_image'] ?>">
            <br>
            <img src="../images/<?= $result['cate_image'] ?>" width="120" alt="">
        <?php endif; ?>
        <br>
        <label for="">Mô tả: </label>
        <br>
        <textarea name="description" id="" cols="100" rows="10"><?= $result['description'] ?></textarea>
        <br>
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>