<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{
    margin:0;
    padding:0;
    font-family:sans-serif;
    height:100vh;
    background:#ffcc26;
    overflow:hidden;
}
.center{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    width:400px;
    background:white;
    border-radius:10px
}
.center h1{
    text-align:center;
    font-size:20px;
    padding:0 0 20px 0;
}
.center img{
    margin:5px 0 0px 40%;
}
.center form{
    padding:0 40px;
    box-sizing:border-box;
}
form .text{
    position:relative;
    border-bottom:2px solid #adadad;
    margin:30px 0;
}
.text input{
    width:100%;
    height:40px;
    padding:0 5px;
    font-size:16px;
    border:none;
    background:none;
    outline:none;
}
.text label{
    position:absolute;
    top:50%;
    left:5px;
    color:#adadad;
    transform:translateY(-50%);
    font-size:16px;
    pointer-events:none;
}
input[type="submit"]{
    width:100%;
    height:50px;
    border:1px solid;
    background:#ffda61;
    border-radius:25px;
    font-size:18px;
    color:white;
    font-weight:700;
    cursor: pointer;
    outline:none;
}
input[type="submit"]:hover{
    border-color:#FFC300;
    transition:.5s;
}
.signup{
    margin:30px 0;
    text-align:center;
    font-size:16px;
    color:#666666;
}
.signup a{
    color:#2691d9;
    text-decoration:none;
}
.signup a:hover{
    text-decoration:underline;
}
footer {
    text-align: left;
    padding: 3px;
    position: fixed;
    bottom: 0;
    width: 100%;
    
}
</style>
</head>
<body>
<div class="center">
    <img src="img/HOME.png" alt="HOME" style="width:80px;height:80px;">
    <h1>เข้าสู่ระบบ</h1>
    <form method="POST">
        <div class="text">
            <input type="text" name="u_id" placeholder="ชื่อผู้ใช้">
        </div>
        <div class="text">
            <input type="password" name="u_pass" placeholder="รหัสผ่าน">
        </div>
        <input type="submit" name="submit" value="เข้าสู่ระบบ">
        <div class="signup">
        ยังไม่มีบัญชีผู้ใช้? <a href="register.php">สมัครสมาชิกใหม่</a>
        </div>
    </form> 
</div>
</body>
<footer>
<a href="login_admin.php" style="text-decoration: none;color:black">ADMIN</a>
</footer>
</html>
<?php
if(isset($_POST["submit"])) {
    require("../connection_connect.php");
    error_reporting(0);
    $u_id=$_POST['u_id'];
    $u_pass=$_POST['u_pass'];
    $result=$conn->query("SELECT * FROM user WHERE u_id='$u_id' and u_pass='$u_pass'"); 
    if(mysqli_num_rows($result)==1){
        session_start();
        $_SESSION['auth']='true';
        $_SESSION['u_id']=$u_id;
        require("../connection_close.php");
        header('location:../index.php');
    }
    else if($u_id==NULL or $u_pass==NULL){
        echo "<script>alert('โปรดกรอกข้อมูลให้ครบ');</script>";
    }
    else if(mysqli_num_rows($result)==0 and $u_id!=NULL and $u_pass!=NULL){
        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
    }
}
?>