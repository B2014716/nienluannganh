<?php
require "data/connect.php";
require "inc/header.php";
require "inc/nav.php";
$code = $_GET['code'];
$sql = "SELECT * FROM `order_detail` WHERE order_code = '$code'";
$row = mysqli_query($conn, $sql);
$detail = mysqli_fetch_all($row, MYSQLI_ASSOC);
$totalPrice = 0;
$num = 0;
// echo "<pre>";
// print_r($detail);
// echo "</pre>";
?>

<style>
    .table-admin-order table th,
    .table-admin-order table td {
        border: 1px solid #ddd;
        text-align: center;
        padding: 8px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="title-admin-order">
            <p class="title-admin text-center">Chi tiết đơn hàng</p>
        </div>
        <div class="table-admin-order d-flex justify-content-center">
            <table>
                <tr>
                    <th>STT</th>
                    <th>Tên mặt hàng</th>
                    <th>số lượng</th>
                    <th>Giá</th>
                    <th>Tổng tiền</th>

                </tr>
                <?php foreach ($detail  as $items) : ?>
                    <tr>

                        <td><?= $num += 1 ?></td>
                        <td><?= $items['order_name'] ?></td>
                        <td><?= $items['order_quantity'] ?></td>
                        <td><?php $totalPrice = $items['order_quantity'] *  $items['order_price'];
                            echo number_format($items['order_price'], 0, ',', '.') . "đ"  ?></td>
                    <?php endforeach; ?>
                    <td>
                        <?php
                        echo number_format($totalPrice, 0, ',', '.') . "đ"
                        ?>
                    </td>
                    </tr>
        </div>

    </div>
</div>