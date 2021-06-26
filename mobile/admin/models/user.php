<?php
class User extends Db {

    /**
     * LẤY DỮ LIỆU BẢNG users:
     */
    //Lấy danh sách tất cả user:
    static function getAllUsers() {
        $sql = self::$connection->prepare("SELECT * FROM user");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }
    //Lấy danh sách tất cả user và Phân trang:
    static function getAllUsers_andCreatePagination($page, $resultsPerPage) {
        //Tính xem nên bắt đầu hiển thị từ trang có số thứ tự là bao nhiêu:
        $firstLink = ($page - 1) * $resultsPerPage; //(Trang hiện tại - 1) * (Số kết quả hiển thị trên 1 trang).
        //Dùng LIMIT để giới hạn số lượng kết quả được hiển thị trên 1 trang:
        $sql = self::$connection->prepare("SELECT * FROM user LIMIT $firstLink, $resultsPerPage");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }
    function loginAdmin($user,$pass){//Dang nhap
        $role = 0;
        $query = self::$connection->prepare("SELECT * FROM user WHERE BINARY( user_name) = ? AND Binary(pass) = ? AND role_id = ?");
        $query->bind_param("ssi",$user,$pass,$role);
        $query->execute();
        $items = array();
        $items = $query->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array.
    }


    /**
     * XÓA User THEO user_id:
     */
    static function deleteUserByID($user_id) {
        $sql = self::$connection->prepare("DELETE FROM user WHERE user_id = ?");
        $sql->bind_param("i", $user_id);
        $sql->execute();
    }
      /**
     * SỬA user:
     */
    static function updateUser($user_id, $user_name, $pass, $role_id) {
        $sql = self::$connection->prepare("UPDATE user SET user_name='$user_name', pass = '$pass', role_id ='$role_id' WHERE user_id=$user_id");
        return $sql->execute();
    }



    /**
     * PAGINATE: ĐÁNH SỐ TRANG, TẠO LINK TỚI CÁC TRANG.
     */
    static function paginate($url, $page, $totalResults, $resultsPerPage, $offset) {
        $totalLinks = ceil(floatval($totalResults)/floatval($resultsPerPage));
        $links = "";

        $from = $page - $offset;
        $to = $page + $offset;
        if($from <= 0) {
            $from = 1;
            $to = $offset * 2;
        }
        if($to > $totalLinks) {
            $to = $totalLinks;
        }

        $firstLink = "";
        $lastLink = "";
        $prevLink = "";
        $nextLink = "";
        // Trường hợp để xuất hiện $firstLink, $lastLink, $prevLink, $nextLink:
        if($page > 1) {
            $prev = $page - 1;
            $prevLink = "<a style=\"padding:10px;\" href='$url" . "page=$prev'>< Previous</a>";
            $firstLink = "<a style=\"padding:10px;\" href='$url" . "page=1'><< First</a>";
        }
        if($page < $totalLinks) {
            $next = $page + 1;
            $nextLink = "<a style=\"padding:10px;\" href='$url" . "page=$next'>Next ></a>";
            $lastLink = "<a style=\"padding:10px;\" href='$url" . "page=$totalLinks'>Last >></a>";
        }
        // $links:
        for($i=$from; $i<=$to; $i++) {
            if($page == $i) {
                $links = $links . "<a style=\"padding:10px;text-decoration:underline;color:red;font-weight:bold;\" href='$url" . "page=$i'>$i</a>";
            }
            else
            {
                $links = $links . "<a style=\"padding:10px;\" href='$url" . "page=$i'>$i</a>";
            }
        }
        return $firstLink . $prevLink . $links . $nextLink . $lastLink;
    }
}