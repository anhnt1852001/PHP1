<?php
require_once "../connection.php";
if (isset($_POST['btnLuu'])) {
    // lây data tu form
    extract($_REQUEST);
    // kiem tra nguoi dung co cap nhat anh 
    if ($_FILES['pro_image']['size'] > 0) {
        $pro_image = $_FILES['pro_image']['name'];
    }
    $sql = "UPDATE products SET pro_name='$pro_name',cate_id = '$cate_id',price = '$price',intro = '$intro',pro_image='$pro_image',detail='$detail',quantity='$quantity'
             WHERE pro_id = $pro_id";
    // chuan bi 
    $stmt = $conn->prepare($sql);
    //thu thi
    if ($stmt->execute()) {
        $message = "Cập nhật thành công";
        // neu co anh
        if ($_FILES['pro_image']['size'] > 0) {
            move_uploaded_file($_FILES['pro_image']['tmp_name'], "../images/" . $pro_image);
        } else {
            $message = "Cập nhật thất bại";
        }
    }
}
// lay id tu thanh url
$pro_id = $_GET['id'];
// viet code SQL
$sql = "SELECT * FROM products WHERE pro_id=$pro_id";
// chuan bi 
$stmt = $conn->prepare($sql);
//thuc thi
$stmt->execute();
// lay data 
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cập nhật</title>
</head>

<body>
    <h2>Cập nhật Sản Phẩm</h2>
    <a href="product.php">Sản Phẩm</a>
    <?php if (isset($message)) : ?>
        <h4><?= $message ?></h4>
    <?php endif; ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- thuoc tinh bat buoc khi muon them anh -->
        <input type="hidden" name="pro_id" value="<?= $result['pro_id'] ?>">
        <br>
        <label for="">Name: </label>
        <br>
        <input type="text" name="pro_name" value="<?= $result['pro_name'] ?>">
        <br>
        <label for="">cate_id: </label>
        <br>
        <select name="cate_id" id="">
            <option value=""><?= $result['cate_id'] ?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <br>
        <label for="">Price: </label>
        <br>
        <input type="text" name="price" value="<?= $result['price'] ?>">
        <br>
        <label for="">Intro: </label>
        <br>
        <input type="text" name="intro" value="<?= $result['intro'] ?>">
        <br>
        <label for="">Hình ảnh: </label>
        <br>
        <input type="file" name="pro_image" id="">
        <?php if (!empty($result['pro_image'])) :  ?>
            <input type="hidden" name="pro_image" value="<?= $result['pro_image'] ?>">
            <br>
            <img src="../images/<?= $result['pro_image'] ?>" width="120" alt="">
        <?php endif; ?>
        <br>
        <label for="">Detail: </label>
        <br>
        <textarea name="detail" id="" cols="50" rows="5" required><?= $result['detail'] ?></textarea>
        <br>
        <label for="">Quantity: </label>
        <input type="number" name="quantity" value="<?= $result['quantity'] ?>">
        <br>
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>