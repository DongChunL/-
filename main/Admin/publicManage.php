<?php
include '../../sql/phpConnectDb.php';
session_start();

$keyword = isset($_GET['keyword'])?$_GET['keyword']:"";

$page = isset($_GET['page'])?$_GET['page']:1;//获取当前分页数
$limitNews = 3; //每页显示新闻数量, 这里设置每页显示3条新闻
$countNews = 0; //总共有多少条新闻
$countPage = 0; //一共有多少页数

$limitFrom = ($page - 1) * $limitNews;//从第几条数据开始读记录
//每页显示3个
//page = l limit 0
//page = 2 limit 3
//page = 3 limit 6
/*用户名*/
$rentorder_sql = "select * from rentorders where user_name like '%$keyword%' or orderMoney like '%$keyword%'or orderMethod like '%$keyword%' or public_Id like '%$keyword%'or orderAddress like '%$keyword%'order by orderId asc limit {$limitFrom}, {$limitNews}";
$sqlCount = "select count(*) from rentorders where user_name like '%$keyword%'or orderMoney like '%$keyword%' or orderMethod like '%$keyword%' or public_Id like '%$keyword%'or orderAddress like '%$keyword%'order by orderId asc ";
$retQuery = mysqli_query($link, $sqlCount); //查询数量sql语句
$retCount = mysqli_fetch_array($retQuery); //获取数量
$count = $retCount[0]?$retCount[0]:0; //判断获取的新闻数量
$countNews = $count;

$countPage = $countNews%$limitNews; //求余数获取分页数量能否被除尽
if(($countPage) > 0) { //获取的页数有余
    $countPage = ceil($countNews/$limitNews);
    // ceil()函数向上舍入为最接近的整数,除不尽则取整数+1页, 10个新闻每个页面显示3个，成3个页面，剩余1个成1个页面
} else {
    $countPage = $countNews/$limitNews;
}

$prev = ($page - 1 <= 0 )?1:$page-1;
$next = ($page + 1 > $countPage)?$countPage:$page+1;

$rentorder_query = mysqli_query($link, $rentorder_sql);
?>

<html>
<head>
    <meta charset="utf-8">
    <link href="../Css/headso.css" rel="stylesheet" type="text/css">
    <link href="../Css/order.css" rel="stylesheet" type="text/css">
    <link href="../Css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../My97DatePicker/WdatePicker.js"></script><link href="../Css/WdatePicker.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../javascript/Seek.js"></script>
    <style>
        body{
            margin: 8px;
        }
        .writeOrder input{
            /*盒子从外到里：border、padding、content*/
            /*计算height，width时包含了padding border的值*/
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            text-align: center;
            /*计算height，width时没有包含padding border*/
            /*-webkit-box-sizing: content-box;*/
            /*-moz-box-sizing: content-box;*/
            /*box-sizing: content-box;*/


            /*计算height，width时包含了padding 的值*!/*/
            /*-webkit-box-sizing: padding-box;*/
            /*-moz-box-sizing: padding-box;*/
            /*box-sizing: padding-box;*/
        }

        .writeOrder .returnButton {
            background-color: rgb(0, 191, 255);
            color: white;
            border: 0;
            display: inline-block;
            vertical-align: top;
            /*            margin-top: 10px;*/
            height: 40px;
            width: 80px;
            font-size: 20px;

        }

         .writeOrder .continueRentButton{
            background-color: darkred;
            color: white;
            border: 0;
            display: inline-block;
            vertical-align: top;
            /*            margin-top: 10px;*/
            height: 40px;
            width: 85px;
            font-size: 20px;

        }

                .writeOrder .returnButton:hover{
                    background-color: rgb(0, 160, 255);
                }
    </style>
    <script>
        function continueRent(){
            document.getElementById('toContinueRent').removeAttribute('hidden');
        }
        function continueConfirm(){
            var zuQi = document.getElementById('TextZuqi').value;
            var orderId = document.getElementById('orderId').value;
            var ddMoney = document.getElementById('ddMoney').innerHTML;  //原总租金
            ddMoney = + parseInt(ddMoney);
            var Span_Money = document.getElementById('Span_Money').innerHTML;   //续订租金
            Span_Money = parseInt(Span_Money);
            var public_Id = document.getElementById('public_Id').value;
            var orderTime = document.getElementById('orderTime').innerHTML
            if(zuQi == 0){
                alert('租期不能为0');
                return false;
            }
            var yes = confirm('确定续租'+zuQi+"个租期吗？");
            if(yes == true){
                window.location.href="continueRent.php?zuQi="+zuQi+"&orderId="+orderId+"&Span_Money="+Span_Money+"&public_Id="+public_Id+'&orderTime='+orderTime+"&oldMoney="+ddMoney;

            }else{
                document.getElementById('toContinueRent').setAttribute('hidden','hidden');
            }
            document.getElementById('toContinueRent').setAttribute('hidden','hidden');
        }
        function cancelContinue(){
            document.getElementById('toContinueRent').setAttribute('hidden','hidden');
        }
        function turnBack(publicId){
            var yes = confirm("确定更改租赁状态吗？");
            if(yes==true){
                document.location.href="updateOrder.php?orderId="+publicId;
            }
        }
    </script>
</head>
<body>
<fieldset id="manageUser" style="height:680px;width: 900px;">
    <legend style="font-size: 24px;color: #666;">管理用户订单</legend>
    <style>
        .newsForm  .searchNewsButton{
            background-color: rgb(0, 191, 255);
            color: white;
            border: 0;
            display: inline-block;
            vertical-align: top;
            /*            margin-top: 10px;*/
            height: 40px;
            width: 85px;
            font-size: 20px;
        }
        .newsForm .searchNewsButton:hover{
            background-color: rgb(0, 160, 255);
        }
        .newsForm  .searchNews{
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            /* -webkit-box-sizing: content-box; */
            /* -moz-box-sizing: content-box; */
            /* box-sizing: content-box; */
            /* -webkit-box-sizing: padding-box; */
            /* -moz-box-sizing: padding-box; */
            height: 40px;
            width: 180px;
            font-size: 18px;
        }
    </style>
    <form method="get" action="publicManage.php" class="newsForm" style="margin:10px;text-align: center">
        <input type="text" name="keyword"  value="<?php echo $keyword;?>"  autocomplete="off" placeholder="收货人、编号等关键字" class="searchNews"/><input type="submit" class="searchNewsButton" value="搜索"/>
    </form>
<!--订单详情-->
<?php
/*if(!$rentorder_query = mysqli_query($link,$rentorder_sql)){
    var_dump(mysqli_error($link));
    exit();
}*/
while($rentorder_Result = mysqli_fetch_array($rentorder_query)):
    $orderId = $rentorder_Result['orderId'];
    $returnTime = $rentorder_Result['returnTime'];
    $orderNumber =  $rentorder_Result['orderNumber'];
    $orderPeriod =  $rentorder_Result['orderPeriod'];
    $orderMethod =  $rentorder_Result['orderMethod'];
    $orderMoney = $rentorder_Result['orderMoney'];
    $orderAddress  = $rentorder_Result['orderAddress'];
    $order_name = $rentorder_Result['user_name'];
    $orderPhone = $rentorder_Result['orderPhone'];
    $publicId = $rentorder_Result['public_Id'];
    $continueRent  = $rentorder_Result['continueRent'];
//出租方信息-订单
    $order_sql = "SELECT publicId,publicTitle,publicMoney,publicMoneyStyle,publicPledge,publicPerson FROM carpublic where publicId='$publicId'";
    if(!$order_query = mysqli_query($link,$order_sql)){
        echo mysqli_error($link);
    }else{
        $arr = mysqli_fetch_array($order_query);
    }
//出租方信息-图片
    $tup_sql= "SELECT public_Id,photoUrl FROM tup WHERE  public_Id = '$publicId'";
    if(!$tup_query = mysqli_query($link,$tup_sql)){
        echo mysqli_error($link);
    }else{
        $tup_arr = mysqli_fetch_row($tup_query);
        $photoUrl = $tup_arr[1];
    }
    ?>
    <table border="0" cellpadding="0" cellspacing="0" width="870px" class="writeOrder">
        <tbody><tr>
            <th width="30%">
                物品标题
            </th>
            <th width="10%">
                租金
            </th>
            <th width="10%">
                押金
            </th>
            <th width="10%">
                租期和数量
            </th>
            <th width="10%">
                送货方式
            </th>
            <th width="20%">
                归还期限
            </th>
            <th width="10%">
                <strong>总租金</strong>
            </th>
        </tr>
        <input type="hidden" id="orderId" name="orderId" value="<?php echo $orderId ?>">
        <input type="hidden" id="public_Id" name="public_Id" value="<?php echo $publicId ?>">
        <tr class="wrddtr">
            <td width="30%">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody><tr>
                        <td width="105px" style="text-align: center;">
                            <a id="hlPro" title="查看租品详情" href="../User/bikeDetail.php?id=<?php echo $publicId ?>" target="_blank"><img id="ImgProduct" class="ddImgs" src="../../<?php echo $photoUrl; ?>" style="border-color:#DDDDDD;border-width:1px;border-style:Double;height:65px;width:65px;"> <p>编号：<?php echo $publicId; ?></p></a>
                        </td>
                        <td align="left">
                            <p>
                                <strong>
                                    <a id="hl_PName" title="<?php echo $arr['publicTitle'];?>" href="../User/bikeDetail.php?id=<?php echo $publicId;?>"><?php echo $arr['publicTitle'];?></a>
                                </strong>
                            </p>
                            <p class="ddczf">
                                出租方：
                                <span id="lblUserName" title="<?php echo $arr['publicPerson'];?>"><?php echo $arr['publicPerson'];?></span>
                                <!--              <a href="javascript:void(null);" id="imgsendimg" onclick="ShowWindow('2','25776');$('#mask').show();">
                                                  <img src="../../image/icons/lx_r2_c1.gif" alt="和我联系" style="vertical-align: middle;"></a>-->
                            </p>
                            <p style="color:red;"><?php if($continueRent=="续单"){echo '*注：这是续租单';}?></p>
                        </td>
                    </tr>
                    </tbody></table>
            </td>
            <td width="10%">
                <span id="Span_ZuMoney"><?php echo $arr['publicMoney'];?></span>
                <?php echo $arr['publicMoneyStyle'];?>                </td>
            <td width="10%">
                <span id="Span_YaMoney"><?php echo $arr['publicPledge'];?></span> 元
            </td>
            <td width="10%">
                <p><span class="zuqi">租期：<?php echo $orderPeriod;?></span></p>
                <p>数量：<span class="zuqi" id="TextAmount"><?php echo $orderNumber;?></span></p>
            </td>
            <td width="10%">
                <span><?php echo $orderMethod;?></span>
            </td>
            <td width="10%">
                <span id="orderTime"><?php echo $returnTime;?></span>
            </td>
            <td width="12%" style=" background: #fff;text-align: right" class="txddFoot">
                <span style="color: #ff3300;font-size: 16pt;font-weight: bold;font-family: Arial;">&yen;</span><span class="ddMoney" id="ddMoney"><?php echo $orderMoney;?>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <table border="0" cellpadding="0" cellspacing="0" width="95%" align="center">
                    <tbody><tr>
                        <td>
                            <div class="contactRen">
                                <span id="Span_Addr"><?php echo $orderAddress;?></span><span id="span_nameBefore">(&nbsp;</span><span id="Span_UserName"><?php echo $order_name;?></span><span>收&nbsp;)</span><span id="Span_Mobile"><?php echo $orderPhone;?></span></div>
                        </td>
                    </tr>
                    </tbody></table>
            </td>
            <td width="12%"  style="background: rgb(247,247,247)">
                <input type="button" value="租借中"  class="continueRentButton" onclick="#">
            </td>
            <td width="12%"  style="background: rgb(247,247,247)">
                <input type="button" value="删除" class="returnButton" onclick="turnBack(<?php echo $publicId; ?>)">
            </td>
        </tr>
        <tr>
            <table hidden="hidden" id="toContinueRent">
                <tr style="height: 32px;">
                    <td style="text-align: right; width: 153px;">
                        <span style="color: #ff6600">*</span>&nbsp;续租租期：
                    </td>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0" align="center">
                            <tbody><tr>
                                <td>
                                    <span class="numbtn" onclick="ModiNum(1,'-')">-</span>
                                </td>
                                <td>
                                    <input name="TextZuqi" type="text" id="TextZuqi" onkeypress="TextKeyPass()" onkeyup="Textkeyup(1)" class="inputNum" value="1">
                                </td>
                                <td>
                                    <span class="numbtn" onclick="ModiNum(1,'+')">+</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td >
                                    <span>支付金额：</span><span style="color: #ff3300;font-size: 16pt;font-weight: bold;font-family: Arial;">&yen;</span><span class="ddMoney" id="Span_Money"><?php echo $orderMoney;?></span>
                                </td>
                                <td><input type="button" class="continueConfirm" onclick="continueConfirm()" value="确定"></td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><input type="button" class="cancelContinue" onclick="cancelContinue()" value="取消"></td>
                            </tr>
                            </tbody></table>
                    </td>
            </table>
        </tr>
        <!--尾部-->
        <tr>
            <td colspan="7" style="background: #fff/*#F7F7F7*/; text-align: right;margin-top: 25px" class="txddFoot">
            </td>
        </tr>
        </tbody></table>
<?php endwhile;?>

    <div style="margin:20px;">
        共<?php echo $countPage;?>页 |查到<?php echo $countNews;?>条记录
        当前第<?php echo $page;?>页|
        <a href="?page=<?php echo $prev;?>&keyword=<?php echo $keyword;?>">上一页|</a>
        <?php for($i=1; $i<=$countPage; $i++):?>
            <a href="?page=<?php echo $i;?>&keyword=<?php echo $keyword;?>"><?php echo $i;?></a>
        <?php endfor;?>
        <a href="?page=<?php echo $next;?>&keyword=<?php echo $keyword;?>">|下一页</a>
    </div>

</fieldset>
<!--<script type="text/javascript" src="../../js/order.js"></script>-->
<script>
    function ModiNum(type,oper){
        var flag = "0";
        if (type == "1") {
            //租期
            var zuqi = $("#TextZuqi").val();
            if (oper == "+") {
                $("#TextZuqi").val(parseInt(zuqi) + 1);
                flag = "1";
            }
            else {
                if (parseInt(zuqi) > 1) {
                    $("#TextZuqi").val(parseInt(zuqi) - 1);
                    flag = "1";
                }
            }
        }
        else if (type == "2") {
            //数量
            var bigtype = $("#Hf_type").val();
            if (bigtype == "57")
            { $("#TextAmount").val("1"); } else {
                var amount = $("#TextAmount").val();
                if (oper == "+") {
                    $("#TextAmount").val(parseInt(amount) + 1);
                    flag = "1";
                }
                else {
                    if (parseInt(amount) > 1) {
                        $("#TextAmount").val(parseInt(amount) - 1);
                        flag = "1";
                    }
                }
            }
        }
        if (flag == "1") {
            ActionMoney();
        }
    }
    function ActionMoney() {
        var zprice = document.getElementById('Span_ZuMoney').innerHTML;
        var yprice = document.getElementById('Span_YaMoney').innerHTML;
        var zuqi = $("#TextZuqi").val();
        var amount = document.getElementById('TextAmount').innerHTML;
        var moneyAll = (parseFloat(zprice) * parseInt(zuqi) * parseInt(amount) + parseFloat(yprice)).toFixed(2);
        if (!isNaN(zprice) && !isNaN(yprice) && !isNaN(zuqi) && !isNaN(amount)) {
            $("#Span_Money").html((parseFloat(zprice) * parseInt(zuqi) * parseInt(amount) + parseFloat(yprice)).toFixed(2));
            document.getElementById('orderMoney').setAttribute('value',moneyAll);
        }
        else {
            $("#Span_Money").html("0");
            document.getElementById('orderMoney').setAttribute('value','0');
        }
    }
</script>
</body>
</html>