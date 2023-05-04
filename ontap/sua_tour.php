<?php
require_once "connection.php";

//Câu lệnh sql để lấy danh sách danh mục sản phẩm
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchAll(PDO::FETCH_ASSOC);

$errors = ['tour_name' => '', 'price' => '', 'number_date' => '', 'intro' => '',  'description' => '', 'image' => ''];
if (isset($_POST['btnLuu'])) {

    extract($_REQUEST);
    if ($tour_name == '') {
        $errors['tour_name'] = "Bạn chưa nhập tên !!!";
    }
    if ($price == '') {
        $errors['price'] = "Bạn chưa nhập giá!!!";
    }
    if ($number_date == '') {
        $errors['number_date'] = "Bạn chưa nhập number_date !!!";
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
        $image =  $image;
    }
    if (!array_filter($errors)) {
        //SQL INSERT
        $sql = "UPDATE tours SET tour_name='$tour_name',cate_id = '$cate_id',price = '$price',number_date = '$number_date',image='$image',intro='$intro',description='$description'
             WHERE tour_id = $tour_id";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            if ($_FILES['image']['size'] > 0) {
                move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
            }
            echo "Cập nhật dữ liệu thành công";
        } else {
            echo "Cập nhật dữ liệu thất bại";
        }
    }
}

$tour_id = $_GET['id'];

$sql = "SELECT * FROM tours WHERE tour_id=$tour_id";

$stmt = $conn->prepare($sql);

$stmt->execute();

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
    <h3>Sửa tour</h3>
    <a href="tour.php">Tours</a>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="tour_id" value="<?= $result['tour_id'] ?>">
        <label for="">Tên tour:</label>
        <br>

        <input type="text" name="tour_name" value="<?= $result['tour_name'] ?>" id="">
        <?= isset($errors['tour_name']) ? $errors['tour_name'] : '' ?>
        <br>

        <label for="">Cate id:</label>
        <select name="cate_id" id="">
            <?php foreach ($cate as $c) : ?>
                <?php if ($c['cate_id'] == $result['cate_id']) : ?>
                    <option value="<?= $c['cate_id'] ?>" selected><?= $c['cate_name'] ?></option>
                <?php else : ?>
                    <option value="<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <?= isset($errors['cate_id']) ? $errors['cate_id'] : '' ?>
        <br>
        <label for="">Giá</label>
        <br>
        <input type="number" name="price" value="<?= $result['price'] ?>" id="">
        <?= isset($errors['price']) ? $errors['price'] : '' ?>
        <br>
        <label for="">Number date</label>
        <br>
        <input type="text" name="number_date" value="<?= $result['number_date'] ?>" id="">
        <?= isset($errors['number_date']) ? $errors['number_date'] : '' ?>
        <br>
        <label for="">Ảnh</label>
        <br>
        <input type="file" name="image" id="">
        <?= isset($errors['image']) ? $errors['image'] : '' ?>
        <?php if (!empty($result['image'])) :  ?>
            <input type="hidden" name="image" value="<?= $result['image'] ?>">
            <br>
            <img src="images/<?= $result['image'] ?>" width="120" alt="">
        <?php endif; ?>
        <br>
        <label for="">Intro</label>
        <br>
        <textarea name="intro" id="" cols="30" rows="10"><?= $result['intro'] ?></textarea>
        <?= isset($errors['intro']) ? $errors['intro'] : '' ?>
        <br>
        <label for="">Description</label>
        <br>
        <textarea name="description" id="" cols="30" rows="10"><?= $result['description'] ?></textarea>
        <?= isset($errors['description']) ? $errors['description'] : '' ?>
        <br>
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>