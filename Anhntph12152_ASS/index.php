<?php
require_once "./connection.php";
//Lấy ra 8 sản phẩm để hiển thị trên trang chủ 
$sql = "SELECT * FROM products ORDER BY pro_id DESC LIMIT 0,8";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include_once "layout/header.php"
?>
<main>
    <div class="production">
        <section class="product_sale mt-2 bg-light">
            <div class="container">
                <div class="section_title row pr-3">
                    <h2 class="ml-3 mt-3">XẢ KHO GIÁ SỐC - MUA HÀNG SÂU HƠN GIÁ GỐC </h2>
                    <span class="ml-auto mt-2"> <small>
                            <a href="#" class="text-dark text-decoration-none"> xem tất cả >></a></small></span>
                </div>
            </div>
            <div class="section-body">
                <div class="container">

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

                </div>
            </div>
    </div>
    </section>
    </div>
</main>
<?php
include_once "layout/footer.php"
?>