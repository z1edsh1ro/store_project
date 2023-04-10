<?php
class ADMIN_CONTROLLER{
    public function index(){
        $OrderList=ORDER::getAll();
        $Order_DetailList=ORDER_DETAIL::getAll();
        $StatusList=STATUS::getAll();
        require_once('views/index_admin.php');
    }
    public function update(){
        $o_id=$_GET['o_id'];
        $s_id=$_GET['s_id'];
        ORDER::update_status($o_id,$s_id);
        echo "<script>alert('UPDATE สำเร็จ');</script>";
        ADMIN_CONTROLLER::index();
    }
    public function logout(){
        echo "<script>alert('ออกจากระบบสำเร็จ');</script>";
        header('location:views/login_admin.php');  
    }
}
?>