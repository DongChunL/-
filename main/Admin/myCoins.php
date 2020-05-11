<?php
include '../../sql/phpConnectDb.php';
if (isset($_POST['user'])||isset($_GET['user'])){
    if (isset($_POST['user'])){
        $user = $_POST['user'];
    }else if (isset($_GET['user'])){
        $user = $_GET['user'];
    }
    //用户
    $sql ="SELECT username FROM users WHERE username = '$user'||id='$user'";
    $query = mysqli_query($link,$sql);
    if(!$user_result= mysqli_fetch_row($query)){
        $money=0;
        $tip = 1;/*"*不存在该用户ID/用户名"*/
    }else {
        $user = $user_result[0];
        $sql = "SELECT money,username FROM money WHERE username = '$user'";
        $query = mysqli_query($link, $sql);
        if (!$result = mysqli_fetch_row($query)) {
            $money = 0;
            $tip = 2;/*"*无充值账户记录"*/
        } else {
            $money = $result[0];
        }
    }
}

?>
<html>
<head>
    <meta charset="utf-8">
    <style>
   /*     .coinCenter{
            width: 630px;
            height: 400px;
            border: 1px solid black;
!*            text-align: center;*!
            margin: 0 auto;
        }*/
       .coinCenter li{
            list-style:none;
            float: left;
            margin: 20px 20px;
        }
        .coinCenter .chongzhi{
            width: 100px;
            height: 100px;
            background: white;
            font-size: 18px;
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
            font-size: 18px;
        }

        .coinCenter .confirmButton{
            background-color: rgb(0, 191, 255);
            color: white;
            border: 0;
            display: inline-block;
            vertical-align: top;
            /*            margin-top: 10px;*/
            height: 40px;
            width: 85px;
            font-size: 18px;
        }
        .coinCenter .confirmButton:hover{
            background-color: rgb(0, 160, 255);
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
            font-size: 18px;
        }
        .coinCenter .chongzhiButton:hover{
            background-color: rgb(0, 160, 255);
        }

        .coinCenter .user ,#elseCoins{
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
<form action="myCoins.php" method="post">
<div class="mainBorder" style="float: left;">
    <fieldset id="manageUser" class="coinCenter" style="height:680px;width: 900px;">
        <legend style="font-size: 24px;color: #666;">充值中心</legend>
        <input type="hidden" id="nametip" value="<?php if (isset($_POST['user'])||isset($_GET['user'])){echo $user_result[0];}?>">
        <div style="text-align: center;"><input type="text" name="user"  id='user'autocomplete="off" placeholder="用户ID/用户名" class="user"><input type="submit" onclick="confirmButton()" name="confirmButton" class="confirmButton" value="确定"></div>
        <?php
        if ($tip==1&&isset($_POST['user'])){?>
            <p style="color:red">*不存在该用户ID/用户名</p>
        <?php } else if(isset($_POST['user'])||isset($_GET['user'])){?>
        <div>
            <p>用户名：<span id="username" style="color:red"><?php echo $user_result[0]?></span>&nbsp;&nbsp;余额：<span style="color:red"><?php echo $money?></span>租币</p>
        </div>
        <?php }?>
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

            <div style="text-align: center;"><input type="text" autocomplete="off" placeholder="其它面额" id="elseCoins"><input type="button" onclick="chongzhi1()" name="chongzhiButton" class="chongzhiButton" value="充值"></div>
        <div style="clear: both;">
        </div>
        <div id="tips" style="color: red;text-align: center;font-size:12px; "></div>
        <span style="color: red;font-size: 12px;">*</span><span style"font-size: 12px;">说明;1个租币等于实际金额为1元人民币</span>
    </fieldset>
</div>
</form>
<script>
    (function(){
        document.getElementById('user').focus();
    })();
    function chongzhi(num){
        var username = document.getElementById('nametip').value;
        if (username== ""){
            document.getElementById('user').focus();
            document.getElementById('user').setAttribute('style','outline-color: red; -webkit-box-sizing: border-box; -moz-box-sizing: border-box;box-sizing: border-box;height: 40px;width: 180px; font-size: 18px;');
            document.getElementById('tips').innerHTML="*未填写用户ID/用户名";
            window.event.returnValue =false;
            return false;
        }
        var myMessage = confirm("确定充值"+num+"租币吗？");
        if(myMessage==true){
            window.location.href="chongzhi.php?coins="+num+"&username="+username;
            window.event.returnValue=false;
        }else{
            window.event.returnValue=false;
        }
    }

    function chongzhi1(){
        var username = document.getElementById('nametip').value;
        if (username== ""){
            document.getElementById('tips').innerHTML="*未填写用户ID/用户名";
            document.getElementById('user').focus();
            document.getElementById('user').setAttribute('style','outline-color: red; -webkit-box-sizing: border-box; -moz-box-sizing: border-box;box-sizing: border-box;height: 40px;width: 180px; font-size: 18px;');
            return false;
        }
        var num = document.getElementById('elseCoins').value;
        if(num=="") {
            document.getElementById('tips').innerHTML="*请输入具体金额";
            document.getElementById('elseCoins').focus();
        }else{
            var myMessage = confirm("确定充值"+num+"租币吗？");
            if(myMessage==true){
                window.location.href="chongzhi.php?coins="+num+"&username="+username;
                window.event.returnValue=false;
            }else{
                window.event.returnValue=false;
            }
        }
    }
    function confirmButton(){
        var username = document.getElementById('username');
        username.setAttribute('readonly','readonly');
    }
</script>
</body>
</html>
