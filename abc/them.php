<?php
require_once "./connection.php";

$sql = "SELECT * FROM brands";
$stmt = $conn->prepare($sql);
$stmt->execute();
$brand = $stmt->fetchAll(PDO::FETCH_ASSOC);

$errors = ['product_name' => '', 'price' => '', 'quantity' => '', 'description' => '', 'image' => ''];
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
    if (!array_filter($errors)) {
        $sql = "INSERT INTO products(product_name, brand_id, price, quantity, image, description) VALUES('$product_name', '$brand_id', '$price', '$quantity', '$image', '$description')";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
        }
        header("location: products.php?message=Thêm dữ liệu thành công");
        die;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm products</title>
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body>
    <h3>Thêm products</h3>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Tên SP:</label>
        <br>
        <input type="text" name="product_name" value="<?= isset($product_name) ? $product_name : '' ?>" id="">
        <span><?= isset($errors['product_name']) ? $errors['product_name'] : '' ?></span>
        <br>

        <label for="">Brand id:</label>
        <select name="brand_id" id="">
            <?php foreach ($brand as $c) : ?>
                <option value="<?= $c['brand_id'] ?>"><?= $c['brand_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <?= isset($errors['brand_id']) ? $errors['brand_id'] : '' ?>
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
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>