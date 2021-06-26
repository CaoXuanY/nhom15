<?php
    require_once "config.php";
    require_once "models/db.php";
    require_once "models/product.php";
    require_once "models/manufacture.php";
    require_once "models/protype.php";
    $product = new Product;
    
    if(isset($_GET['id']) == TRUE) {
        //Kiểm tra và xóa sản phẩm  
            Product::deleteProductByID($_GET['id']);
            $deleteResult = 1;
    }
    header("Location: index.php?deleteResult=$deleteResult");
?>