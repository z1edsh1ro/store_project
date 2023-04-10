<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<style> 
.container{
    max-width:1200px;
    margin:0 auto;
}
h1{
    padding:20px 0;
}
.product{
    display:flex;
    width:100%;
    overflow:hidden;
    align-items:center;
    justify-content:center;

}
.content{
    display:flex;
    flex-wrap:wrap;
}
table{
    width:100%;
    border-collapse:collapse;
}
th{
    text-align:left;
    padding:5px;
    color:black;
    background:#ffc817;
}
td{
    padding:10px 5px;
}
img{
    width:100px;
    height:100px;
    text-align:center;
    margin-right:10px;
    display:block;
}
.total{
    display:flex;
    justify-content:flex-end;
}
.total table{
    border-top:3px solid #ffc817;
    width:100%;
    max-width:350px;
}
.total input{
    font-size:15px;
    font-weight: bold;
    color:black;
    width:100%;
    height:100%;
    padding:15px;
    border:0;
    outline:none;
    cursor:pointer;
    margin-top:5px;
    margin-left:25%;
    margin-bottom:10px;
    background:#fcdf7e;
}
</style>
</head>
<body>
    <br><br><br><br>
    <div class="container">
        <h1>ตะกร้าสินค้า</h1>
            <div class="products">
                <table>
                <tr>
                    <th>สินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>ลบ</th>
                </tr>
                <?php
                    foreach($CartList as $List){
                ?>
                <tr>
                <div class="product">
                    <td>
                    <div class="content">
                            <img src="<?php echo $List->img?>"><br>
                            <?php echo $List->name?>
                    </div>
                    </td>
                    <td><?php echo $List->price?></td>
                    <td>&nbsp&nbsp&nbsp<?php echo $List->quantity?></td>
                    <div class="trash">
                        <td><a href="?controller=STORE&action=delete&id=<?php echo $List->id;?>" style="color:red;"><i class="fa fa-trash"></i></a></td>
                    </div>
                </div>
                </tr>
                <?php
                $sum+=$List->quantity*$List->price;
                }
                ?>  
                </table>
        </div>
        <div class="total">
            <table>
                <tr>
                    <td>ยอดรวม</td>
                    <td>฿<?php echo $sum;?></td>
                </tr>
                <tr>
                    <td>ส่วนลด</td>
                    <td>- ฿0</td>
                </tr>
                <tr>
                    <td>ยอดรวมสุทธิ</td>
                    <td>฿<?php echo $sum;?></td>
                </tr>
                <tr>
                    <td><a class="btn btn-warning" href="?controller=STORE&action=order">ดำเนินการสั่งซื้อ</input></a></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>