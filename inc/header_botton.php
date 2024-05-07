<?php
get_header();
require 'data/connect.php';
$sql_category = "SELECT * FROM `category_product`";
$rows_category = mysqli_query($conn, $sql_category);
$category = mysqli_fetch_all($rows_category, MYSQLI_ASSOC);
?>
<style>
    .navbar-nav {
        position: relative;
    }

    .navbar-right li {
        display: flex;
        justify-content: flex-end;
        align-items: end;
    }



    .navbar-nav .dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-menu :hover .dropdown-item {
        color: #00ADEF;
        background: #fff;
    }

    .nav-link-separate::after {
        content: "";
        display: none;
        position: absolute;
        width: 73px;
        height: 2px;
        background-color: #cc0100;
        text-align: center;
        bottom: -7px;
    }

    .navbar-nav :hover .nav-link-separate::after {
        display: flex;

    }

    .color-badge {
        color: #fff;
        background-color: #00ADEF;
    }

    .logo-web {
        width: 300px;
    }

    .search-header-bottom {
        right: 105px;
    }
</style>
<div class="row position-relative py-2">
    <div class="col-md-12 justify-content-center align-items-center d-flex ">
        <div class="img-header-bottom">
            <img class="logo-web" src="https://orchard.vn/wp-content/uploads/2020/01/logo-orchard.png" alt="">
        </div>
        <div class="search-header-bottom position-absolute">
            <form action="?mod=search&act=search" method="post">
                <input type="text" name="search" placeholder="tìm kiếm sản phẩm">
                <button type="submit" class="position-absolute"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

    </div>
</div>
<div class="row header-bottom">

    <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-white  ">
            <div class="container-fluid justify-content-around">
                <ul class="navbar-nav  navbar-left">
                    <li class="nav-item">
                        <a href="?mod=home&act=main" class="nav-link nav-link-separate">Trang chủ</a>
                    </li>
                    <?php foreach ($category as $item) : ?>
                        <li class="nav-item">

                            <a class="nav-link nav-link-separate" href="?mod=product&act=product_category&id=<?= $item['id_category'] ?>"><?= $item['category_name'] ?></a>
                        </li>
                    <?php endforeach; ?>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>