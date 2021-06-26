<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
$manufacturer = new Manufacture;
?>
<?php
    $insertResult = -1;
    if(isset($_GET['manu_name']) == TRUE) {
        $insertResult = Manufacture::insertManufacturer($_GET['manu_name']);
    }
    header("Location: form.php?functionType=manufacturers&insertResult=$insertResult");
?>