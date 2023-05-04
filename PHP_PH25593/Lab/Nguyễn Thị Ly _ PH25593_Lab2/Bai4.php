
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <label for="">Tuổi</label>
    <input class="form-action" type="number" name="tuoi">
    <br>

    <label for="">Năm công tác</label>
    <input class="form-action" type="number" name="namct">
    <br>
    <button name="dangKy" type="submit" >Kiểm tra</button>
    </form>
</body>
</html>
<br>
<?php

if(isset($_POST['dangKy'])){

    $tuoi = $_POST['tuoi'];
    $namct = $_POST['namct'];
    $luong = 0;

    if($tuoi > 25 && $tuoi < 33){
        $luong = 10000000;
    } else if($tuoi < 45 && $namct >9){
        $luong = 18000000;
    } else if($tuoi >44 && $namct > 15){
        $luong = 25000000;
    } else {
        $luong = 5000000;
    }

    echo "Thưởng: $luong<br>";
    echo "<br>";
}

?>









