<?php
class STATUS{
    public $s_id;
    public $s_name;
    public function __construct($s_id,$s_name){
        $this->s_id=$s_id;
        $this->s_name=$s_name;
    }
    public static function getAll(){
        require("connection_connect.php");
        $result=$conn->query("SELECT * FROM `status`");
        while($my_row=$result->fetch_assoc()){
            $s_id=$my_row['s_id'];
            $s_name=$my_row['s_name'];
            $List[] = new STATUS($s_id,$s_name);
        }
        require("connection_close.php");
        return $List;
    }
}
?>