<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
$manufacturer = new Manufacture;
?>
<?php
    $updateResult = -1;
    if(isset($_GET['manu_name']) == TRUE) {
        $updateResult = Manufacture::updateManufacturer($_GET['manu_id'], $_GET['manu_name']);
    }
    header("Location: manufactures.php?functionType=manufacturers&manu_id=" .$_GET['manu_id'] ."&updateResult=$updateResult");
?>