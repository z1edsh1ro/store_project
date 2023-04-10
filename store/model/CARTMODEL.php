<?php
class CART{
    public $id;
    public $name;
    public $img;
    public $price;
    public $quantity;
    public function __construct($id,$name,$img,$price,$quantity){
        $this->id=$id;
        $this->name=$name;
        $this->img=$img;
        $this->price=$price;
        $this->quantity=$quantity;
    }
    public static function getCart($u_id){
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM cart NATURAL JOIN product NATURAL JOIN user WHERE u_id='$u_id'");
        while($my_row=$result->fetch_assoc()){
            $id=$my_row['p_id'];
            $name=$my_row['p_name'];
            $img=$my_row['p_img'];
            $price=$my_row['p_price'];
            $quantity=$my_row['c_quantity'];
            $List[] = new CART($id,$name,$img,$price,$quantity);
        }
        require("connection_close.php");
        return $List;
    }
    public static function add($id,$name,$quantity){
        require("connection_connect.php");
        $result = $conn->query("INSERT INTO cart (c_id,u_id,p_id,c_quantity) VALUES ('NULL','$name','$id','$quantity');");
        require ("connection_close.php");
        return $result;
    }
    public static function delete($id){
        require("connection_connect.php");
        $result = $conn->query("DELETE from cart WHERE p_id = '$id'");
        require ("connection_close.php");
    }
    public static function deleteAll($id){
        require("connection_connect.php");
        $result = $conn->query("DELETE from cart WHERE u_id = '$id'");
        require ("connection_close.php");
    }

}
?>