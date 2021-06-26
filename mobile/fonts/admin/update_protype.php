<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
$protype = new Protype;
?>
<?php
    $updateResult = -1;
    if(isset($_GET['type_name']) == TRUE) {
        $updateResult = Protype::updateProtype($_GET['type_id'], $_GET['type_name']);
    }
    header("Location: protypes.php?functionType=protypes&type_id=" .$_GET['type_id'] ."&updateResult=$updateResult");
?>