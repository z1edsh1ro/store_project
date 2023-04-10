<?php
class STORE_CONTROLLER{
    public function index_STORE(){
        $ProductList=PRODUCT::best_seller();
        require_once('views/Best_Seller.php');
    }
    public function type(){
        $id=$_GET['id'];
        $ProductList=PRODUCT::getType($id);
        require_once('views/index_STORE.php');
    }
    public function search(){
        $id=$_GET['search'];
        $ProductList=PRODUCT::search($id);
        require_once('views/index_STORE.php');
    }
    public function product(){
        $id=$_GET['id'];
        $Product=PRODUCT::getProduct($id);
        require_once('views/product.php');
    }
    public function add(){
        $name=$_SESSION['u_id'];
        $id=$_GET['id'];
        $quantity=$_GET['quantity'];
        if($name==NULL or !$_SESSION['auth']){
            echo "<script>alert('โปรดเข้าสู่ระบบก่อน');</script>";
            STORE_CONTROLLER::index_STORE();
        }
        else{
            CART::add($id,$name,$quantity);
            echo "<script>alert('ใส่ตะกร้าสำเร็จ');</script>";
            $Product=PRODUCT::getProduct($id);
            require_once('views/product.php');
        }
    }
    public function buy(){
        $name=$_SESSION['u_id'];
        $id=$_GET['id'];
        $quantity=$_GET['quantity'];
        if($name==NULL or !$_SESSION['auth']){
            echo "<script>alert('โปรดเข้าสู่ระบบก่อน');</script>";
            STORE_CONTROLLER::index_STORE();
        }
        else{
            CART::add($id,$name,$quantity);
            $CartList=CART::getCart($name);
            require_once('views/cart.php');
        }
    }
    public function cart(){
        $u_id=$_SESSION['u_id'];
        if($u_id==NULL or !$_SESSION['auth']){
            echo "<script>alert('โปรดเข้าสู่ระบบก่อน');</script>";
            STORE_CONTROLLER::index_STORE();
        }
        else{
            $CartList=CART::getCart($u_id);
            require_once('views/cart.php');
        }
    }
    public function delete(){
        $id=$_GET['id'];
        CART::delete($id);
        STORE_CONTROLLER::cart();
    }
    public function order(){
        $id=$_SESSION['u_id'];
        $CartList=CART::getCart($id);
        $last_id=ORDER::new_order($id);
        foreach($CartList as $List){
            ORDER_DETAIL::add($last_id,$List->id,$List->quantity);
        }
        CART::deleteAll($id);
        echo "<script>alert('ดำเนินการสั่งซื้อสำเร็จ');</script>";
        STORE_CONTROLLER::index_STORE();
    }
    public function user(){
        $u_id=$_SESSION['u_id'];
        $User=USER::get($u_id);
        $status1=ORDER::count($u_id,1);
        $status2=ORDER::count($u_id,2);
        $status3=ORDER::count($u_id,3);
        $status4=ORDER::count($u_id,4);
        $status5=ORDER::count($u_id,5);
        $status6=ORDER::count($u_id,6);
        require_once('views/user.php');
    }
    public function history(){
        $u_id=$_SESSION['u_id'];
        $OrderList=ORDER::getAll_User($u_id);
        $Order_DetailList=ORDER_DETAIL::getAll_User($u_id);
        require_once('views/history.php');
    }
    public function pay(){
        $u_id=$_SESSION['u_id'];
        $OrderList=ORDER::get2($u_id,1,2);
        $Order_DetailList=ORDER_DETAIL::get2($u_id,1,2);
        require_once('views/pay.php');
    }
    public function paid(){
        $o_id=$_GET['id'];
        ORDER::update_status($o_id,2);
        echo "<script>alert('ชำระสำเร็จ');</script>";
        STORE_CONTROLLER::pay();
    }
    public function ship(){
        $u_id=$_SESSION['u_id'];
        $OrderList=ORDER::get1($u_id,3);
        $Order_DetailList=ORDER_DETAIL::get1($u_id,3);
        require_once('views/ship.php');
    }
    public function receive(){
        $u_id=$_SESSION['u_id'];
        $OrderList=ORDER::get2($u_id,4,5);
        $Order_DetailList=ORDER_DETAIL::get2($u_id,4,5);
        require_once('views/receive.php');
    }
    public function received(){
        $o_id=$_GET['id'];
        ORDER::update_status($o_id,6);
        echo "<script>alert('ฉันได้ตรวจสอบและยอมรับสินค้าแล้ว');</script>";
        STORE_CONTROLLER::rating();
    }
    public function rating(){
        $u_id=$_SESSION['u_id'];
        $OrderList=ORDER::get1($u_id,6);
        $Order_DetailList=ORDER_DETAIL::get1($u_id,6);
        require_once('views/rating.php');
    }
    public function ratingConfirm(){
        $o_id=$_GET['id'];
        $rating=$_GET['rating'];
        ORDER::update_rating($o_id,$rating);
        echo "<script>alert('ให้คะแนนสำเร็จ');</script>";
        STORE_CONTROLLER::user();
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        echo "<script>alert('ออกจากระบบสำเร็จ');</script>";
        STORE_CONTROLLER::index_STORE();
    }
}
?>