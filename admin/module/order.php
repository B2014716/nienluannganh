<?php
require "data/connect.php";
require "inc/header.php";
require "inc/nav.php";;
$sql = "SELECT * FROM `tbl_info_cart`";
$row = mysqli_query($conn, $sql);
$order = mysqli_fetch_all($row, MYSQLI_ASSOC);
$num = 0;
// echo "<pre>";
// print_r($order);
// echo "</pre>";
?>
<style>
    .table-admin-order table th,
    .table-admin-order table td {
        border: 1px solid #ddd;
        text-align: center;
        padding: 8px;
    }

    .table-admin-order table th {

        background-color: aquamarine;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="title-admin-order">
            <p class="title-admin text-center">Đơn hàng</p>
        </div>
        <div class="table-admin-order d-flex justify-content-center">
            <table>
                <tr>
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>địa chỉ</th>
                    <th>Lưu ý của khách hàng</th>
                    <th>Mã đơn hàng</th>
                    <th>Hình thức thanh toán</th>
                    <th>Nơi giao hàng</th>
                    <th>Xem chi tiết</th>
                    <th>Thao tác</th>
                </tr>
                <?php foreach ($order as $items) : ?>
                    <tr>

                        <td><?= $num += 1 ?></td>
                        <td><?= $items['name_cart'] ?></td>
                        <td><?= $items['phone_number_cart'] ?></td>
                        <td><?= $items['email_cart'] ?></td>
                        <td><?= $items['address_cart'] ?></td>
                        <td><?= $items['note_cart'] ?></td>
                        <td><?= $items['code_order'] ?></td>
                        <td><?= $items['payment'] ?></td>
                        <td><?= $items['location'] ?></td>
                        <td> <a href="?act=order_detail&code=<?= $items['code_order'] ?>"><i class="fa-solid fa-circle-info"></i></a></td>
                        <td>Hoàn thành</td>


                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>
</div>