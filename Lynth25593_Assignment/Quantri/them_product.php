<?php
require_once "../connection.php";

$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchAll(PDO::FETCH_ASSOC);
$errors = ['product_name' => '', 'price' => '', 'quantity' => '', 'image' => '', 'description' => ''];
if (isset($_POST['btnLuu'])) {
    $type = $_FILES['image']['type'];
    extract($_REQUEST);
    if (isset($_POST['btnLuu'])) {
        $type = $_FILES['image']['type'];
        extract($_REQUEST);
        if ($product_name == '') {
            $errors['product_name'] = "Bạn chưa nhập tên !!!";
        }
        if ($price == 0) {
            $errors['price'] = "Bạn chưa nhập giá!!!";
        } elseif ($price <= 0) {
            $errors['price'] = "Bạn chưa nhập giá > 0!!!";
        }
        if ($quantity == 0) {
            $errors['quantity'] = "Bạn chưa nhập quantity!!!";
        } elseif ($quantity <= 0) {
            $errors['quantity'] = "Bạn chưa nhập quantity > 0!!!";
        }
        if ($description == '') {
            $errors['description'] = "Bạn chưa nhập description !!!";
        }
        if ($_FILES['image']['size'] > 0) {
            $image = $_FILES['image']['name'];
        } else {
            $errors['image'] = "Bạn chưa chọn ảnh !!! <br>";
        }
        if ($type != 'image/jpeg' && $type != 'image/png') {
            $errors['type'] = "Bạn chưa chọn ảnh có định dạng jpg hoac png !!! <br>";
        }
        if ($_FILES['image']['size'] > 0 && $_FILES['image']['size'] < 2 * 1024 * 1024) {
            $image = $_FILES['image']['name'];
        }
        if ($_FILES['image']['size'] >= 2000000) {
            $errors['image'] = "Bạn nhập ảnh quá lớn!!!";
        }
        if(!array_filter($errors)) {
            $sql = "INSERT INTO products(product_name, price, quantity, image, description, cate_id) VALUES ('$product_name', '$price', '$quantity', '$image', '$description', '$cate_id')";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute()) {
                move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image);
            }
            header("location: show_product.php?message=Thêm dữ liệu thành công");
            die;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Product</title>
    <style>
        span {
            color: red;
        }
    </style>
</head>
<body>
<h3>Thêm products</h3>
    <a href="show_product.php">Danh sách Products</a>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Tên SP:</label>
        <br>
        <input type="text" name="product_name" value="<?= isset($product_name) ? $product_name : '' ?>" id="">
        <span><?= isset($errors['product_name']) ? $errors['product_name'] : '' ?></span>
        <br>

        <label for="">Cate id:</label>
        <select name="cate_id" id="">
            <?php foreach ($cate as $c) : ?>
                <option value="<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <?= isset($errors['cate_id']) ? $errors['cate_id'] : '' ?>
        <br>

        <label for="">Giá: </label>
        <br>
        <input type="number" name="price" value="<?= isset($price) ? $price : '' ?>" id="">
        <span><?= isset($errors['price']) ? $errors['price'] : '' ?></span>
        <br>

        <label for="">Ảnh:</label>
        <br>
        <input type="file" name="image" id="">
        <br>
        <span><?= isset($errors['image']) ? $errors['image'] : '' ?></span>
        <span><?= isset($errors['type']) ? $errors['type'] : "" ?></span>
        <br>

        <label for="">Quantity:</label>
        <br>
        <input type="number" name="quantity" value="<?= isset($quantity) ? $quantity : '' ?>" id="">
        <span><?= isset($errors['quantity']) ? $errors['quantity'] : '' ?></span>
        <br>

        <label for="">Description:</label>
        <br>
        <textarea name="description" id="" cols="30" rows="10" value="<?= isset($description) ? $description : '' ?>"></textarea>
        <span><?= isset($errors['description']) ? $errors['description'] : '' ?></span>
        <br>
        <button type="submit" name="btnLuu">Thêm</button>
    </form>
</body>
</html>