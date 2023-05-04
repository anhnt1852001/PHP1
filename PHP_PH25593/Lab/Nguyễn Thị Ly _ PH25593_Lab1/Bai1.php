<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
    <style>
        input{
            margin: 0px 0px 10px 0px;
        }
    </style>
</head>
<body>
    <form action="Bai1.php" method = "post">
        <label for="">Nhập giá trị doanh số bán hàng: </label>
        <input type="text" name="doanhso" />
        <br>
        <label for="">Nhập giá trị hoa hồng: </label>
        <input type="text" name="hoahong" />
        <br>
        <button type="Submit" name="dangky">Gửi</button>
    </form>
</body>
</html>
<br>
<?php
    if(isset($_POST['dangky'])){
        
        $doanhso = $_POST['doanhso'];
        $hoahong = $_POST['hoahong'];

        if($doanhso<=100){
            $hoahong= $doanhso*(5/100);
        }else if($doanhso <= 300){
            $hoahong= $doanhso*(10/100);
        }else if($doanhso>300){
            $hoahong= $doanhso*(20/100);
        }
        echo "Doanh số: $doanhso <br>";
        echo "Hoa hồng: $hoahong <br>";
    }

    