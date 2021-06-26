<?php
require "models/db.php";
require "models/product.php";
 require "models/protype.php";
require './models/manufacture.php';
$product = new Product;
$protypes = new Protype();
$manufacture = new manufacture();
    $loai = "";$manu = "";
    if(isset($_GET['type'])){
        $loai = $_GET['type'];
    }
    else if(isset($_GET['manu'])){
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
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                        <div class="logo"> <a href="index.php"><img src="images/logo.png" alt="" /></a> </div>
                    </div>
                    <div class="mainmenu pull-right">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li class="dropdown"><a href="index.php">Products<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <?php foreach ($protypes->getAllProtypes() as $value) {?>
                                    <li><a href="cate.php?type=<?php echo $value['type_name']?>"><?php echo $value['type_name'] ?> </a>
                                  <?php }?> 
                                    
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
                            <form action="result.php" method="get">
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
                                <?php foreach($manufacture->getAllManufacture() as $value){ ?>
                                        <h4 class="panel-title"><a href="cate.php?manu=<?php echo $value['manu_name'] ?>"><?php echo $value['manu_name'] ?></a></h4>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-sm-9 padding-right">
                <div class="SmarPhone_items">
                        <!--features_items-->
                        <?php if(isset($loai)){ ?>
                        <h2 class="title text-center"><?php echo $loai ?></h2>  
                        <?php } else{?>
                            <h2 class="title text-center"><?php echo $manu ?></h2>  
                        <?php }?>
                            <?php 
                                if(isset($loai) || isset($manu)){
                                    $result = $product->getAllManuOrType();
                                    foreach ($result as $value ) { 
                                        if($value['manu_name'] == $manu || $value['type_name'] == $loai){
                            ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center"> <img style="width: 250px;height:250px;" src="images/<?php echo $value['pro_images']?>" alt="" />
                                        <h2><?php echo number_format ($value['price']) ?>VND</h2>
                                        <p></p>
                                        <a href="cart.php?id=<?php echo $value['id'] ?>" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php echo number_format ($value['price']) ?></h2>
                                            <p><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?>"></a></p>
                                            <a href="cart.php?id=<?php echo $value['id'] ?>" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <?php } }}?>  
                           
                </div>
                        <ul class="pagination col-sm-12">
