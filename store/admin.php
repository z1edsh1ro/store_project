<?php
error_reporting(0);
if(isset($_GET['controller'])&&isset($_GET['action'])){
    $controller=$_GET['controller'];
    $action=$_GET['action'];
}
else{
    $controller='ADMIN';
    $action='index';
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
<nav class="navbar navbar-expand-sm navbar-light bg-danger fixed-top">
    <div class="container-fluid">
        <ul class="navbar-nav d-flex">
            <a href="?controller=ADMIN&action=index" class="navbar-brand"><img src="views/img/HOME.png" alt="HOME" style="width:80px;height:80px;"></a>
        </ul>
        </div>
        <ul class="navbar-nav d-flex">
            <a href="?controller=ADMIN&action=logout" class="nav-link me-4"><i class="fa fa-sign-out fa-2x"></i></a>
        </ul>
    </div>
</nav>
</body>
</html>