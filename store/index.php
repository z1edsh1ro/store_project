<?php
error_reporting(0);
session_start();
$u_id=$_SESSION['u_id'];
if(isset($_GET['controller'])&&isset($_GET['action'])){
    $controller=$_GET['controller'];
    $action=$_GET['action'];
}
else{
    $controller='STORE';
    $action='index_STORE';
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php require_once("routes.php");?>
<nav class="navbar navbar-expand-sm navbar-light bg-warning fixed-top">
    <div class="container-fluid">
        <ul class="navbar-nav d-flex">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link me-4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-reorder" style="color:black;"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?controller=STORE&action=type&id=1">Notebook</a></li>
                    <li><a class="dropdown-item" href="?controller=STORE&action=type&id=2">Smartphone</a></li>
                    <li><a class="dropdown-item" href="?controller=STORE&action=type&id=3">Tablet</a></li>
                    <li><a class="dropdown-item" href="?controller=STORE&action=type&id=4">Accessories</a></li>
                </ul>
            </li>
            <a href="?controller=STORE&action=index_STORE" class="navbar-brand"><img src="views/img/HOME.png" alt="HOME" style="width:80px;height:80px;"></a>
        </ul>
        <div class="navbar-nav">
        <form class="d-flex" method="get">
            <input type="hidden"name="controller"value="STORE"/>
            <input class="form-control form-control-lg me-2 mt-3" name="search" type="search" placeholder="ค้นหาสินค้าที่ต้องการที่นี่" aria-label="Search">
            <button class="btn btn-outline-success mt-3 px-3" type="submit" name="action"value="search"><i class="fa fa-search"></i></button>
        </form>
        </div>
        <ul class="navbar-nav d-flex">
            <?php
            if(!$_SESSION['auth']){
            ?>
            <a href="views/login.php" class="nav-link me-4"><i class="fa fa-user-o"></i> เข้าสู่ระบบ</a>
            <?php
            }
            else{
            ?>
            <a href="?controller=STORE&action=user&u_id=<?php echo $u_id ?>" class="nav-link me-4"><i class="fa fa-user-o"></i> บัญชีของฉัน</a>
            <?php
            }
            ?>
            <a href="?controller=STORE&action=cart&u_id=<?php echo $u_id ?>" class="nav-link me-4"><i class="fa fa-shopping-cart"></i></a>
        </ul>
    </div>
</nav>
</body>
</html>