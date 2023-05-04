<?php
require_once "./connection.php";

$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchAll(PDO::FETCH_ASSOC);

$errors = ['title' => '', 'status' => '', 'intro' => '', 'detail' => '', 'image' => ''];
if (isset($_POST['btnLuu'])) {

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
        $image =  $image;
    }
    if (!array_filter($errors)) {
        $sql = "UPDATE news SET title='$title',cate_id = '$cate_id',status = '$status',intro = '$intro',image='$image',detail='$detail'
             WHERE news_id = $news_id";
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

$news_id = $_GET['id'];

$sql = "SELECT * FROM news WHERE news_id=$news_id";

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
    <h3>Sửa news</h3>
    <a href="new.php">News</a>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="news_id" value="<?= $result['news_id'] ?>">
        <label for="">Tên news:</label>
        <br>

        <input type="text" name="title" value="<?= $result['title'] ?>" id="">
        <?= isset($errors['title']) ? $errors['title'] : '' ?>
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

        <label for="">Status:</label>
        <br>
        <input type="number" name="status" value="<?= $result['status'] ?>" id="">
        <?= isset($errors['status']) ? $errors['status'] : '' ?>
        <br>

        <label for="">Ảnh:</label>
        <br>
        <input type="file" name="image" id="">
        <?= isset($errors['image']) ? $errors['image'] : '' ?>
        <?php if (!empty($result['image'])) :  ?>
            <input type="hidden" name="image" value="<?= $result['image'] ?>">
            <br>
            <img src="images/<?= $result['image'] ?>" width="120" alt="">
        <?php endif; ?>
        <br>

        <label for="">View:</label>
        <br>
        <input type="text" name="view" disabled value="0">
        <br>

        <label for="">Intro:</label>
        <br>
        <textarea name="intro" id="" cols="30" rows="10"><?= $result['intro'] ?></textarea>
        <?= isset($errors['intro']) ? $errors['intro'] : '' ?>
        <br>

        <label for="">Detail:</label>
        <br>
        <textarea name="detail" id="" cols="30" rows="10"><?= $result['detail'] ?></textarea>
        <?= isset($errors['detail']) ? $errors['detail'] : '' ?>
        <br>
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>