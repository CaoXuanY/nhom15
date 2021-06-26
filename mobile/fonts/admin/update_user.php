<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
require "models/user.php";
$user = new User;
?>
<?php
    $updateResult = -1;
    if(isset($_GET['user_name']) == TRUE) {
        $updateResult = User::updateUser($_GET['user_id'], $_GET['user_name'], $_GET['pass'], $_GET['role_id']);
    }
    header("Location: users.php?functionUser=user&user_id=" .$_GET['user_id'] ."&updateResult=$updateResult");
?>