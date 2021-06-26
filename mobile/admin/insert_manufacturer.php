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
       //Kiểm tra xem có còn manu đó hay không, nếu còn thì không được sửa
        if(count(Manufacture::insertManufacturer($_GET['manu_name'])) == 0) {
            Manufacture::insertManufacturer($_GET['manu_name']);
            $insertResult = 1;
        }
        else {
            $insertResult = 0;
        }
    }
    header("Location: form.php?functionType=manufacturer&insertResult=$insertResult");
?>