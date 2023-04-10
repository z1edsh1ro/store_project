<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{
    margin-left:10%;
    font-family:sans-serif;
    background:#f2f2f2;
}
h3{
    text-align:center;
    color:black;
    font-size:25px;
    margin:0;
    padding-top:10px;
}
a{
    text-decoration:none;
}
.product{
    display:flex;
    flex-wrap:wrap;
    width:100%;
    justify-content:left;
    align-items:center;
    margin:50px 0;
}
.content{
    width:20%;
    margin:15px;
    box-sizing:border-box;
    float:left;
    text-align:center;
    border-radius:20px;
    cursor:pointer;
    padding-top:10px;
    box-shadow:0 14px 28px rgba(0,0,0,0.25),0 10px 10px rgba(0,0,0,0.22);
    transition:.4s;
    background:white;
}
.content:hover{
    box-shadow:0 3px 6px rgba(0,0,0,0.16),0 3px 6px rgba(0,0,0,0.23);
    transform:translate(0px,-8px);
}
img{
    width:200px;
    height:200px;
    text-align:center;
    margin:0 auto;
    display:block;
}
p{
    text-align:center;
    font-size:10px; 
    color:#b2bec3;
    padding-top:0 8px;
}
h6{
    text-align:center;
    font-size:26px;
    color:red;
    margin:0;
}
.detail{
    text-align:center;
    font-size:12px;
    font-weight: bold;
    color:black;
    width:50%;
    height:80%;
    padding:15px;
    border:0;
    outline:none;
    cursor:pointer;
    margin-top:5px;
    margin-bottom:10px;
    background:#fcdf7e;
}
@media (max-width:1000px){
    .content{
        width:45px;
    }
}
 @media(max-width:750px){
    .content{
        width:100%;
    }
 }

</style>
</head>
<body>
<br><br><br><br><br><br>
    <div class="product">
        <?php
        foreach($ProductList as $List){
        ?>
        <div class="content">
            <a href=?controller=STORE&action=product&id=<?php echo $List->id?>>
            <img src="<?php echo $List->img?>">
            <h3><?php echo $List->name?></h3>
            <p><?php echo $List->detail?></p>
            <h6>฿<?php echo $List->price?></h6>
            <button class="detail">ดูรายละเอียด</button>
            </a>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>