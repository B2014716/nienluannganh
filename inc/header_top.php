<?php
get_header();

?>
<style>
    .text-titles-header {
        background-color: #CC0100;
        color: #fff;
        width: 100%;
        text-align: center;
        padding: 10px 0;
    }

    .user-cart-header-top {
        right: 100px;
        top: 10px;
        color: #fff;
    }

    .user-cart-header-top button {
        background: none;
        color: #fff;

    }
</style>
<div class="row position-relative">
    <div class="col-md-12 justify-content-center d-flex ">
        <div class="text-titles-header">
            <span> Chuỗi siêu thị nước hoa mỹ phẩm uy tín</span>
        </div>
        <div class="user-cart-header-top d-flex position-absolute">
            <a href="?mod=user&act=login" class="nav-link"><i class="fa-regular fa-user"></i>
                <?php
                if (isset($_SESSION['username'])) {
                    echo $_SESSION['username']; // Thêm lệnh echo để hiển thị tên người dùng
                ?>
            </a>
            <a href="?mod=user&act=log_out" class="nav-link px-2">đăng xuất</a>
        <?php } else {
                    // Nếu không có người dùng đăng nhập, bạn có thể hiển thị một thông báo khác ở đây
                    echo "Đăng nhập";
                }
        ?>
        </a>
        <button type="button" class=" position-relative border-0 ">
            <a class="nav-link" href="?mod=cart&act=show"><i class="fa-solid fa-cart-shopping "></i></a>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill ">
                <?php if (isset($_SESSION['cart'])) {
                    echo $_SESSION['cart']['info']['num_order'];
                } else {
                    echo 0;
                }
                ?>
            </span>
        </button>
        </div>
    </div>
</div>