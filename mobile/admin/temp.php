
                            <!-- UPLOAD FILE: -->
                            <div style="text-align:center;color:green;">
                                <?php
                                    $validFile = FALSE;
                                    if(isset($_POST['submit']) == TRUE) {
                                        $validFile = TRUE;
                                        $file = $_FILES['fileUpload'];
                                        $target_dir = "uploads/";
                                        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);

                                        // $fileName = $_FILES['fileUpload']['name'];
                                        // $fileTmpName = $_FILES['fileUpload']['tmp_name'];
                                        // $fileSize = $_FILES['fileUpload']['size'];
                                        // $fileError = $_FILES['fileUpload']['error'];
                                        // $fileType = $_FILES['fileUpload']['type'];

                                        echo '<div style="font-weight:bold;text-decoration:underline;">FILE NAME: '. $_FILES['fileUpload']['name'] . '</div>';
                                        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file) == TRUE) {
                                            echo ("The file ". htmlspecialchars(basename( $_FILES["fileUpload"]["name"])). " has been uploaded.");
                                        }
                                    }
                                ?>
                                <?php
                                    if(isset($_POST['name']) == TRUE && $validFile == TRUE) {
                                        $name = $_POST['name'];
                                        $manu_id = $_POST['manu_id'];
                                        $type_id = $_POST['type_id'];
                                        $price = $_POST['price'];
                                        $pro_image = $_FILES['fileUpload']['name'];
                                        $description = $_POST['description'];
                                        $feature = $_POST['feature'];
                                        $create_at = (new DateTime('now'))->format('Y-m-d H:i:s');
                                        Product::insertProduct($name, $manu_id, $type_id, $price, $pro_image, $description, $feature, $create_at);
                                        copy("uploads/$pro_image", "../images/list-of-products/" . Protype::getTypeName($type_id) . "/$pro_image");
                                        unlink("uploads/$pro_image");
                                    }
                                ?>
                            </div>