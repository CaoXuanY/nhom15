
<?php
    require './models/db.php';
    require './models/product.php';
    require './models/protype.php';
    require './models/manufacture.php';
    $product = new Product();
    // $protypes = new Protype;
    $protypes = new Protype();
    $manufacture = new manufacture();
    // var_dump($protypes);
    // var_dump($product->getAllFeatureProducts());
    //getAllManuOrType()
    if(isset($_GET['key'])){
        $key = $_GET['key'];
        header('location:result?key='.$key.'');
        
    }

?>