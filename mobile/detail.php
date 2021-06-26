<?php   
    session_start();
include 'models/db.php';
include 'models/product.php';
require "models/protype.php";
require './models/manufacture.php';
$product = new Product();
$id = "";
$protypes = new Protype();
$manufacture = new manufacture();
$loai = "";
$manu = "";
if (isset($_GET['type'])) {
    $loai = $_GET['type'];
} else if (isset($_GET['manu'])) {
    $manu = $_GET['manu'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mobile Shopping</title>
    <link rel="icon" href="./images/logo.png" type="image/icon type">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                        <div class="logo"> <a href="index.php"><img src="images/logo.png" alt="" /></a> </div>
                    </div>
                    <div class="mainmenu pull-right">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li class="dropdown"><a href="index.html">Products<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <?php foreach ($protypes->getAllProtypes() as $value) { ?>
                                        <li><a href="cate.php?type=<?php echo $value['type_name'] ?>"><?php echo $value['type_name'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Blog List</a></li>
                                    <li><a href="#">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="cart.php">Cart</a></li>
                        </ul>
                        <div class="search_box pull-right">
                            <form action="" method="get">
                                <input type="text" placeholder="Search" name="key" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
    </header>
    <!--/header-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php foreach ($manufacture->getAllManufacture() as $value) { ?>
                                        <h4 class="panel-title"><a href="cate.php?manu=<?php echo $value['manu_name'] ?>"><?php echo $value['manu_name'] ?></a></h4>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <!--product-details-->
                        <form action="cart.php" method="post">
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id']; //id=1
                                $query = $product->getProducteByID($id);
                                foreach ($query as $value) {
                                        $_SESSION['id'] = $value['id'];
                            ?>
                                    <div class="col-sm-5">
                                        <div class="view-product">
                                            <img style="width: 250px;height:250px;" src="images/<?php echo $value['pro_images'] ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="product-information">
                                            <!--/product-information-->
                                            <h2><?php echo $value['name'] ?></h2>
                                            <span>
                                                <span><?php echo number_format($value['price']) ?></span>
                                                <label>Quantity:</label>
                                                <button type="button" id="visibled" onclick="tru()" >-</button>
                                                <input type="text" name="quantity" id="valueQuantity" value="1"  />
                                                <button type="button" onclick="cong()" >+</button>
                                                <input type="submit" value="Add to cart" name="submitCart">
                                            </span>
                                            <p><b>Availability:</b> In Stock</p>
                                            <p><b>Condition:</b> New</p>
                                            <p><b>Brand: </b><?php echo $value['manu_name'] ?></p>
                                        </div>
                                        <!--/product-information-->
                                    </div>
                            <?php }}
                             ?>
                        </form>
                    </div>
                    <!--/product-details-->
                    <!--features_items-->
                </div>
            </div>
    </section>
    <footer id="footer">
        <!--Footer-->

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>
    </footer>
    <!--/Footer-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script>
        let dem =0;
        let valueQuantity = document.getElementById('valueQuantity');
        if(valueQuantity.value == 1){
                document.getElementById('visibled').style.visibility = "hidden";         
            }
        function tru(){
            if(valueQuantity.value == 1){
                document.getElementById('visibled').style.visibility = "hidden";         
            }
            else{
                // document.getElementById('visibled').style.visibility = "visible";
                dem = valueQuantity.value - 1;
                valueQuantity.value = dem;
            }
        }
        function cong(){
            dem = Number(valueQuantity.value)  + 1;
            valueQuantity.value = dem;
            if(valueQuantity.value > 1){
                    document.getElementById('visibled').style.visibility = "visible";
            }
        }
    </script>
</body>

</html>