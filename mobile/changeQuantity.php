<?php
    session_start();
   // session_destroy();
    if(isset($_GET['congQuantity'])){
        $id = $_GET['congQuantity'];
        $quantity =  $_SESSION['cart'][$id]['quantity'];//2
        $_SESSION['cart'][$id]['quantity']++;//3      //2   = 6
     //   $_SESSION['cart'][$id]['price'] *= $_SESSION['cart'][$id]['quantity'];//3
        $price =  $_SESSION['cart'][$id]['quantity'] *   $_SESSION['cart'][$id]['price'] / $quantity;
        $_SESSION['cart'][$id]['price'] = $price;
    }
    else if(isset($_GET['truQuantity'])){
        $id = $_GET['truQuantity'];
        $quantity =  $_SESSION['cart'][$id]['quantity'];
        $_SESSION['cart'][$id]['quantity']--;
       // $_SESSION['cart'][$id]['price'] *= $_SESSION['cart'][$id]['quantity'];
        $price =  $_SESSION['cart'][$id]['quantity'] *   $_SESSION['cart'][$id]['price'] / $quantity;
        $_SESSION['cart'][$id]['price'] = $price;
    }
     header('location:cart.php');