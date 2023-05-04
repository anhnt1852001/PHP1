<?php
require_once "connection.php";
$sql = "SELECT * FROM catelogies";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST['luu'])) {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $cate_id = $_POST['cate_id'];

    $file = $_FILES['image'];
    $image = $file['name'];
    //vadidate
    if ($product_name == "") {
        $product_name_err = "Vui lòng nhập tên";
    }
    if ($price == "") {
        $price_err = "Vui lòng nhập giá";
    } elseif ($price < 0) {
        $price_err = "Giá phải là số dương";
    }
    if ($quantity == "") {
        $quantity_err = "Vui lòng nhập số lượng";
    } elseif ($quantity < 0) {
        $quantity_err = "Số lượng phải là số dương";
    }
    if ($file['size'] <= 0) {
        $file_err = "Bạn chưa upload file";
    } elseif ($file['size'] >= 2097152) {
        $file_err = "Bạn không được chọn ảnh quá 2MB";
    }

    if ($file['size'] > 0) {
        //Lấy extension của file
        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
            $file_err = "File không phải là ảnh";
        }
    }



    //Chuyển hướng website về trang show
    if (!isset($product_name_err) && !isset($price_err) && !isset($quantity_err) && !isset($file_err)) {
        //Câu lệch Insert
        $sql = "INSERT INTO products (product_name, price, quantity, image, description, cate_id ) VALUES('$product_name', '$price', '$quantity', '$image','$description', '$cate_id')";

        $stmt = $conn->prepare($sql);

        //Thưc thi

        $stmt->execute();

        if (!isset($file_err)) {
            move_uploaded_file($file['tmp_name'], 'upload/' . $image);
            $ok = true;
        }

        $msg = "Thêm dữ liệu thành công";
        header("location: show_products.php?msg=$msg");
        exit;
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Thêm sản phẩm</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Product name</label>
        <input type="text" name="product_name" value="<?= $product_name ?? '' ?>">
        <?php
        if (isset($product_name_err)) : ?>
            <span style="color: red"><?= $product_name_err ?> </span>
        <?php endif ?>
        <br>
        <select name="cate_id" id="">
            <?php foreach ($cate as $c) : ?>
                <option value="<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="">Price</label>
        <input type="number" name="price" value="<?= $price ?? '' ?>">
        <?php
        if (isset($price_err)) : ?>
            <span style="color: red"><?= $price_err ?> </span>
        <?php endif ?>
        <br>
        <label for="">Quantity</label>
        <input type="number" name="quantity" value="<?= $quantity ?? '' ?>">
        <?php
        if (isset($quantity_err)) : ?>
            <span style="color: red"><?= $quantity_err ?> </span>
        <?php endif ?>
        <br>
        <label for="">Image</label>
        <input type="file" name="image" value="<?= $image ?? '' ?>">
        <?php
        if (isset($file_err)) : ?>
            <span style="color: red"><?= $file_err ?> </span>
        <?php endif ?>
        <br>
        <label for="">Description</label>
        <input type="text" name="description">
        <br>
        <button type="submit" name="luu">Save</button>
        <button type="submit"> <a class="btn btn-primary" href="./show_products.php">Danh sách</a></button>
    </form>

</body>

</html>