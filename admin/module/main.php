<?php
require "../data/connect.php";
require "inc/header.php";
require "inc/nav.php";
$rows_product = mysqli_query($conn, "SELECT * FROM `tbl_product`");
$num_rows = mysqli_num_rows($rows_product);
// số lượng sản phẩn cần hiển thị trên trang
$num_per_page = 4;
// số lượng sản phẩm khi truy vấn ra 
$total_row = $num_rows;
// để dùng vòng lặp for để tính ra số trang được hiển thị
$num_page = ceil($total_row / $num_per_page);
// nếu giá trị mặc định của page = 0(không truyền qua post) thì giá trị mặc định bằng 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
// số bản ghi bắt đầu trên csdl để dùng kết hợp với câu lệnh truy vấn LIMIT
$start = ($page - 1) * $num_per_page;
$result = mysqli_query($conn, "SELECT * FROM `tbl_product` LIMIT {$start}, {$num_per_page}");
$product = mysqli_fetch_all($result, MYSQLI_ASSOC);
// $rows = mysqli_query($conn, $sql);
// $product = mysqli_fetch_all($rows, MYSQLI_ASSOC);
$number = 0;

?>

<style>
    .pagging li a {
        list-style: none;
        padding: 5px;
        text-decoration: none;
        padding: 10px;
    }

    .pagging {
        margin-top: 20px;
    }
</style>
<div class="row text-center">

    <div class="col-md-12">
        <div class="pt-5">
            <p class="title-admin">Danh sách sản phẩm</p>
            <button class="btn btn-primary add-product-admin"><a class="text-white text-decoration-none" href="?act=uploads">Thêm</a></button>
        </div>

        <table class="admin-main d-flex justify-content-center">
            <tr>
                <th>Số thứ tự</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh sản phẩm</th>
                <th>Mã sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Ngày thêm</th>
                <th>trạng thái</th>
            </tr>
            <?php foreach ($product as $products) : ?>
                <tr>
                    <td><?= $number += 1  ?></td>
                    <td><?= $products['name_product'] ?></td>
                    <td><img src="<?= $products['image_product'] ?>" alt="" width="100px"></td>
                    <td><?= $products['code_product'] ?></td>
                    <td><?= $products['price_product'] ?></td>

                    <td><?= $products['create_date'] ?></td>
                    <td><a href="?act=update&id=<?php echo $products['product_id'] ?>">Sửa</a> | <a onclick="return Del('<?php echo $products['name_product'] ?>')" href="?act=delete&id=<?php echo $products['product_id'] ?>">Xóa</a></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
    <ul class="pagging d-flex justify-content-center">
        <?php if ($page > 1) { ?>
            <?php $page_prev = $page - 1 ?>
            <li><a href="?page=<?= $page_prev ?>">Trước</a></li>
        <?php } ?>
        <?php for ($i = 1; $i <= $num_page; $i++) { ?>
            <li><a href="?page=<?= $i ?>"><?= $i ?></a></li>
        <?php } ?>
        <?php if ($page < $num_page) { ?>
            <?php $page_next = $page + 1 ?>
            <li><a href="?page=<?= $page_next ?>">Sau</a></li>
        <?php } ?>
    </ul>
</div>
<script>
    function Del(name) {
        return confirm("bạn có chắc chắn muốn xóa sản phẩm " + name + "?");
    }
</script>