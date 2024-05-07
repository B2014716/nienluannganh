<?php
$id = $_GET['id'];
$sql = "SELECT * FROM `tbl_product` WHERE id_category = '$id'";
$row = mysqli_query($conn, $sql);
$product = mysqli_fetch_all($row, MYSQLI_ASSOC);
get_header();
get_header_top();
?>
<style>
    .card {
        width: 235px;
        height: 335px;
        border: none;
        overflow: hidden;
    }

    .card_product {
        padding-bottom: 50px;
        padding-top: 50px;
    }

    .code_product {
        opacity: 0.5;
        text-decoration-color: inherit;
    }

    .buy_product {
        background: #00ADEF;
        bottom: 0px;
        opacity: 0.9;

    }

    .buy_product input[type="submit"] {
        color: #fff;
    }



    .card-body a {
        text-decoration: none;
    }


    .price {
        color: #e30e48;
        font-size: 20px;
        font-weight: 500;
    }

    .name_product {
        font-weight: 400;
        color: #000;
        margin-top: 10px;
    }

    /* phân trang */
    .pagging li a {
        text-decoration: none;


    }

    .pagging li {
        list-style: none;
        padding: 5px;
    }

    .add-cart-button {
        border: 1px solid #e30e48;
        border-radius: 10px;
    }
</style>

<body>
    <?php get_header_bottom() ?>
    <main>
        <div class="container">


            <div class="row ">

                <?php foreach ($product as $products) : ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 card_product">
                        <div class="card position-relative">
                            <img src="<?php echo "../../admin/" . $products['image_product'] ?>" alt="" class="img_product">
                        </div>
                        <div class="card-body text-start">
                            <a href="?mod=product&act=detail&id=<?= $products['product_id'] ?>">
                                <p class="name_product"><?= $products['name_product'] ?></p>
                            </a>
                            <p class="code_product"><?= $products['code_product'] ?></p>
                            <div class="cart-btn-add d-flex justify-content-evenly">
                                <p class="price"><?= number_format($products['price_product']) . " đ"  ?></p>
                                <a class="add-cart-button" href="?mod=cart&act=add&id=<?= $products['product_id'] ?>"> <button type="submit" value="" class="btn w-100"><i class="fa-solid fa-cart-plus"></i></button></a>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <?php get_footer() ?>