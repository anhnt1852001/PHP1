<?php
require_once "./connection.php";
$cate_id = $_GET['id'];
//Lấy ra sản phẩm để hiển thị trên trang danh mục (category) theo cate_id
$sql = "SELECT * FROM products WHERE cate_id=$cate_id ORDER BY pro_id DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include_once "layout/header.php"
?>
<!--Phần nội dung website-->
<main>
    <!--List products-->
    <div class="row mx-n1">
        <?php foreach ($products as $p) : ?>
            <div class="col-lg-3 col-md-4 col-6 px-1">
                <div class="card product">
                    <a href="detail.php?id=<?= $p['pro_id'] ?>">
                        <img src="./images/<?= $p['pro_image'] ?>" class="img-fluid">
                        <h3><?= $p['pro_name'] ?></h3>
                        <div class="price"><?= $p['price'] ?></div>
                        <div class="desc">
                            <p><?= $p['intro'] ?></p>
                        </div>
                    </a>
                </div>
                <div class="card-footing mb-2">
                    <div class="d-flex justify-content-between px-3">
                        <span class="text-info"><i class="fas fa-check"></i>Còn hàng</span>
                        <a href="#"><span><i class="fas fa-shopping-cart"></i>Thêm vào
                                giỏ</span></a>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
    <!--End list products-->
</main>
<!--Kết thúc phần nội dung của website-->
<?php
include_once "layout/footer.php"
?>