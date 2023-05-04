<?php
require_once "./connection.php";

$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchAll(PDO::FETCH_ASSOC);

$errors = ['title' => '', 'status' => '', 'intro' => '', 'detail' => '', 'image' => ''];
if (isset($_POST['btnLuu'])) {
    $type = $_FILES['image']['type'];
    extract($_REQUEST);
    if ($title == '') {
        $errors['title'] = "Bạn chưa nhập tên !!!";
    }
    if ($status == 0) {
        $errors['status'] = "Bạn chưa nhập status!!!";
    } elseif ($status <= 0) {
        $errors['status'] = "Bạn chưa nhập status > 0!!!";
    }
    if ($intro == '') {
        $errors['intro'] = "Bạn chưa nhập intro !!!";
    }
    if ($detail == '') {
        $errors['detail'] = "Bạn chưa nhập detail !!!";
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
        $sql = "INSERT INTO news(title, cate_id, status, intro, image, detail) VALUES('$title', '$cate_id', '$status', '$intro', '$image', '$detail')";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
        }
        header("location: new.php?message=Thêm dữ liệu thành công");
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
    <h3>Thêm news</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Tên new:</label>
        <br>
        <input type="text" name="title" value="<?= isset($title) ? $title : '' ?>" id="">
        <span><?= isset($errors['title']) ? $errors['title'] : '' ?></span>
        <br>

        <label for="">Cate id:</label>
        <select name="cate_id" id="">
            <?php foreach ($cate as $c) : ?>
                <option value="<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <?= isset($errors['cate_id']) ? $errors['cate_id'] : '' ?>
        <br>

        <label for="">Status: </label>
        <br>
        <input type="number" name="status" value="<?= isset($status) ? $status : '' ?>" id="">
        <span><?= isset($errors['status']) ? $errors['status'] : '' ?></span>
        <br>

        <label for="">Ảnh:</label>
        <br>
        <input type="file" name="image" id="">
        <br>
        <span><?= isset($errors['image']) ? $errors['image'] : '' ?></span>
        <span><?= isset($errors['type']) ? $errors['type'] : "" ?></span>
        <br>
        <label for="">View:</label>
        <br>
        <input type="text" name="view" disabled value="0">
        <br>
        <label for="">Intro:</label>
        <br>
        <textarea name="intro" id="" cols="30" rows="10" value="<?= isset($intro) ? $intro : '' ?>"></textarea>
        <span><?= isset($errors['intro']) ? $errors['intro'] : '' ?></span>
        <br>

        <label for="">Detail:</label>
        <br>
        <textarea name="detail" id="" cols="30" rows="10" value="<?= isset($detail) ? $detail : '' ?>"></textarea>
        <span><?= isset($errors['detail']) ? $errors['detail'] : '' ?></span>
        <br>
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>