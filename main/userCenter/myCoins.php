<?php
include '../../sql/phpConnectDb.php';
session_start();
$username = $_SESSION['username'];
$sql = "SELECT money FROM money WHERE username = '$username'";
$query = mysqli_query($link,$sql);

if(!$money = mysqli_fetch_row($query)){
    $money=0;
}else{
    $money=$money[0];
}
?>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body{
        /*    margin: 0 auto;*/
        }
        .coinCenter{
            width: 630px;
            height: 400px;
            border: 1px solid black;
/*            text-align: center;*/
            margin: 0 auto;
        }
       .coinCenter li{
            list-style:none;
            float: left;
            margin: 20px 20px;
        }
        .coinCenter .chongzhi{
            width: 100px;
            height: 100px;
            background: white;
            font-size: 20px;
            color: black;
            line-height: 100px;
            text-align: center;
            display: inline-block;
            border: 2px solid black;
        }
        .coinCenter .chongzhi:hover{
            border: 2px solid blue;
            color: blue;
        }
       .coinCenter  p{;
            margin-left：20px;
        }
        .coinCenter input{

            /*盒子从外到里：border、padding、content*/
            /*计算height，width时包含了padding border的值*/
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;

            /*计算height，width时没有包含padding border*/
            /*-webkit-box-sizing: content-box;*/
            /*-moz-box-sizing: content-box;*/
            /*box-sizing: content-box;*/


            /*计算height，width时包含了padding 的值*!/*/
            /*-webkit-box-sizing: padding-box;*/
            /*-moz-box-sizing: padding-box;*/
            /*box-sizing: padding-box;*/
            height: 40px;
            width: 100px;
            font-size: 20px;
        }
        .coinCenter .chongzhiButton{
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
        .coinCenter .chongzhiButton:hover{
            background-color: rgb(0, 160, 255);
        }
        #elseCoins{
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
</head>
<body>

<div class="mainBorder" style="float: left;">
<fieldset id="manageUser" class="coinCenter" style="height:680px;width: 900px;">
    <legend style="font-size: 24px;color: #666;">充值中心</legend>
    <p>账户余额：<span style="color:red"><?php echo $money?></span>租币</p>
<ul>
    <li><a href="" onclick="chongzhi(50)"><div class="chongzhi" id="chongzhi">
                50租币
            </div></a></li>
    <li><a href="" onclick="chongzhi(100)"><div class="chongzhi" id="chongzhi">
            100租币
        </div></a></li>
    <li><a href="" onclick="chongzhi(200)"><div class="chongzhi" id="chongzhi">
            200租币
        </div></a></li>
    <li><a href="" onclick="chongzhi(500)"><div class="chongzhi" id="chongzhi">
            500租币
        </div></a></li>
    <li><a href="" onclick="chongzhi(1000)"><div class="chongzhi" id="chongzhi">
            1000租币
        </div></a></li>
</ul>
    <div style="clear: both;">
    </div>
   <div style="text-align: center"><input type="text" placeholder="其它面额" id="elseCoins"><input type="button" onclick="chongzhi1()" name="chongzhiButton" class="chongzhiButton" value="充值"></div>
    <div id="tips" style="color: red;text-align: center;font-size:12px; "></div>
    <span style="color: red">*</span>说明;1个租币等于实际金额为1元人民币
</fieldset>
</div>
<script>
    function chongzhi(num) {

            var myMessage = confirm("确定充值" + num + "租币吗？");
            if (myMessage == true) {
                window.location.href = "chongzhi.php?coins=" + num;
                window.event.returnValue = false;
            } else {
                window.location.href = 'user_index.php#myCoins';
                window.event.returnValue = false;
            }
        }
    function chongzhi1() {
        var num = document.getElementById('elseCoins').value;
        if (num == "") {
            document.getElementById('tips').innerHTML = "*请输入具体金额";
            document.getElementById('elseCoins').focus();
        } else {
            var myMessage = confirm("确定充值" + num + "租币吗？");
            if (myMessage == true) {
                window.location.href = "chongzhi.php?coins=" + num;
                window.event.returnValue = false;
            } else {
                window.location.href = 'user_index.php#myCoins';
                window.event.returnValue = false;
            }
        }
    }
</script>
</body>
</html>
