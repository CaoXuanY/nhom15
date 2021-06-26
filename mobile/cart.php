<?php   
    session_start();
    //session_destroy();
    include 'models/db.php';
    include 'models/product.php';
    require "models/protype.php";
    require './models/manufacture.php';
$product = new Product();
$id = "";
$protypes = new Protype();
    //var_dump($_SESSION['cart']);
    if(isset($_POST['submitCart'])){
        $id = $_SESSION['id'];
        $quantity = $_POST['quantity'];//2
        foreach($product->getAllProduct() as $value){
            if($value['id'] == $id){
                if(!isset($_SESSION['cart'][$id])){//2 cai 2 ngan
                    $_SESSION['cart'][$id] = array(
                        'id'=>$id,
                        'name'=>$value['name'],
                        'image'=>$value['pro_images'],
                        'description'=>$value['description'],
                        'quantity'=>$quantity,
                        'price'=>$value['price'] * $quantity
                    );
                }
                else{
                    $quantity += $_SESSION['cart'][$id]['quantity'];
                    $price = $quantity * $_SESSION['cart'][$id]['price'] / $_SESSION['cart'][$id]['quantity'];
                    $_SESSION['cart'][$id]['quantity'] = $quantity;
                    $_SESSION['cart'][$id]['price'] = $price;
                }
            }
        }
        header('location:detail.php?id='.$id.'');
    }
    else  if(isset($_GET['id'])){
        $id = $_GET['id'];
           
            foreach($product->getAllProduct() as $value){
                if($value['id'] == $id){
                    if(!isset($_SESSION['cart'][$id])){//1 cai 1 ngan
                        $quantity =  1;//1
                        $_SESSION['cart'][$id] = array(
                            'id'=>$id,
                            'name'=>$value['name'],
                            'image'=>$value['pro_images'],
                            'description'=>$value['description'],
                            'quantity'=>$quantity,
                            'price'=>$value['price'] * $quantity
                        );
                    }
                    else{
                        //quantity++ = 2;price = quantity*price*
                        $quantity =  $_SESSION['cart'][$id]['quantity'];//2 quantity da tang.
                        $_SESSION['cart'][$id]['quantity']++;
                         $price = $_SESSION['cart'][$id]['quantity'] * $_SESSION['cart'][$id]['price'] / $quantity;
                       
                        $_SESSION['cart'][$id]['price'] = $price;
                    }
             }
         }
         header('location:index.php');
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
                            <li class="dropdown"><a href="index.html">Products<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="?type_id=1">Điện Thoại</a></li>
                                    <li><a href="?type_id=2">LapTop</a></li>
                                    <li><a href="?type_id=3">Loa</a></li>
                                    <li><a href="?type_id=4">Bàn Phím</a></li>
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
                            <form action="result.html" method="get">
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
        <section id="cart_items">
            <div class="container">
                <h3>Your shopping cart</h3>
                <div class="table-responsive cart_info">
                    <table  style="width:100%" class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description">Name</td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td>Delete</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $total = 0;
                                    if(isset($_SESSION['cart'])){
                                        foreach($_SESSION['cart'] as $value){
                                            $total += $value['price'];
                                ?>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img style="width: 250px;height:250px;" src="images/<?php echo $value['image'] ?>" alt=""
                                            width=110></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h4>
                                </td>
                                <td class="cart_price">
                                    <p><?php echo number_format($value['price']) ?> VND</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href="changeQuantity.php?truQuantity=<?php echo $value['id'] ?>"> - </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $value['quantity'] ?>"
                                            autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href="changeQuantity.php?congQuantity=<?php echo $value['id'] ?>"> + </a>
                                    </div>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="deleteCart.php?id=<?php echo $value['id'] ?>"><i
                                            class="fa fa-times"></i></a>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"></p>
                                </td>
                                    </tr>
                                    <?php }}?>
                           
                        </tbody>
                    </table>
                    <table  class="table table-condensed" style="width:100%">
                        <tr>
                            <td><h3>Total</h3></td>
                        </tr>
                        <tr>
                            <?php if(isset($total)){ ?>
                                <td style="text-align:center" class="cart_menu"><h3><?php echo number_format($total) ?></h3></td>
                                    <?php }?>
                        </tr>
                    </table>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post"
                        action="?order=ordered">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" placeholder="Phone number">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" class="form-control" rows="3"
                                placeholder="Your Message Here"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <a class="btn btn-default update" href="index.php">Continue Buying</a>
                            <a class="btn btn-default check_out" href="#">Delete All</a>
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Order">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--/#cart_items-->
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
                    <p class="pull-right">Designed by <span><a target="_blank"
                                href="http://www.themeum.com">Themeum</a></span></p>
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
</body>

</html>