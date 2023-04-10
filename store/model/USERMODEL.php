<?php
class USER{
    public $id;
    public $email;
    public $address;
    public function __construct($id,$email,$address){
        $this->id=$id;
        $this->email=$email;
        $this->address=$address;
    }
    public static function get($u_id){
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM user WHERE u_id='$u_id'");
        while($my_row=$result->fetch_assoc()){
            $id=$my_row['u_id'];
            $email=$my_row['u_email'];
            $address=$my_row['u_address'];
            require("connection_close.php");
            return new USER($id,$email,$address);
        } 
    }
}
?>