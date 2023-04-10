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
    font-size:25px;
    padding:0 0 20px 0;
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
    margin:30px 0;
}
input[type="submit"]:hover{
    border-color:#FFC300;
    transition:.5s;
}
</style>
</head>
<body>
<div class="center">
    <h1>สมัครสมาชิก</h1>
    <form method="POST">
        <div class="text">
            <input type="text" name="u_id" placeholder="ชื่อผู้ใช้">
        </div>
        <div class="text">
            <input type="text" name="u_email" placeholder="อีเมล">
        </div>
        <div class="text">
            <input type="text" name="u_address" placeholder="ที่อยู่">
        </div>
        <div class="text">
            <input type="password" name="u_pass" placeholder="รหัสผ่าน">
        </div>
        <input type="submit" name="submit" value="สมัครสมาชิก">
    </form>
</div>
</body>
</html>
<?php
if(isset($_POST["submit"])) {
    require("../connection_connect.php");
    error_reporting(0);
    $u_id=$_POST['u_id'];
    $u_email=$_POST['u_email'];
    $u_address=$_POST['u_address'];
    $u_pass=$_POST['u_pass'];
    $result=$conn->query("SELECT * FROM user WHERE u_id='$u_id' and u_pass='$u_pass'"); 
    if($u_id==NULL or $u_pass==NULL){
        echo "<script>alert('โปรดกรอกข้อมูลให้ครบ');</script>";
    }
    else if(mysqli_num_rows($result)==1){
        echo "<script>alert('ชื่อผู้ใช้และรหัสผ่านถูกใช้งานแล้ว');</script>";
    }
    else{
        $result=$conn->query("INSERT INTO user (u_id,u_email,u_address,u_pass) VALUES ('$u_id','$u_email','$u_address','$u_pass');");
        require("../connection_close.php");
        header('location:../index.php');
    }
}
?>
