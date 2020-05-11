<?php
include'../model/head.php';

include '../../sql/phpConnectDb.php';
//获得的订单详情
if ($_GET['id']!=""){
    $publicId = $_GET['id'];
    //出租方信息-订单
    $order_sql = "SELECT publicId,publicTitle,publicMoney,publicMoneyStyle,publicPledge,publicPerson FROM carpublic WHERE publicId='$publicId'";
    if(!$order_query = mysqli_query($link,$order_sql)){
        echo mysqli_error($link);
    }else{
        $arr = mysqli_fetch_row($order_query);
    }
    //确定下单的收货地址
    $username = $_SESSION['username'];
    $rent_sql = "SELECT * FROM users WHERE username ='$username' ";
    if($rent_query = mysqli_query($link,$rent_sql)){
        $orderResult  = mysqli_fetch_array($rent_query);
    }
    //出租方信息-图片
    $tup_sql= "SELECT public_Id,photoUrl FROM tup WHERE  public_Id = '$publicId'";
    if(!$tup_query = mysqli_query($link,$tup_sql)){
        echo mysqli_error($link);
    }else{
        $tup_arr = mysqli_fetch_row($tup_query);
    }
}

//确认收货地址

?>
<html>
<head>
    <meta charset="utf-8">
    <title>自行车租赁 - 下订单</title>
        <link href="../Css/nav.css" rel="stylesheet" type="text/css">
    <link href="../Css/headso.css" rel="stylesheet" type="text/css">
    <link href="../Css/order.css" rel="stylesheet" type="text/css">
    <link href="../Css/public.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navigation">
    <section class="center">
        <ul>
            <ul>
                <li><a href="../../index.php">首页</a></li>
                <li><a href="publicInfos.php">出租信息</a></li>
                <li><a href="seekInfos.php">求租信息</a></li>
                <Li><a href="newInfos.php">租赁资讯</a></Li>
                <Li><a href="about.php">关于我们</a></Li>
                <Li><a href="help.php">帮助中心</a></Li>
                <li><a href="onlinePredict.php">在线预订</a></li>
            </ul>
        </ul>
    </section>
</nav>
<form method="post" action="orderProcess.php" id="form1">
    <input type="hidden" name="public_Id" id="public_Id" value="<?php echo $_GET['id']?>">
    <input type="hidden" name="user_name" id="user_name" value="">
    <input type="hidden" name="orderAddress" id="orderAddress" value="">
    <input type="hidden" name="orderPhone" id="orderPhone" value="">
    <input type="hidden" name="orderNumber" id="orderNumber" value="">
    <input type="hidden" name="orderPeriod" id="orderPeriod" value="">
    <input type="hidden" name="orderInfo" id="orderInfo" value="">
    <input type="hidden" name="orderMoney" id="ddMoney" value="">
    <script>
        function orderProcess(){
            var user_name = document.getElementById('Span_UserName').innerHTML;
            var orderAddress = document.getElementById('Span_Addr').innerHTML;
            var orderPhone = document.getElementById('Span_Mobile').innerHTML;
            var orderMoney = document.getElementById('Span_Money').innerHTML;
            //获得input中的内容
            var orderNumber = document.getElementById('TextAmount').value;
            var orderPeriod = document.getElementById('TextZuqi').value;
            var orderInfo = document.getElementById('TextRemark').value;

            document.getElementById('user_name').setAttribute("value",user_name);
            document.getElementById('orderPhone').setAttribute("value",orderPhone);
            document.getElementById('orderAddress').setAttribute("value",orderAddress);
            document.getElementById('orderNumber').setAttribute("value",orderNumber);
            document.getElementById('orderPeriod').setAttribute("value",orderPeriod);
            document.getElementById('orderInfo').setAttribute("value",orderInfo);
            document.getElementById('ddMoney').setAttribute("value",orderMoney);
        }
    </script>

    <div class="weizhi1">
        <div class="wzTxt">
            您当前所在的位置：<a href="../../index.php">自行车租赁网</a> &gt;&gt; 下订单</div>
        <div class="ddstep1">
            <ul class="stepList">
                <li class="hover">1.填写订单信息</li>
                <li>2.成功提交订单</li>
                <li>3.支付订单</li>
            </ul>
        </div>
    </div>
    <div class="orderMain">
        <div id="Div_Adr">
            <div class="addrTxt">
                确认收货地址</div>
            <div class="contactRen">
                <span id="Span_Addr"><?php echo $orderResult['userAddress'] ;?></span><span id="span_nameBefore">(&nbsp;</span><span id="Span_UserName"><?php echo $_SESSION['username'];?></span id="span_nameAfter"><span>收&nbsp;)</span><span id="Span_Mobile"><?php echo $orderResult['phone']?></span><span><a href="#" onclick="CheckAddr()">
                    修改收货地址</a></span></div>
        </div>
        <div id="editAdr" style="display: none;" class="editAddr">
            <div class="addrTxt1">
                修改收货地址</div>
            <div>
                <ul class="listOrder">
                    <li class="orderTitle" style="font-size: 12px"><span class="yellowMoney">*</span>&nbsp;收货人姓名：</li>
                    <li class="orderInput">
                        <input name="TextUserName" type="text" id="TextUserName" class="inputTxt" onblur="checkUserName()">
                        <span id="spanUserName"></span></li>
                    <li class="orderTitle" style="font-size: 12px"><span class="yellowMoney">*</span>&nbsp;手机号：</li>
                    <li class="orderInput">
                        <input name="TextMobile" type="text" id="TextMobile" onblur="checkMobile()" class="inputTxt" maxlength="11">
                        <span id="spanMobile"></span></li>
                    <li class="orderTitle" style="font-size: 12px"><span class="yellowMoney">*</span>&nbsp;收货地址：</li>
                    <li class="orderInput">
                        <input name="TextAddr" type="text" id="TextAddr" class="inputTxt" maxlength="100" size="55">
                        <span id="spanAddr"></span></li>
                    <li class="orderTitle"></li>
                    <li class="orderInput">
                        <img src="../../image/icons/save_edit.jpg" onclick="checkData();">
                        <img src="../../image/icons/cancel.jpg" onclick="Cancel();">
                    </li>
                </ul>
                <div class="clr">
                </div>
            </div>
        </div>
        <div class="addrTxt">
            订单信息</div>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="writeOrder">
            <tbody><tr>
                <th width="50%">
                    物品标题
                </th>
                <th width="10%">
                    租金
                </th>
                <th width="10%">
                    押金
                </th>
                <th width="10%">
                    租期
                </th>
                <th width="10%">
                    数量
                </th>
                <th width="10%">
                    送货方式
                </th>
            </tr>
            <tr class="wrddtr">
                <td width="50%">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody><tr>
                            <td width="105px">
                                <a id="hlPro" title="查看租品详情" href="bikeDetail.php?id=<?php echo $arr[0]?>" target="_blank"><img id="ImgProduct" class="ddImgs" src="../../<?php echo $tup_arr[1]?>" style="border-color:#DDDDDD;border-width:1px;border-style:Double;height:65px;width:65px;"></a>
                            </td>
                            <td align="left">
                                <p>
                                    <strong>
                                        <a id="hl_PName" title="<?php echo $arr[1]?>" href="bikeDetail.php?id=<?php echo $arr[0]?>"><?php echo $arr[1]?></a>
                                    </strong>
                                </p>
                                <p class="ddczf">
                                    出租方：
                                    <span id="lblUserName" title="<?php echo $arr[5]?>"><?php echo $arr[5]?></span>
                      <!--              <a href="javascript:void(null);" id="imgsendimg" onclick="ShowWindow('2','25776');$('#mask').show();">
                                        <img src="../../image/icons/lx_r2_c1.gif" alt="和我联系" style="vertical-align: middle;"></a>-->
                                </p>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
                <td width="10%">
                    <span id="Span_ZuMoney"><?php echo $arr[2]?></span>
                    <?php echo $arr[3]?>
                </td>
                <td width="10%">
                    <span id="Span_YaMoney"><?php echo $arr[4]?></span> 元
                </td>
                <td width="10%">
                    <table border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody><tr>
                            <td>
                                <span class="numbtn" onclick="ModifNum(1,'-')">-</span>
                            </td>
                            <td>
                                <input name="TextZuqi" type="text" id="TextZuqi" onkeypress="TextKeyPass()" onkeyup="Textkeyup(1)" class="inputNum" value="1">
                            </td>
                            <td>
                                <span class="numbtn" onclick="ModifNum(1,'+')">+</span>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
                <td width="10%">
                    <table border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody><tr>
                            <td>
                                <span class="numbtn" onclick="ModifNum(2,'-')">-</span>
                            </td>
                            <td>
                                <input name="TextAmount" type="text" id="TextAmount" onkeypress="TextKeyPass()" onkeyup="Textkeyup(2)" class="inputNum" value="1">
                            </td>
                            <td>
                                <span class="numbtn" onclick="ModifNum(2,'+')">+</span>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
                <td width="10%">
                    <select name="DDL_Method" id="DDL_Method">
                        <option value="送货上门">送货上门</option>
                        <option value="线下自取">线下自取</option>

                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="ddczf1">
                    <table border="0" cellpadding="0" cellspacing="0" width="95%" align="center">
                        <tbody><tr>
                            <td width="80px">
                                补充信息：
                            </td>
                            <td>
                                <input name="TextRemark" type="text" id="TextRemark" class="inputTxt" style="height:33px;width:820px;">
                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>
            <tr>
                <td colspan="6" style="background: #F7F7F7; text-align: right" class="txddFoot">
                    <strong>总租金：</strong> <span style="color: #ff3300;font-size: 16pt;font-weight: bold;font-family: Arial;">&yen;</span><span id="Span_Money" class="ddMoney"><?php echo $arr[2]+$arr[4]?></span>
                </td>
            </tr>
            </tbody></table>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
            <tbody><tr>
                <td align="right">
                    提交订单即可查看出租方联系方式&nbsp;&nbsp;
                </td>
                <td width="110px;">
                    <input type="image" name="TMBtn_submit" id="TMBtn_submit" src="../../image/icons/sub_btn.jpg" onclick="orderProcess()">
                </td>
            </tr>
            </tbody></table>
        <br>
        <br>
    </div>
    <div id="popBox" class="popBox" style="display: none; left: 300px; top: 180px; position: absolute; z-index: 10000; cursor: move;">
        <table class="popTable">
            <tbody><tr>
                <td class="popTitle" id="popTitle">
                </td>
                <td align="center">
                    <a href="javascript:void(null);" onclick="CloseWindow();" id="imgclosewin">
                        <img border="0" src="../../image/icons/close_icn.gif" alt="关闭窗口"></a>
                </td>
            </tr>
            </tbody></table>
        <iframe id="popIframe" class="popIframe" frameborder="0" scrolling="auto"></iframe>
    </div>
    <div id="mask">
    </div>
</form>
</body>
<script src="../../jquery-3.3.1/jquery-3.3.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../../js/popbox.js"></script>
<script type="text/javascript" src="../../js/order.js"></script>
<script type="text/javascript">
    var dy = document.getElementById('popBox');
    var ny = new easyDragDrop(dy, dy, null, false);
</script>
<?php
include'../model/footer.html';
?>
</html>