<?php
class PRODUCT{
    public $id;
    public $name;
    public $img;
    public $detail;
    public $price;
    public function __construct($id,$name,$img,$detail,$price){
        $this->id=$id;
        $this->name=$name;
        $this->img=$img;
        $this->detail=$detail;
        $this->price=$price;
    }
    public static function best_seller(){
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM product ORDER BY p_rating DESC");
        while($my_row=$result->fetch_assoc()){
            $id=$my_row['p_id'];
            $name=$my_row['p_name'];
            $img=$my_row['p_img'];
            $detail=$my_row['p_detail'];
            $price=$my_row['p_price'];
            $List[] = new PRODUCT($id,$name,$img,$detail,$price);
        }
        require("connection_close.php");
        return $List;
    }
    public static function getProduct($id){
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM product WHERE p_id='$id'");
        while($my_row=$result->fetch_assoc()){
            $id=$my_row['p_id'];
            $name=$my_row['p_name'];
            $img=$my_row['p_img'];
            $detail=$my_row['p_detail'];
            $price=$my_row['p_price'];
            require ("connection_close.php");
            return new PRODUCT($id,$name,$img,$detail,$price);
        }
    }
    public static function getType($id){
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM product WHERE t_id='$id'");
        while($my_row=$result->fetch_assoc()){
            $id=$my_row['p_id'];
            $name=$my_row['p_name'];
            $img=$my_row['p_img'];
            $detail=$my_row['p_detail'];
            $price=$my_row['p_price'];
            $List[] = new PRODUCT($id,$name,$img,$detail,$price);
        }
        require("connection_close.php");
        return $List;
    }
    public static function search($key){  
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM product WHERE p_name LIKE '%$key%'");
        while($my_row=$result->fetch_assoc()){
            $id=$my_row['p_id'];
            $name=$my_row['p_name'];
            $img=$my_row['p_img'];
            $detail=$my_row['p_detail'];
            $price=$my_row['p_price'];
            $List[] = new PRODUCT($id,$name,$img,$detail,$price);
        }
        require("connection_close.php");
        return $List;
     }
}
?>