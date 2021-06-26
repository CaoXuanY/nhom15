<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
$protype = new Protype;
?>
<?php
    $insertResult = -1;
    if(isset($_GET['type_name']) == TRUE) {
        $insertResult = Protype::insertProtype($_GET['type_name']);
        mkdir("../images/list-of-products/" . $_GET['type_name'], 0700);
        if(count(Manufacture::insertManufacturer($_GET['manu_name'])) == 0) {
            Manufacture::insertManufacturer($_GET['manu_name']);
            $insertResult = 1;
        }
        else {
            $insertResult = 0;
        }
        
    }
    header("Location: form.php?functionType=protypes&insertResult=$insertResult");
?>