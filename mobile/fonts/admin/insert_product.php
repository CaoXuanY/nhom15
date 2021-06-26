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
    $validFile = FALSE;
    if(isset($_POST['submit']) == TRUE) {
        $validFile = TRUE;
        
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);

        // Dữ liệu file:
        $fileName = $_FILES['fileUpload']['name'];
        $fileTmpName = $_FILES['fileUpload']['tmp_name'];
        $fileSize = $_FILES['fileUpload']['size'];
        $fileError = $_FILES['fileUpload']['error'];
        $fileType = $_FILES['fileUpload']['type'];

        // Upload và Kiểm tra xem file đã upload hay chưa:
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file) == FALSE) {
            $validFile = FALSE;
        }
    }

    // Thêm dữ liệu vào CSDL: Nếu upload được ảnh thì mới insert.
    $insertResult = -1;
    if(isset($_POST['name']) == TRUE && $validFile == TRUE) {
        $name = $_POST['name'];
        $manu_id = $_POST['manu_id'];
        $type_id = $_POST['type_id'];
        $price = $_POST['price'];
        $pro_image = $_FILES['fileUpload']['name'];
        $description = $_POST['description'];
        $feature = $_POST['feature'];
        $create_at = (new DateTime('now'))->format('Y-m-d H:i:s');
        $insertResult = Product::insertProduct($name, $manu_id, $type_id, $price, $pro_image, $description, $feature, $create_at);

        // Chuyển file sang thư mục tương ứng với protype được chọn:
        copy("uploads/$pro_image", "../images/" . Protype::getTypeName($type_id) . "/$pro_image");

        // Xóa file trong thư mục uploads:
        unlink("uploads/$pro_image");
    }

    header("Location: form.php?functionType=products&insertResult=$insertResult");
?>