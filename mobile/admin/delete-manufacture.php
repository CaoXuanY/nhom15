<?php
    require_once "config.php";
    require_once "models/db.php";
    require_once "models/product.php";
    require_once "models/manufacture.php";
    require_once "models/protype.php";
    $manufacture = new Manufacture;
    
    $deleteResult = "";
    if(isset($_GET['manu_id']) == TRUE) {
        // Kiểm tra xem có còn sản phẩm nào thuộc manufacture đó hay không, nếu còn thì không được xóa.
        if(count(Product::getProducts_ByManuID($_GET['manu_id'])) == 0) {
            Manufacture::deleteManufactureByID($_GET['manu_id']);
            $deleteResult = 1;
        }
        else {
            $deleteResult = 0;
        }
    }
    header("Location: manufactures.php?deleteResult=$deleteResult");
?>