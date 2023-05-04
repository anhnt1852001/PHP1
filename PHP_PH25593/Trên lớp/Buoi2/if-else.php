<?php
//Câu lệnh điều khiển
if(isset($a)):
    echo "Biến a tồn tại";
else:
    echo "Biến a không tồn tại";
endif;

//Khai báo $a
$a = 10;

?>

<?php if($a >= 10):?>
    <h1>Biến <?= $a ?> lớn hơn hoặc bằng 10</h1>
<?php else : ?>
    <h1>Biến <?php echo $a?> nhỏ hơn 10</h1>
<?php endif ?>