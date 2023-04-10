<?php
class ORDER{
    public $o_id;
    public $u_id;
    public $s_name;
    public $o_rating;
    public function __construct($o_id,$u_id,$s_name,$o_rating){
        $this->o_id=$o_id;
        $this->u_id=$u_id;
        $this->s_name=$s_name;
        $this->o_rating=$o_rating;
    }
    public static function getAll(){
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM `order` NATURAL JOIN `status`");
        while($my_row=$result->fetch_assoc()){
            $o_id=$my_row['o_id'];
            $u_id=$my_row['u_id'];
            $s_name=$my_row['s_name'];
            $o_rating=$my_row['o_rating'];
            $List[] = new ORDER($o_id,$u_id,$s_name,$o_rating);
        }
        require("connection_close.php");
        return $List;
    }
    public static function getAll_User($u_id){
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM `order` NATURAL JOIN `status` WHERE u_id='$u_id'");
        while($my_row=$result->fetch_assoc()){
            $o_id=$my_row['o_id'];
            $u_id=$my_row['u_id'];
            $s_name=$my_row['s_name'];
            $o_rating=$my_row['o_rating'];
            $List[] = new ORDER($o_id,$u_id,$s_name,$o_rating);
        }
        require("connection_close.php");
        return $List;
    }
    public static function get1($u_id,$s_id){
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM `order` NATURAL JOIN `status` WHERE u_id='$u_id' AND s_id='$s_id'");
        while($my_row=$result->fetch_assoc()){
            $o_id=$my_row['o_id'];
            $u_id=$my_row['u_id'];
            $s_name=$my_row['s_name'];
            $o_rating=$my_row['o_rating'];
            $List[] = new ORDER($o_id,$u_id,$s_name,$o_rating);
        }
        require("connection_close.php");
        return $List;
    }
    public static function get2($u_id,$s1_id,$s2_id){
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM `order` NATURAL JOIN `status` WHERE u_id='$u_id' AND s_id='$s1_id' OR s_id='$s2_id'");
        while($my_row=$result->fetch_assoc()){
            $o_id=$my_row['o_id'];
            $u_id=$my_row['u_id'];
            $s_name=$my_row['s_name'];
            $o_rating=$my_row['o_rating'];
            $List[] = new ORDER($o_id,$u_id,$s_name,$o_rating);
        }
        require("connection_close.php");
        return $List;
    }
    public static function new_order($u_id){
        require("connection_connect.php");
        $result = $conn->query("INSERT INTO `order` (`o_id`, `u_id`, `s_id`, `o_rating`) VALUES (NULL, '$u_id', '1',NULL);");
        $last_id = $conn->insert_id;
        require ("connection_close.php");
        return $last_id;
    }
    public static function count($u_id,$s_id){
        require("connection_connect.php");
        $result=$conn->query("SELECT COUNT(*) FROM `order` WHERE u_id='$u_id' AND s_id='$s_id';");
        while($my_row=$result->fetch_assoc()){
            $count=$my_row['COUNT(*)'];
        }
        require ("connection_close.php");
        return $count;
    }
    public static function update_status($o_id,$s_id){
        require("connection_connect.php");
        $result=$conn->query("UPDATE `order` SET s_id='$s_id' WHERE o_id='$o_id'");
        require ("connection_close.php");
    }
    public static function update_rating($o_id,$o_rating){
        require("connection_connect.php");
        $result=$conn->query("UPDATE `order` SET s_id='7',o_rating='$o_rating' WHERE o_id='$o_id'");
        require ("connection_close.php");
    }
}
?>