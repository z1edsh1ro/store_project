<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>  
body{
    margin:0px;
    padding:0px;
    font-family:'Poppu=ins',sans-serif;
    background:#f2f2f2;
    height:120vh;
    display:flex;
    align-items:center;
    justify-content:center;
}
.container{
    height:85vh;
    width:75vw;
    background-color:#ffc817;
    border-radius:20px;
    display:flex;
    align-items:center;
    justify-content:center;
}
.card{
    background-color:white;
    width:65%;
    height:70%;
    border-radius:8px;
    display:flex;
}
.content{
    font-size:12px;
}
.logout{
    margin:5% 0% 15% 45%;
    height:40px;
    display:flex;
    justify-content:space-between;
}
.logout input{
    text-align:center;
    font-size:13px;
    font-weight: bold;
    color:black;
    height:90%;
    border:0;
    outline:none;
    margin-top:5px;
    margin-bottom:10px;
    background:#fcdf7e;
}
.info{
    text-align:left;
    margin:2% 0% 1% 40%;
}
.img_user{
    margin:5% 0% 0% 45%;
}
h1{
    color:#333;
    font-size:20px;
}
.status span{
    font-size:12px;
    color:white;
    background: red;
    border-radius:100%;
    padding:3px;
    position:relative;
    left:-8px;
    top:-20px;
}
.history{
    border-top:3px solid #ffc817;
    border-bottom:3px solid #ffc817;
    max-width:400px;
    margin:0% 0% 0% 25%;
}
.status{
    display:flex;
    margin:2% 0% 0% 25%;
    border-bottom:3px solid #ffc817;
    max-width:400px;
}
i,h2{
    display: inline-block;
}
h5{
    font-size:14px;
    color:black;
}
</style>
</head>
<body>
<div class="container">
        <div class="card">
            <div class="img_user">
                <i class="fa fa-user-circle" style="font-size: 100px;"></i>
            </div>
            <div class="info">
                    <h1>ชื่อผู้ใช้: <?php echo $User->id?></h1>
                    <h1>อีเมล: <?php echo $User->email?></h1>
                    <h1>ที่อยู่: <?php echo $User->address?></h1>
            </div>
            <div class="history">
                <a href="?controller=STORE&action=history"><i class="fa fa-credit-card" style="color:black;margin:1% 2% 0% 0%;"></i><h2 style="font-size:15px;color:black">การซื้อของฉัน</h2><h2 style="font-size:15px;margin:1% 0% 0% 42%;color:black">ดูประวัติการซื้อ ></h2></a>
            </div>
            <div class="status">
                <a href="?controller=STORE&action=pay" style="text-decoration: none;">
                <i class="fa fa-credit-card fa-2x" style="color:black;margin:0% 0% 0% 25%;"><?php if($status1!=0||$status2!=0){?><span><?php echo $status1+$status2?></span><?php }?></i><h5>ที่ต้องชำระ</h5></a>
                <a href="?controller=STORE&action=ship" style="margin:0% 0% 0% 11%;text-decoration: none;">
                <i class="fa fa-user-o fa-2x" style="color:black;margin:0% 0% 0% 25%;"><?php if($status3!=0){?><span><?php echo $status3?></span><?php }?></i><h5>ที่ต้องจัดส่ง</h5></a>
                <a href="?controller=STORE&action=receive" style="margin:0% 0% 0% 11%;text-decoration: none;">
                <i class="fa fa-truck fa-2x" style="color:black;margin:0% 0% 0% 25%;"><?php if($status4!=0||$status5!=0){?><span><?php echo $status4+$status5?></span><?php }?></i><h5>ที่ต้องได้รับ</h5></a>
                <a href="?controller=STORE&action=rating" style="margin:0% 0% 0% 11%;text-decoration: none;">
                <i class="fa fa-user-o fa-2x" style="color:black;margin:0% 0% 0% 25%;"><?php if($status6!=0){?><span><?php echo $status6?></span><?php }?></i><h5>ให้คะแนน</h5></a>
            </div>
            <div class="logout">
                <a href="?controller=STORE&action=logout"><input type="submit" name="submit" value="ออกจากระบบ"></a>
            </div>
        </div>
    </div>   
</body>
</html>