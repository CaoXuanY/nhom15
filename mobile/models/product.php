<?php
class Product extends Db{
    //Viet phuong thuc lay ra tat ca san pham noi bat
    function getAllFeatureProducts(){
        $sql = self::$connection->prepare("SELECT * FROM product
        WHERE feature = 1 
        ORDER BY id DESC");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    
    //Viet phuong thuc lay ra 3 sp moi nhat
    function getTop3FeatureProducts(){
        $sql = self::$connection->prepare("SELECT * FROM product
        WHERE feature = 1 
        ORDER BY id DESC");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function getProducteByID($id){
        $sql = self::$connection->prepare("SELECT * FROM product pr, manufactures mn WHERE id = $id AND pr.manu_id = mn.manu_id  ");
        //$sql->bind_param("i",$id);//kiem tra id co phai la int hay khong
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    
    //viết phương thức products hiển thị các sản phẩm
    function getAllManuOrType(){
        $sql = self::$connection->prepare("SELECT * FROM product pr, protypes pro, manufactures manu WHERE  pr.type_id = pro.type_id AND pr.manu_id = manu.manu_id ");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //phương thức tìm kiếm sản phẩm
     function getResult($key){
        $sql = self::$connection->prepare("SELECT * FROM `product` WHERE name LIKE '%$key%'");
        
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function getAllProduct(){
        $sql = self::$connection->prepare("SELECT * FROM product ");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Viet phuong thuc lay ra tat ca san pham noi bat
    function getFeatureProducts($page, $perPage){
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM product
         WHERE feature = 1 
         ORDER BY id DESC
         LiMIT $firstLink, $perPage");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //phân trang
    function paginate($url, $total,$page , $perPage){
        $totalLinks = ceil($total/ $perPage);
        $link="";
        for($j =1; $j < $totalLinks; $j++){
            $link = $link."<a href = '$url?page=$j'> $j</a>";
        }
        return $link;
    }

}