<!-- <?php
if (isset ($_POST['upload'])){
    $file = $_FILES['fileupload'];

$file_name = $file['name'];
$thu_muc_upload = "upload/";




// Vadidate file
if($file['size'] <= 0){
    $file_err = "Bạn chưa nhập file";
}
//vadidate fle ảnh
if($file['size'] >= 2){
    //Lấy extension của file
    $ext = strtolower(pathinfo($file_name,PATHINFO_EXTENSION)) ;
    if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg'){
        $file_err ="File không phải là ảnh";
    }
}
if(!isset($file_err)){
    move_uploaded_file($file['tmp_name'], $thu_muc_upload . $file_name);
    $upload_ok = true;
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
    <?php if (isset($upload_ok)):?>
        <div>
           
            <span style="color:green"> <?="Upload file thành công"?></span>
        </div>
        <?php endif ?>
    <form action="" method="post" enctype="multipart/form-data">
        File upload
        <input type="file" value="" name="fileupload">
        <?php if(isset ($file_err)):?>
            <span style="color:red"><?= $file_err?></span>
            
            <?php endif ?>
        <br>
        <button type="submit" name="upload">Upload</button> 
        <button><a href="show_products.php">show_products</a></button>
    </form>
</body>
</html> -->