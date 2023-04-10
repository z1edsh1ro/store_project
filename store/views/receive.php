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
input{
    text-align:center;
    font-size:13px;
    font-weight: bold;
    color:black;
    height:30px;
    border:0;
    outline:none;
    margin-top:5px;
    margin-bottom:10px;
    background:#fcdf7e;
}
label {
    font-size:13px;
    font-weight: bold;
    color:black;
    margin-top:5px;
    margin-bottom:10px;
}
</style>
</head>
<body>
    <br><br><br><br>
    <div class="container">
        <h1>ที่ต้องได้รับ</h1>
            <div class="products">
                <table>
                <tr>
                    <th>หมายเลข ORDER</th>
                    <th>สินค้า</th>
                    <th>ราคารวม</th>
                    <th>สถานะ</th>
                    <th></th>
                </tr>
                <?php
                    foreach($OrderList as $Order){
                    $sum=0;
                ?>
                <tr>
                <div class="product">
                    <td>#<?php echo $Order->o_id;?></td>
                    <td>
                    <div class="content">
                        <?php
                        foreach($Order_DetailList as $Order_Detail){
                            if($Order->o_id==$Order_Detail->o_id){
                                echo $Order_Detail->p_name." x $Order_Detail->quantity"."<br>";
                                $sum+=$Order_Detail->quantity*$Order_Detail->price;
                            }
                        }
                        ?>
                    </div>
                    <td><?php echo $sum;?></td>
                    <div class="pay">
                        <td><label><?php echo $Order->s_name;?></label></td>  
                        <?php if($Order->s_name=="พัสดุถูกจัดส่งสำเร็จ"){?>
                        <td><a href="?controller=STORE&action=received&id=<?php echo $Order->o_id;?>">
                        <input type="submit" name="submit" value="ฉันได้ตรวจสอบและยอมรับสินค้า"></a></td>
                        <?php }?>
                    </div>
                </div>
                </tr>
                <?php
                }
                ?>  
                </table>
        </div>
    </div>
</body>
</html>