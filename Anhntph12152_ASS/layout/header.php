<?php
//Lấy toàn bộ danh mục sản phẩm
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="css/main1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <header class="header ">
        <div class="container-md">
            <div class="d-none d-lg-block">
                <div class="header__first">
                    <ul class="">
                        <li> <a href="#"><i class="fas fa-share-alt-square"></i>hệ thống showroom</a> </li>
                        <li class="title-gradient py-2 px-1 rounded-pill"> <a href="#"><i class="fas fa-phone-alt"></i>
                                hàng
                                trực
                                tuyến</a> </li>
                        <li class="title-gradient py-2 px-1 rounded-pill "> <a href="#"><i class="fas fa-phone-alt"></i>kinh
                                doanh
                                showroom</a> </li>
                        <li> <a href="#"><i class="fas fa-wifi"></i>trang tin công nghệ</a> </li>
                        <li> <a href="#"><i class="fas fa-blender-phone"></i>tổng hợp khuyến mại</a> </li>
                        <li> <a href="#"><i class="fas fa-copy"></i>tra cứu bảo hành</a> </li>
                        <li> <a href="#"><i class="fas fa-file-download"></i>tải hợp đồng </a> </li>
                        <li> <a href="#"><i class="fas fa-file-archive"></i>in hóa đơn điện tử</a> </li>
                    </ul>
                </div>
                <div class="header__second">
                    <div class="row">
                        <div class="col-3">
                            <div class="header__logo">
                                <a href="#">
                                    <img src="uploads/images/logo-trang.png" class="img-fluid" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col- px-1">
                                    <div class="header__accessories mt-3">
                                        <button type="button" class="  btn-danger rounded border-0 p-1">Xây dựng cấu
                                            hình
                                            máy
                                            tính</button>
                                        <button type="button" class=" btn-danger rounded border-0 p-1">Xây dựng tản
                                            nhiệt
                                            nước
                                            PC</button>
                                    </div>
                                </div>
                                <div class="col-7 ml-3 px-1">
                                    <div class="header__form">
                                        <ul class="">
                                            <li class=" header__form--phone">
                                                <span class="header__form--icon"><i class="fas fa-phone-square-alt"></i>
                                                </span>
                                                <span class="mr-5">
                                                    Mua hàng online
                                                    1900.1903
                                                </span>
                                            </li>
                                            <li class=" header__form--login">
                                                <span class="header__form--icon"><i class="fas fa-user-tie"></i></span>
                                                <span class="ml-1"> <a href="login.php"> Đăng nhập</a></span>
                                                <br>
                                                <span class="ml-1"> <a href="logout.php"> Đăng xuất</a></span>
                                            </li>
                                            <li class=" header__form--cart">
                                                <span class="header__form--icon"><i class="fas fa-cart-plus"></i></span>
                                                <span>
                                                    giỏ hàng
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header__third mt-2">
                    <div class="row">
                        <div class="col-6">
                            <ul class="row">
                                <li class="mr-1">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-warning">DANH MỤC SẢN PHẨM</button>
                                    </div>
                                </li>
                                <li class="mr-1">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-warning">Laptop, Máy Tính
                                            Bảng</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-warning">TÌM THEO HÃNG</button>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="col-6">
                            <div class="input-group " style="margin-left: -10px;">
                                <input type="text" style="height: 35px; font-size: 14px;" class="form-control" placeholder="Nhập tên sản phẩm , từ khóa quan trọng" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append" style="height: 35px; ">
                                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-block d-lg-none">
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <div style="font-size: 30px;" class="mr-4">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a class="navbar-brand" href="#">
                        <img src="uploads/images/logo-trang.png" class="img-fluid" alt="logo">
                    </a>
                    <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <span>
                                    <a class="nav-link" href=""> Đăng kí <span class="sr-only">(current)</span></a>
                                </span>
                                <span>
                                    <a class="nav-link" href="#"> Đăng nhập</a>
                                </span>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Danh sách sản phẩm
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Asus</a>
                                    <a class="dropdown-item" href="#">Acer</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Các Sản Phẩm Khác</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                        </ul>
                    </div>

                </nav>
            </div>
        </div>

    </header>
    <div class="container">
        <div class="main border-bottom border-secondary d-none d-lg-block">
            <div class="row mt-2">
                <aside class="col-2 px-1">
                    <div class="bg-light list">
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="quantri.php">Quản trị</a></li>
                            <?php foreach ($cate as $c) : ?>
                                <li><a href="category.php?id=<?= $c['cate_id'] ?>"><?= $c['cate_name'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </aside>
                <section class="col-10 px-1 mb-2 ">
                    <div class="row mx-1">
                        <div class="col-9 px-2">
                            <section class="slide">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                        </li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="uploads/images/slide1.jpg" class="d-block img-fluid" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="uploads/images/slide2.jpg" class="d-block img-fluid" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="uploads/images/slide3.jpg" class="d-block img-fluid" alt="...">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </section>
                        </div>
                        <div class="col-3 px-1 ">
                            <div class="image-right">
                                <a href="#">
                                    <img src="uploads/images/baner-r.png" class="img-fluid" alt="phto">
                                </a>
                            </div>
                            <div class="image-right">
                                <a href="#">
                                    <img src="uploads/images/bannerr-2.png" class="img-fluid" alt="phto">
                                </a>
                            </div>
                        </div>
                    </div>
                    <section class="row mx-1 mt-2">
                        <div class="col-4 px-1">
                            <a href="#">
                                <img src="uploads/images/banner.png" class="img-fluid" alt="photo">
                            </a>
                        </div>
                        <div class="col-4 px-1">
                            <a href="#">
                                <img src="uploads/images/banner1.png" class="img-fluid" alt="photo">
                            </a>
                        </div>
                        <div class="col-4 px-1">
                            <a href="#">
                                <img src="uploads/images/banner1.png" class="img-fluid" alt="photo">
                            </a>
                        </div>
                    </section>

                </section>
                <div class="footing__image mt-3">
                    <div class="row mx-1">
                        <div class="col-4 px-1">
                            <a href="#">
                                <img src="uploads/anh/anh5.png" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="col-4 px-1">
                            <a href="#">
                                <img src="uploads/anh/anh6.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="col-4 px-1">
                            <a href="#">
                                <img src="uploads/anh/anh7.png" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="js/main.js"></script>