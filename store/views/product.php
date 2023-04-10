<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
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
    height:90vh;
    width:75vw;
    background-color:#ffc817;
    border-radius:20px;
    display:flex;
    align-items:center;
    justify-content:center;
}
.card{
    background-color:white;
    width:80%;
    height:70%;
    border-radius:8px;
    display:flex;
}
.image{
    height:100%;
    display:flex;
    align-items:center;
}
.image img{
    width:80%;
    margin:auto;
}  
.content{
    font-size:12px;
}
.buttons{
    height:40px;
    display:flex;
    justify-content:space-between;
}
.buttons button{
    width:40%;
    font:inherit;
    background:#fcdf7e;
    border:2px solid #fcdf7e;
}
.info{
    padding:20% 10% 0 15%;
    box-shadow:-10px 5px 10px 10px rgba(0,0,0,0.1);
}
h1{
    color:#333;
    font-size:30px;
}
h3{
    color:red;
    font-size:25px;
}
h2{
    color:#333;
    font-size:20px;  
    margin-right:20px;
}
p{
    color:#555;
    font-size:12px;
}
.quantity-select{
    display:flex;
    align-items:center;
    margin-top:20px;
    margin-bottom:20px;
}
.quantity-select input{
    background:#eee;
    border:0;
    outline:0;
    padding:1px 1px 1px 10px;
    width:50px;
    border-radius:12px;
}
@media screen and (min-width:992px) {
    .card{
        display:grid;
        grid-template-columns:repeat(2,1fr);
    }
}
</style>
</head>
<body>
<div class="container">
        <div class="card">
            <div class="image">
                <img src="<?php echo $Product->img?>">
            </div>
            <div class="info">
                <h1><?php echo $Product->name?></h1>
                <h3><?php echo $Product->price?></h3>
                <p><?php echo $Product->detail?></p>
                <form method="get">
                <div class="quantity-select">
                    <h2>จำนวน </h2>
                    <input name="quantity" type="number" min="1" step="1" value="1">
                </div>
                <div class="buttons">
                    <input type="hidden"name="id"value="<?php echo $Product->id?>"/>
                    <input type="hidden"name="controller"value="STORE"/>
                    <button type="submit" name="action"value="add">หยิบใส่ตะกร้า</button>
                    <button type="submit" name="action"value="buy">ซื้อสินค้า</button>
                </div>
                </form>
            </div>
        </div>
    </div>   
</body>
</html>