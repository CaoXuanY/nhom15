<?php
    require_once "config.php";
    require_once "models/db.php";
    require_once "models/product.php";
    require_once "models/manufacture.php";
    require_once "models/protype.php";
    require_once "models/user.php";
    $user = new User;
    
    if(isset($_GET['user_id']) == TRUE) {
        User::deleteUserByID($_GET['user_id']);
    }
    header("Location: users.php");
?>