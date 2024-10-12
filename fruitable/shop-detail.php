<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fruitables - Vegetable Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php
    require_once("pages/layouts/style.php");
    ?>
</head>

<body>

    <?php
    require_once("pages/layouts/header.php");
    ?>


    <!-- Single Product Start -->
    <?php
    require_once("pages/shop-detail/single-product.php");
    ?>
    <!-- Single Product End -->


    <!-- Footer Start -->
    <?php
    require_once("pages/layouts/footer.php");
    ?>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <?php
    require_once("pages/layouts/copy-right.php");
    ?>
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <?php
    include("pages/layouts/script.php");
    ?>
</body>

</html>