<?php
    session_start();
class Db
{
    public static $connection;
    public function __construct()
    {
        $flag = false;
        //Dùng từ khóa self vì có từ khóa static.
        if (!self::$connection) {
            self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, PORT);
            self::$connection->set_charset(DB_CHARSET);
            if(isset($_SESSION['username'])){
                $flag = true;
            }
            else{
                header('location:../login/index.php');
            }

        }
        return self::$connection;
    }
}
?>