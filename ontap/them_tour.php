<?php
require_once "connection.php";

$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchAll(PDO::FETCH_ASSOC);

$errors = ['tour_name' => '', 'price' => '', 'number_date' => '', 'intro' => '',  'description' => '', 'image' => ''];
if (isset($_POST['btnLuu'])) {
    $type = $_FILES['image']['type'];
    extract($_REQUEST);
    if ($tour_name == '') {
        $errors['tour_name'] = "Bạn chưa nhập tên !!!";
    }
    if ($price == 0) {
        $errors['price'] = "Bạn chưa nhập giá!!!";
    } elseif ($price <= 0) {
        $errors['price'] = "Bạn chưa nhập giá > 0!!!";
    }
    if ($number_date == 0) {
        $errors['number_date'] = "Bạn chưa nhập number_date!!!";
    } elseif ($number_date <= 0) {
        $errors['number_date'] = "Bạn chưa nhập number_date > 0!!!";
    }
    if ($intro == '') {
        $errors['intro'] = "Bạn chưa nhập intro !!!";
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
        $errors['type'] = "Bạn chưa chọn ảnh có định dạng jpeg hoac png !!! <br>";
    }
    if ($_FILES['image']['size'] > 0 && $_FILES['image']['size'] < 2 * 1024 * 1024) {
        $image = $_FILES['image']['name'];
    }
    if ($_FILES['image']['size'] >= 2000000) {
        $errors['image'] = "Bạn nhập ảnh quá lớn";
    }

    if (!array_filter($errors)) {
        $sql = "INSERT INTO tours(tour_name, cate_id, price, number_date, image, intro, description) VALUES('$tour_name', '$cate_id', '$price', '$number_date', '$image', '$intro', '$description')";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
        }
        header("location: tour.php?message=Thêm dữ liệu thành công");
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
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body>
    <h3>Thêm tour</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Tên tour:</label>
        <br>
        <input type="text" name="tour_name" value="<?= isset($tour_name) ? $tour_name : '' ?>" id="">
        <span><?= isset($errors['tour_name']) ? $errors['tour_name'] : '' ?></span>
        <br>

        <label for="">Cate id:</label>
        <select name="cate_id" id="">
            <?php foreach ($cate as $c) : ?>
                <option value="<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <?= isset($errors['cate_id']) ? $errors['cate_id'] : '' ?>
        <br>

        <label for="">Giá</label>
        <br>
        <input type="number" name="price" value="<?= isset($price) ? $price : '' ?>" id="">
        <span><?= isset($errors['price']) ? $errors['price'] : '' ?></span>
        <br>

        <label for="">Number date</label>
        <br>
        <input type="text" name="number_date" value="<?= isset($number_date) ? $number_date : '' ?>" id="">
        <span><?= isset($errors['number_date']) ? $errors['number_date'] : '' ?></span>
        <br>

        <label for="">Ảnh</label>
        <br>
        <input type="file" name="image" id="">
        <br>
        <span><?= isset($errors['image']) ? $errors['image'] : '' ?></span>
        <span><?= isset($errors['type']) ? $errors['type'] : "" ?></span>
        <br>

        <label for="">Intro</label>
        <br>
        <textarea name="intro" id="" cols="30" rows="10" value="<?= isset($intro) ? $intro : '' ?>"></textarea>
        <span><?= isset($errors['intro']) ? $errors['intro'] : '' ?></span>
        <br>

        <label for="">Descriptiom</label>
        <br>
        <textarea name="description" id="" cols="30" rows="10" value="<?= isset($description) ? $description : '' ?>"></textarea>
        <span><?= isset($errors['description']) ? $errors['description'] : '' ?></span>
        <br>
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>