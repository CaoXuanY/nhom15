<?php
    require '../admin/config.php';
    require_once '../admin/models/db.php';
    require '../admin/models/user.php';
    if(isset($_POST['submitLogin'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $_SESSION['username'] = $username;
        $user = new User();
        if(count($user->loginAdmin($username,$password)) > 0){
            header('location:../admin/index.php');
        }
        else{
            header('location:index.php?Invalid=Sai tài khoản hoặc mật khẩu');
        }
    }
    else{
        header('location:index.php');
    }


?>