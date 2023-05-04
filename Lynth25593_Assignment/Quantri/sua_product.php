<?php
require_once "../connection.php";

$sql = "SELECT * FROM categories";
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
        $image =  $image;
    }
    if (!array_filter($errors)) {
        $sql = "UPDATE products SET product_name='$product_name',cate_id = '$cate_id',price = '$price',image='$image',description='$description'
             WHERE product_id = $product_id";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            if ($_FILES['image']['size'] > 0) {
                move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image);
            }
            echo "Cập nhật dữ liệu thành công";
        } else {
            echo "Cập nhật dữ liệu thất bại";
        }
    }
}

$product_id = $_GET['id'];

$sql = "SELECT * FROM products WHERE product_id=$product_id";

$stmt = $conn->prepare($sql);

$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Products</title>
</head>

<body>
    <h3>Sửa Products</h3>
    <a href="show_product.php">Products</a>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?= $result['product_id'] ?>">

        <label for="">Tên SP:</label>
        <br>
        <input type="text" name="product_name" value="<?= $result['product_name'] ?>" id="">
        <?= isset($errors['product_name']) ? $errors['product_name'] : '' ?>
        <br>

        <label for="">Date_id:</label>
        <select name="cate_id" id="">
            <?php foreach ($brand as $c) : ?>
                <?php if ($c['cate_id'] == $result['cate_id']) : ?>
                    <option value="<?= $c['cate_id'] ?>" selected><?= $c['cate_name'] ?></option>
                <?php else : ?>
                    <option value="<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <?= isset($errors['brand_id']) ? $errors['brand_id'] : '' ?>
        <br>

        <label for="">Giá:</label>
        <br>
        <input type="number" name="price" value="<?= $result['price'] ?>" id="">
        <?= isset($errors['price']) ? $errors['price'] : '' ?>
        <br>

        <label for="">Ảnh:</label>
        <br>
        <input type="file" name="image" id="">
        <?= isset($errors['image']) ? $errors['image'] : '' ?>
        <?php if (!empty($result['image'])) :  ?>
            <input type="hidden" name="image" value="<?= $result['image'] ?>">
            <br>
            <img src="../images/<?= $result['image'] ?>" width="120" alt="">
        <?php endif; ?>
        <br>

        <label for="">Quantity:</label>
        <br>
        <input type="number" name="quantity" value="<?= $result['quantity'] ?>" id="">
        <?= isset($errors['quantity']) ? $errors['quantity'] : '' ?>
        <br>

        <label for="">Description:</label>
        <br>
        <textarea name="description" id="" cols="30" rows="10"><?= $result['description'] ?></textarea>
        <?= isset($errors['description']) ? $errors['description'] : '' ?>
        <br>
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>