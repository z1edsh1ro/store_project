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
button{
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
.rating-group{
    display: inline-flex;
}
  .rating_icon{
    pointer-events: none;
}
  .rating_input{
   position: absolute;
   left: -9999px;
}
  .rating_input-none{
    display: none
}
  .rating_label{
    cursor: pointer;
    padding: 0 0.1em;
    font-size: 2rem;
}
  .rating_icon-star{
    color: orange;
}
  .rating_input:checked ~ .rating_label .rating_icon-star{
    color: #ddd;
}
  .rating-group:hover .rating_label .rating_icon-star{
    color: orange;
}
  .rating_input:hover ~ .rating_label .rating_icon-star{
    color: #ddd;
}
</style>
</head>
<body>
    <br><br><br><br>
    <div class="container">
        <h1>ให้คะแนน</h1>
            <div class="products">
                <table>
                <tr>
                    <th>หมายเลข ORDER</th>
                    <th>สินค้า</th>
                    <th>ราคารวม</th>
                    <th>คะแนน</th>
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
                    <td>
                    <form method="get">
                        <div class="rating-group">
                            <input disabled checked class="rating_input rating_input-none" name="rating" value="0" type="radio">
                            <label class="rating_label" for="rating3-1"><i class="rating_icon rating_icon-star fa fa-star"></i></label>
                            <input class="rating_input" name="rating" id="rating3-1" value="1" type="radio">
                            <label class="rating_label" for="rating3-2"><i class="rating_icon rating_icon-star fa fa-star"></i></label>
                            <input class="rating_input" name="rating" id="rating3-2" value="2" type="radio">
                            <label class="rating_label" for="rating3-3"><i class="rating_icon rating_icon-star fa fa-star"></i></label>
                            <input class="rating_input" name="rating" id="rating3-3" value="3" type="radio">
                            <label class="rating_label" for="rating3-4"><i class="rating_icon rating_icon-star fa fa-star"></i></label>
                            <input class="rating_input" name="rating" id="rating3-4" value="4" type="radio">
                            <label class="rating_label" for="rating3-5"><i class="rating_icon rating_icon-star fa fa-star"></i></label>
                            <input class="rating_input" name="rating" id="rating3-5" value="5" type="radio">
                        </div>
                        <td>
                        <input type="hidden" name="controller" value="STORE">
                        <input type="hidden" name="id" value="<?php echo $Order->o_id;?>">
                        <button type="submit" name= "action" value="ratingConfirm">ยืนยัน</button>
                        </td>
                    </form>
                    </td>
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