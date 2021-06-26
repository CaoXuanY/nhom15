<?php
class Add extends Db{
    function getAddCart(){
        $sql = self::$connection->prepare("SELECT * FROM product ORDER BY name ASC");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}