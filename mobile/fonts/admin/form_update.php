<!DOCTYPE html>
<html lang="en">
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
<head>
    <title>Mobile Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../images/logo.png" type="image/icon type">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style type="text/css">
        ul.pagination {
            list-style: none;
            float: right;
        }

        ul.pagination li.active {
            font-weight: bold
        }

        ul.pagination li {
            /* float: left; */
            display: inline-block;
            padding: 10px
        }
    </style>
</head>

<body>
    <!--Header-part-->
    <div id="header">
        <h1><a href="index.php"><img src="../images/logo.png" alt=""></a></h1>
    </div>
    <!--close-Header-part-->
    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown"
                    data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span
                        class="text">Welcome Super Admin</span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
            <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages"
                    class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span
                        class="label label-important">5</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
                    <li class="divider"></li>
                    <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
                    <li class="divider"></li>
                    <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
                    <li class="divider"></li>
                    <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
                </ul>
            </li>
            <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
            <li class=""><a title="" href="#"><i class="icon icon-share-alt"></i> <span
                        class="text">Logout</span></a></li>
        </ul>
    </div>
    <!--start-top-serch-->
    <div id="search">
        <input type="text" placeholder="Search here..." />
        <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
    </div>
    <!--close-top-serch-->
    <!--sidebar-menu-->
    <div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
        <ul>
            <li><a href="index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
            <li> <a href="manufactures.php"><i class="icon icon-th-list"></i> <span>Manufactures</span></a></li>
            <li> <a href="protypes.php"><i class="icon icon-th-list"></i> <span>Product type</span></a></li>
            <li> <a href="users.php"><i class="icon icon-th-list"></i> <span>Users</span></a></li>

        </ul>
    </div><!-- BEGIN CONTENT -->
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i>
                    Home</a></div>
            <h1>Add New Product</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Product info</h5>
                        </div>
                        <div class="widget-content nopadding">


                        <!--  -->
                        <!-- FUNCTION: Update products. -->
                        <?php
                            if(isset($_GET['functionType']) == TRUE && $_GET['functionType']=="products" && isset($_GET['id'])==TRUE) {
                                $selectedProduct = Product::getProduct_ByID($_GET['id']);
                        ?>
                            <!-- BEGIN USER FORM -->
                            <form action="update_product.php" method="post" class="form-horizontal"
                                enctype="multipart/form-data">
                                <div class="control-group">
                                    <label class="control-label">ID :</label>
                                    <div class="controls">
                                    <input type="text" name="id" value="<?php echo $selectedProduct['id']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Product name" name="name" value="<?php echo $selectedProduct['name']; ?>" required /> *
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Choose a manufacture:</label>
                                    <div class="controls">
                                        <?php
                                            $list_of_manufacturers = Manufacture::getAllManufacturers();
                                        ?>
                                        <select name="manu_id" id="cate">
                                            <?php
                                                foreach($list_of_manufacturers as $key => $value) {
                                            ?>
                                            <option value="<?php echo $value['manu_id']; ?>" <?php if($selectedProduct['manu_id']==$value['manu_id']) { echo "selected"; } ?>>
                                                <?php echo $value['manu_name']; ?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select> *
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Choose a product type:</label>
                                    <div class="controls">
                                        <?php
                                            $list_of_protypes = Protype::getAllProtypes();
                                        ?>
                                        <select name="type_id" id="subcate">
                                            <?php
                                                foreach($list_of_protypes as $key => $value) {
                                            ?>
                                            <option value="<?php echo $value['type_id']; ?>" <?php if($selectedProduct['type_id']==$value['type_id']) { echo "selected"; } ?>>
                                                <?php echo $value['type_name']; ?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select> *
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Current image :</label>
                                        <div class="controls" style="width:25%;height:auto;">
                                            <img
                                                src="../images/<?php echo $selectedProduct['type_id'] . "/" . $selectedProduct['pro_images']; ?>"
                                                alt="" />
                                            <input type="text" name="fileName" id="fileName" value="<?php echo $selectedProduct['pro_images']; ?>" readonly style="font-style:italic;">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Change image :</label>
                                        <div class="controls">
                                            <input type="file" name="fileUpload" id="fileUpload">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Description</label>
                                        <div class="controls">
                                            <textarea class="span11" placeholder="Description" name="description"><?php echo $selectedProduct['description']; ?></textarea>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Price :</label>
                                            <div class="controls">
                                                <input type="text" class="span11" placeholder="price" name="price" value="<?php echo $selectedProduct['price']; ?>" required /> *
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Feature :</label>
                                            <div class="controls">
                                                <input type="number" class="span11" name="feature" min="0" max="1" value="<?php echo $selectedProduct['feature']; ?>" required /> *
                                            </div>
                                        </div>
                                        <div class="form-actions" style="text-align:center;">
                                            <button type="submit" name="submit" class="btn btn-success" style="padding:5px 50px;">Update</button>
                                        </div>
                                    </div>
                            </form>
                            <!-- INSERT RESULT: -->
                            <div style="padding:30px 0;text-align:center;font-weight:bold;font-size:15px;">
                                <?php
                                    echo "<div style=\"text-decoration:underline;\">RESULT:</div>";
                                    if(isset($_GET['updateResult']) == TRUE) {
                                        if($_GET['updateResult'] > 0) {
                                            echo "<span style=\"color:green;\">" . "Updated sản phẩm thành công!" . "</span>";
                                        }
                                        else {
                                            echo "<span style=\"color:red;\">" . "Update sản phẩm thất bạis!" . "</span>";
                                        }
                                    }
                                ?>
                            </div>
                            <!-- END USER FORM -->
                        <?php
                            }
                        ?>



                        <!--  -->
                        <!-- FUNCTION: Update manufacturers. -->
                        <?php
                            if(isset($_GET['functionType']) == TRUE && $_GET['functionType']=="manufacturers" && isset($_GET['manu_id'])==TRUE) {
                                $selectedManu = ($_GET['manu_id']);
                        ?>
                        <!-- BEGIN USER FORM -->
                        <form action="update_manufacturer.php" method="get" class="form-horizontal"
                            enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Manu ID :</label>
                                <div class="controls">
                                <input type="text" name="manu_id" value="<?php echo $_GET['manu_id']; ?>" readonly>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Manufacturer name:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Manufacturer name" name="manu_name" required value="<?php echo $selectedManu; ?>" /> *
                                </div>
                                <div class="form-actions" style="text-align:center;">
                                    <button type="submit" name="submit" class="btn btn-success" style="padding:5px 50px;">Update</button>
                                </div>
                            </div>
                        </form>
                        <!-- INSERT RESULT: -->
                        <!-- <div style="padding:30px 0;text-align:center;font-weight:bold;font-size:15px;">
                            <?php
                                echo "<div style=\"text-decoration:underline;\">RESULT:</div>";
                                if(isset($_GET['updateResult']) == TRUE) {
                                    if($_GET['updateResult'] > 0) {
                                        echo "<span style=\"color:green;\">" . "Updated hãng thành công!" . "</span>";
                                    }
                                    else {
                                        echo "<span style=\"color:red;\">" . "Updte hãng thất bại!" . "</span>";
                                    }
                                }
                            ?>
                        </div> -->
                        <!-- END USER FORM -->
                        <?php
                            }
                        ?>



                       <!--  -->
                        <!-- FUNCTION: Update protype . -->
                        <?php
                            if(isset($_GET['functionType']) == TRUE && $_GET['functionType']=="protypes" && isset($_GET['type_id'])==TRUE) {
                                $selectedProtype = ($_GET['type_id']);
                        ?>
                        <!-- BEGIN USER FORM -->
                        <form action="update_protype.php" method="get" class="form-horizontal"
                            enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Type ID :</label>
                                <div class="controls">
                                <input type="text" name="type_id" value="<?php echo $_GET['type_id']; ?>" readonly>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product type:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Product type" name="type_name" value="<?php echo $selectedProtype; ?>" required /> *
                                </div>
                                <div class="form-actions" style="text-align:center;">
                                    <button type="submit" name="submit" class="btn btn-success" style="padding:5px 50px;">Update</button>
                                </div>
                            </div>
                        </form>
                        <!-- INSERT RESULT: -->
                        <!-- <div style="padding:30px 0;text-align:center;font-weight:bold;font-size:15px;">
                            <?php
                                echo "<div style=\"text-decoration:underline;\">RESULT:</div>";
                                if(isset($_GET['updateResult']) == TRUE) {
                                    if($_GET['updateResult'] > 0) {
                                        echo "<span style=\"color:green;\">" . "Updated thành công!" . "</span>";
                                    }
                                    else {
                                    echo "<span style=\"color:red;\">" . "Update không thành công!" . "</span>";
                                    }
                                }
                            ?>
                        </div> -->
                        <!-- END USER FORM -->
                        <?php
                            }
                        ?>


                         <!-- Form User -->
                        <!-- FUNCTION: Update user . -->
                        <?php
                            if(isset($_GET['functionUser']) == TRUE && $_GET['functionUser']=="user" && isset($_GET['user_id'])==TRUE) {
                                $selectedUser = ($_GET['user_id']);
                        ?>
                        <!-- BEGIN USER FORM -->
                        <form action="update_user.php" method="get" class="form-horizontal"
                            enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">User ID :</label>
                                <div class="controls">
                                <input type="text" name="user_id" value="<?php echo $_GET['user_id']; ?>" readonly>
                            </div>
                            <div class="control-group">
                                <label class="control-label">User name:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="User" name="user_name" value="<?php echo $selectedUser; ?>" required /> *
                                </div>
                                <div class="control-group">
                                <label class="control-label">Password:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="User" name="pass" value="<?php echo $selectedUser; ?>" required /> *
                                </div>
                                <div class="control-group">
                                <label class="control-label">Role id:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="User" name="role_id" value="<?php echo $selectedUser; ?>" required /> *
                                </div>
                                <div class="form-actions" style="text-align:center;">
                                    <button type="submit" name="submit" class="btn btn-success" style="padding:5px 50px;">Update</button>
                                </div>
                            </div>
                        </form>
                      
                        <!-- END USER FORM -->
                        <?php
                            }
                        ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
    <!--Footer-part-->
    <div class="row-fluid">
        <div id="footer" class="span12"> 2017 &copy; TDC - Lập trình web 1</div>
    </div>
    <!--end-Footer-part-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.ui.custom.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.uniform.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/matrix.js"></script>
    <script src="js/matrix.tables.js"></script>
</body>

</html>