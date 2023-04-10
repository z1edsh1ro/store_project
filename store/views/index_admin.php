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
    color:white;
    background:red;
}
td{
    padding:10px 5px;
}
button{
    text-align:center;
    font-size:13px;
    font-weight: bold;
    color:white;
    height:25px;
    border:0;
    outline:none;
    margin-top:5px;
    margin-left:10px;
    margin-bottom:10px;
    background:red;
}
</style>
</head>
<body>
    <br><br><br><br>
    <div class="container">
        <h1>ADMIN</h1>
            <div class="products">
                <table>
                <tr>
                    <th>หมายเลข ORDER</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>สินค้า</th>
                    <th>ราคารวม</th>
                    <th>สถานะ</th>
                    <th>แก้ไขสถานะ</th>
                </tr>
                <?php
                    foreach($OrderList as $Order){
                    $sum=0;
                ?>
                <tr>
                <div class="product">
                    <td>#<?php echo $Order->o_id;?></td>
                    <td><?php echo $Order->u_id;?></td>
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
                    <form method="get">
                        <td>
                        <select name="s_id">
                        <?php 
                        foreach($StatusList as $Status)
                        {
                            if($Status->s_name==$Order->s_name){
                                echo "<option value=$Status->s_id selected>$Status->s_name</option>";
                            }
                            else{
                                echo "<option value=$Status->s_id>$Status->s_name</option>";
                            }
                        }
                        ?></select></td>
                        <input type="hidden" name="controller" value="ADMIN">
                        <input type="hidden" name="o_id" value="<?php echo $Order->o_id;?>">
                        <td><button type="submit" name="action" value="update">Update</button></td>
                    </form>
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