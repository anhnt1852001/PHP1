<?php
require_once "./connection.php";
$pro_id = $_GET['id'];
//Lấy ra sp có id là pro_id
$sql = "SELECT * FROM products WHERE pro_id=$pro_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php include_once "layout/header.php" ?>
<!--Phần nội dung website-->
<main>
    <div class="row mx-1 bg-light">
        <div class="col-md-4 px-1">
            <div>
                <h3><?= $product['pro_name'] ?></h3>
                <img src="images/<?= $product['pro_image'] ?>" alt="" class="img-fluid" width="300">
                <div><?= $product['detail'] ?></div>
            </div>
        </div>
        <div class="col-md-5 px-1">
            <div class="feature-product__info">
                <div class="d-flex justify-content-start">
                    <span>Mã SP:</span>
                    <span class="mr-2 text-danger">LTAU251</span>
                    <span class="mr-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        0 Đánh
                    </span>
                    <span class="mr-2">Lượt xem:5962</span>
                    <div class="text-primary"><i class="fas fa-thumbs-up"></i></div>
                    <a href="#" class="mr-2"><span>Thích</span></a>
                    <div class="text-primary"><i class="fas fa-share-alt-square"></i>
                    </div>
                    <a href="#"><span>Chia sẻ</span></a>
                </div>

                <div class="mt-3 tex-1">
                    <h5>Thông Số Sản Phẩm</h5>
                    <ul>
                        <li>
                            CPU: Intel Core i7 9750H
                        </li>
                        <li>RAM: 16GB RAM</li>
                        <li>Ổ cứng: 512GB SSD</li>
                        <li> NVIDIA RTX 2060 6GB</li>
                        <li>Màn hình: 15.6inch FHD</li>
                        <li> HĐH: Win 10</li>
                        <li> Màu :Đen</li>
                        <li>
                            Hệ điều hành: Win 10
                        </li>
                    </ul>

                    <h6 class="border-top"> Bảo hành : <span class="text-danger"> 24 tháng</span></h6>
                </div>
                <div class="feature-product__info--price ">

                    <h6>
                        <div>Giá: <?= $product['price'] ?></div>
                    </h6>

                </div>

                <div class="hot">
                    <div><button type="button" class="btn btn-sm btn-primary mb-2 mt-3">Hot</button>
                        <span>Chính sách Bảo Hành Vàng dành cho doanh nghiệp</span>
                    </div>
                    <div>
                        <button type="button" class="btn btn-sm btn-primary mb-2">Hot</button>
                        <span>Giảm thêm đến 200.000đ cho học sinh - sinh viên khi mua Laptop, PC
                            nguyên chiếc</span>
                    </div>
                    <div>
                        <button type="button" class="btn btn-sm btn-primary">Hot</button>
                        <span>Vệ sinh Laptop, PC - 5 bước miễn phí tại các điểm bán hàng của
                            HANOICOMPUTER</span>
                    </div>
                </div>

                <div class="feature-product__footing mb-2">
                    <div class="mt-3 border rounded">
                        <div href="#" class="title-gradient__second title-vip p-2">
                            <h5 class="mb-1 text-light"> Chương trình khuyến mại</h5>
                        </div>
                        <div class="">
                            <p class="text-danger mt-2 ml-2 font-weight-bold">
                                ƯU ĐÃI HOÀN TIỀN 500.000Đ ĐẾN 30/06.
                            </p>
                            <span class="text-danger mt-2 ml-2 font-weight-bold">
                                BỘ QUÀ TẶNG TRỊ GIÁ 1.500.000Đ
                            </span>
                            <ul>
                                <li>
                                    + Chuột không dây trị giá 169.000đ (MEHI001/MEHI002)
                                </li>
                                <li>
                                    + Tấm lót chuột trị giá 49.000đ (PADM639)
                                </li>
                                <li>
                                    + Túi chống sốc MSI trị giá 149.000đ (TUID214)
                                </li>
                                <li>
                                    + Túi đựng Laptop trị giá 149.000đ (CAPD061)
                                </li>
                                <li>
                                    + Tặng phiếu vệ sinh bảo dưỡng Laptop, PC miễn phí trọn đời trị giá 999.000đ (THEK417)
                                </li>
                            </ul>
                            <span class="text-danger mt-2 ml-2 font-weight-bold">ƯU ĐÃI KHI MUA KÈM LAPTOP
                                (ÁP
                                DỤNG ĐẾN
                                30/06/2020)</span>
                            <ul>
                                <li>
                                    + Giảm 5% Tai nghe Zidli, Dareu, Kingston HyperX, Corsair, SteelSeries, Ổ cứng gắn ngoài, Microphone Razer, HyperX, Router, Switch, Modem, Loa Logitech.
                                </li>
                                <li>
                                    + Giảm 10% Tai nghe JBL (TNJB), Bàn di chuột (PADM), USB, Card mạng, Card sound các loại.
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="btn__group text-light mt-4">
                        <div class="d-block">
                            <button type="button" class="btn btn-danger btn-lg btn-block">
                                THÊM VÀO GIỎ HÀNG
                                <span class="d-block">
                                    Thêm vào giỏ để chọn tiếp
                                </span>
                            </button>
                        </div>
                        <div class="row btn__group--second mt-2">
                            <div class="col-6">
                                <button type="button" class="btn btn-warning btn-lg btn-block">
                                    THÊM VÀO GIỎ HÀNG
                                    <span class="d-block">
                                        Thêm vào giỏ để chọn tiếp
                                    </span>
                                </button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-info btn-lg btn-block">
                                    MUA TRẢ GÓP
                                    <span class="d-block">
                                        Lãi suất 0% qua thẻ tín dụng
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3  px-1 aside-listing bg-light">
            <div class="border rounded mb-2 ">
                <div href="#" class="rounded-top title-gradient">
                    <h5 class="p-2 text-light"> Thông tin kho hàng</h5>
                </div>
                <div class="rounded px-2">
                    <span>
                        Hàng hiện đang có tại Showroom:
                    </span>
                    <ul>
                        <li>
                            <a class="text-danger" href="#">
                                - 43 Thái Hà - Đống Đa - HN
                            </a>
                        </li>
                        <li>
                            <a class="text-danger" href="#">
                                - 520 Cách Mạng Tháng 8 - Q3 - TP HCM
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border rounded mb-2">
                <div href="#" class="rounded-top bg-primary">
                    <h5 class="p-2 text-light"><i class="fas fa-money-bill-wave"></i> CHÍNH SÁCH BÁN HÀNG
                    </h5>
                </div>
                <div class="rounded px-2">
                    <ul>
                        <li>
                            <a href="#">
                                - Sản phẩm chính hãng 100%
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                - Bán hàng online toàn quốc
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                - Mua hàng trả góp lãi suất 0%
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                - Trả bảo hành tận nơi sử dụng
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                - Bảo hành tận nơi cho doanh nghiệp
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                - Giá cạnh tranh nhất thị trường
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="border rounded mb-2 ">
                <div href="#" class="rounded-top bg-primary">
                    <h5 class="p-2 text-light">
                        <i class="fas fa-truck"></i> CHÍNH SÁCH GIAO HÀNG
                    </h5>
                </div>
                <div class="rounded px-2">
                    <ul>
                        <li>
                            <a href="#">
                                - Giao hàng trước trả tiền sau COD
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                - Miễn phí giao hàng (bán kính 20km) với đơn hàng trên 500.000 đ

                            </a>
                        </li>
                        <li>
                            <a href="#">
                                - Miễn phí giao hàng 300km với khách hàng Games Net, Doanh Nghiệp, Dự Án -
                                Miễn phí giao hàng 300km với khách hàng Games
                                Net, Doanh Nghiệp, Dự Án

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </section>
    <section class="mt-3 bg-light">
        <div class="row">
            <div class="col-md-8">
                <div>
                    <h3>Đặc điểm nổi bật của Laptop Asus ROG Strix G G531-VAL319T (i7 9750/16GB RAM/512GB SSD/15.6 inch FHD/RTX 2060 6GB/Win 10/Balo/Đen)</h3>
                    <div class="community_home_search_divider"></div>
                    <p>Các anh em game thủ nếu đang tìm kiếm một “chiến mã” thực thụ có thể chiến đấu với nhiều tựa game hot mà mức giá lại vừa tầm thì Laptop Asus ROG Stix G G531-VAL319T của thương hiệu Asus là một lựa chọn cực kỳ hợp lý.</p>
                    <img src="uploads/im/anh7.jpg" alt="" class="img-fluid">
                    <div class="show1"><u>Xem Thêm</u></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="list">
                    <h3>Thông Số Kỹ Thuật</h3>
                    <ul class="list-group mb-3">
                        <li class="list-group-item">Hãng sản xuất : Asus</li>
                        <li class="list-group-item">Chủng loại : G531</li>
                        <li class="list-group-item">Part Number : VAL319T</li>
                        <li class="list-group-item">Màu sắc: Black Plastic/ LIGHTBAR</li>
                        <li class="list-group-item">Bộ vi xử lý : Intel® Core™ i7-9750H Processor 2.6GHz (12M Cache, up to 4.5GHz)</li>
                        <li class="list-group-item">Chipset : Mobile Intel® HM370 Express Chipsets</li>
                        <li class="list-group-item">Bộ nhớ trong : DDR4 2666 16GB</li>
                        <li class="list-group-item">Số khe cắm : 2x</li>
                        <li class="list-group-item">Dung lượng tối đa : 32 GB</li>
                        <li class="list-group-item">VGA : NVIDIA® GeForce RTX™ 2060 GDDR6 6GB</li>
                        <li class="list-group-item">Ổ cứng SSD : PCIE NVME 512G M.2 SSD</li>
                        <li class="list-group-item">Ổ quang : No</li>
                        <li class="list-group-item">Bảo mật, công nghệ : BIOS Administrator Password and User Password Protection</li>
                    </ul>
                    <button type="button" class="btn btn-primary btn-lg btn-block butt mb-3">Xem Thêm Cấu Hình
                        Chi Tiết</button>
                </div>
            </div>
    </section>
    <div class="mt-3">
        <h3>Bình Luận</h3>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1"></label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="d-flex justify-content-end mt-3">
        <button type="button" class="btn btn-secondary btn-sm mr-3 mb-3">CANCEL</button>
        <button type="button" class="btn btn-primary btn-sm mb-3">COMMENT</button>
    </div>
    <section class="comment bg-light">
        <span class="cmt">
            <h5>Nhận xét đánh giá</h5>
        </span>
        <div class="d-flex justify-content-start ic">
            <div>
                <i class="fas fa-user-circle mr-3"></i>
            </div>
            <div>
                <p class="name">Lê Văn Quyết</p>
                <span class="spn">Chất Lượng Hàng Rất Tốt</span>
                <p class="icon mt-2"><a href=""><span class="mr-3"><i class="far fa-thumbs-up"></i>Thích</span></a>
                    <a href=""><span class="mr-3"><i class="far fa-thumbs-down"></i>Không thích</span></a>
                    <a href=""> <span><i class="fas fa-comments"></i>Trả lời</span></a>
                </p>
            </div>
            <div>
                <i class="far fa-clock mr-2"></i><span>Khoảng 1 giờ trước</span>
            </div>
        </div>
        <div class="community_home_search_divider"></div>
        <div class="d-flex justify-content-start ic">
            <div>
                <i class="fas fa-user-circle mr-3"></i>
            </div>
            <div>
                <p class="name">Vũ Thị Linh Chi</p>
                <span class="spn">Hàng Khá Ổn Bền Đẹp</span>
                <p class="icon mt-2"><a href=""><span class="mr-3"><i class="far fa-thumbs-up"></i>Thích</span></a>
                    <a href=""><span class="mr-3"><i class="far fa-thumbs-down"></i>Không thích</span></a>
                    <a href=""> <span><i class="fas fa-comments"></i>Trả lời</span></a>
                </p>
            </div>
            <div>
                <i class="far fa-clock mr-2"></i><span>Khoảng 3 giờ trước</span>
            </div>
        </div>
        <div class="community_home_search_divider"></div>
        <div class="d-flex justify-content-start ic">
            <div>
                <i class="fas fa-user-circle mr-3"></i>
            </div>
            <div>
                <p class="name">Nguyễn Thị Phương Hiền</p>
                <span class="spn">Hàng Rất Tốt</span>
                <p class="icon mt-2"><a href=""><span class="mr-3"><i class="far fa-thumbs-up"></i>Thích</span></a>
                    <a href=""><span class="mr-3"><i class="far fa-thumbs-down"></i>Không thích</span></a>
                    <a href=""> <span><i class="fas fa-comments"></i>Trả lời</span></a>
                </p>
            </div>
            <div>
                <i class="far fa-clock mr-2"></i><span>Khoảng 5 giờ trước</span>
            </div>
        </div>
        <div class="community_home_search_divider"></div>
        <div class="d-flex justify-content-start ic">
            <div>
                <i class="fas fa-user-circle mr-3"></i>
            </div>
            <div>
                <p class="name">Đào Duy Anh</p>
                <span class="spn">Đẹp Chất Lượng 5 Sao</span>
                <p class="icon mt-2"><a href=""><span class="mr-3"><i class="far fa-thumbs-up"></i>Thích</span></a>
                    <a href=""><span class="mr-3"><i class="far fa-thumbs-down"></i>Không thích</span></a>
                    <a href=""> <span><i class="fas fa-comments"></i>Trả lời</span></a>
                </p>
            </div>
            <div>
                <i class="far fa-clock mr-2"></i><span>Khoảng 1 ngày trước</span>
            </div>
        </div>
        <div class="community_home_search_divider"></div>
        <div class="d-flex justify-content-center ">
            <button type="button" class="btn btn-primary btn-sm mb-3">Xem Thêm Bình Luận</button>
        </div>
    </section>
    <section class="product_sale mt-2 ">
        <div class="bg-light pb-2">
            <div class="container">

                <div class="section_title row pr-3">
                    <h2 class="ml-3 mt-3">Các Sản Phẩm tương tự</h2>
                    <span class="ml-auto mt-2"> <small><a href="#" class="text-dark text-decoration-none"> xem
                                tất
                                cả >></a></small></span>
                </div>
                <div class="section-body">
                    <div class="row mx-n1">
                        <div class="col-lg-3 col-md-4 col-6 px-1">
                            <div class="card product">
                                <img src="uploads/images/anh18.jpg" class="card-img-top " alt="" class="img-fluid">
                                <div class="card-body">
                                    <h5 class="card-title">Laptop Asus ROG Stix G G531GT-AL007T
                                    </h5>
                                    <div class="price">
                                        <div class="price-discount">
                                            <span>2.999.000đ</span>
                                            <span class="text-danger">( Tiết kiệm: 37% )</span>
                                        </div>
                                        <div class="price-last">
                                            1.899.999đ
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footing mb-2">
                                    <div class="d-flex justify-content-between px-3">
                                        <span class="text-info"><i class="fas fa-check"></i>Còn hàng</span>
                                        <span><i class="fas fa-shopping-cart"></i>Thêm vào giỏ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6 px-1">
                            <div class="card product">
                                <img src="uploads/images/anh19.jpg" class="card-img-top " alt="" class="img-fluid">
                                <div class="card-body">
                                    <h5 class="card-title">Laptop Asus ROG Stix G G531GT-AL007T
                                    </h5>
                                    <div class="price">
                                        <div class="price-discount">
                                            <span>2.999.000đ</span>
                                            <span class="text-danger">( Tiết kiệm: 37% )</span>
                                        </div>
                                        <div class="price-last">
                                            1.899.999đ
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footing mb-2">
                                    <div class="d-flex justify-content-between px-3">
                                        <span class="text-info"><i class="fas fa-check"></i>Còn hàng</span>
                                        <span><i class="fas fa-shopping-cart"></i>Thêm vào giỏ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6 px-1">
                            <div class="card product">
                                <img src="uploads/images/anh20.jpg" class="card-img-top " alt="" class="img-fluid">
                                <div class="card-body">
                                    <h5 class="card-title">Laptop Asus ROG Stix G G531GT-AL007T
                                    </h5>
                                    <div class="price">
                                        <div class="price-discount">
                                            <span>2.999.000đ</span>
                                            <span class="text-danger">( Tiết kiệm: 37% )</span>
                                        </div>
                                        <div class="price-last">
                                            1.899.999đ
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footing mb-2">
                                    <div class="d-flex justify-content-between px-3">
                                        <span class="text-info"><i class="fas fa-check"></i>Còn hàng</span>
                                        <span><i class="fas fa-shopping-cart"></i>Thêm vào giỏ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6 px-1">
                            <div class="card product">
                                <img src="uploads/images/anh21.jpg" class="card-img-top " alt="" class="img-fluid">
                                <div class="card-body">
                                    <h5 class="card-title">Laptop Asus ROG Stix G G531GT-AL007T
                                    </h5>
                                    <div class="price">
                                        <div class="price-discount">
                                            <span>2.999.000đ</span>
                                            <span class="text-danger">( Tiết kiệm: 37% )</span>
                                        </div>
                                        <div class="price-last">
                                            1.899.999đ
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footing mb-2">
                                    <div class="d-flex justify-content-between px-3">
                                        <span class="text-info"><i class="fas fa-check"></i>Còn hàng</span>
                                        <span><i class="fas fa-shopping-cart"></i>Thêm vào giỏ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!--Kết thúc phần nội dung của website-->
<?php include_once "layout/footer.php" ?>