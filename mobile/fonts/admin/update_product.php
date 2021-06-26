<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
$product = new Product;
$manufacturer = new Manufacture;
$protype = new Protype;
?>
<?php
    // Kiểm tra xem người dùng có muốn thay đổi ảnh không:
    $pro_image = $_FILES['fileUpload']['name'];
    $changeImage = TRUE;
    if($pro_image == "") {
        $pro_image = $_POST['fileName'];
        $changeImage = FALSE;
    }

    // Sửa dữ liệu:
    $updateResult = -1;
    if(isset($_POST['id']) == TRUE) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $manu_id = $_POST['manu_id'];
        $type_id = $_POST['type_id'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $feature = $_POST['feature'];
        $create_at = (new DateTime('now'))->format('Y-m-d H:i:s');

        $updateResult = Product::updateProduct($id, $name, $manu_id, $type_id, $price, $pro_image, $description, $feature, $create_at);
    }

    // Nếu sửa thành công, thì upload file:
    if($changeImage = TRUE) {        
        $target_dir = "../images/" . ($_POST['type_id']) . "/";
        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
        echo $target_file;
    }

    header("Location: form_update.php?functionType=products&id=$id&updateResult=$updateResult");
?>