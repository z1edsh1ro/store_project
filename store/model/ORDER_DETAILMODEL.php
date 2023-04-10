<?php
class ORDER_DETAIL{
    public $o_id;
    public $p_name;
    public $price;
    public $quantity;
    public function __construct($o_id,$p_name,$price,$quantity){
        $this->o_id=$o_id;
        $this->p_name=$p_name;
        $this->price=$price;
        $this->quantity=$quantity;
    }
    public static function getAll(){
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM `order` NATURAL JOIN `order_detail` NATURAL JOIN `status` NATURAL JOIN `product`");
        while($my_row=$result->fetch_assoc()){
            $o_id=$my_row['o_id'];
            $p_name=$my_row['p_name'];
            $price=$my_row['p_price'];
            $quantity=$my_row['c_quantity'];
            $List[] = new ORDER_DETAIL($o_id,$p_name,$price,$quantity);
        }
        require("connection_close.php");
        return $List;
    }
    public static function getAll_User($u_id){
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM `order` NATURAL JOIN `order_detail` NATURAL JOIN `status` NATURAL JOIN `product` WHERE u_id='$u_id'");
        while($my_row=$result->fetch_assoc()){
            $o_id=$my_row['o_id'];
            $p_name=$my_row['p_name'];
            $price=$my_row['p_price'];
            $quantity=$my_row['c_quantity'];
            $List[] = new ORDER_DETAIL($o_id,$p_name,$price,$quantity);
        }
        require("connection_close.php");
        return $List;
    }
    public static function get1($u_id,$s_id){
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM `order` NATURAL JOIN `order_detail` NATURAL JOIN `status` NATURAL JOIN `product` WHERE u_id='$u_id' AND s_id='$s_id'");
        while($my_row=$result->fetch_assoc()){
            $o_id=$my_row['o_id'];
            $p_name=$my_row['p_name'];
            $price=$my_row['p_price'];
            $quantity=$my_row['c_quantity'];
            $List[] = new ORDER_DETAIL($o_id,$p_name,$price,$quantity);
        }
        require("connection_close.php");
        return $List;
    }
    public static function get2($u_id,$s1_id,$s2_id){
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM `order` NATURAL JOIN `order_detail` NATURAL JOIN `status` NATURAL JOIN `product` WHERE u_id='$u_id' AND s_id='$s1_id' OR s_id='$s2_id'");
        while($my_row=$result->fetch_assoc()){
            $o_id=$my_row['o_id'];
            $p_name=$my_row['p_name'];
            $price=$my_row['p_price'];
            $quantity=$my_row['c_quantity'];
            $List[] = new ORDER_DETAIL($o_id,$p_name,$price,$quantity);
        }
        require("connection_close.php");
        return $List;
    }
    public static function add($o_id,$p_id,$c_quantity){
        require("connection_connect.php");
        $conn->query("INSERT INTO order_detail (od_id,o_id,p_id,c_quantity) VALUES (NULL,'$o_id','$p_id','$c_quantity');");
        require ("connection_close.php");
    }
}
?>