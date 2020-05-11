<!DOCTYPE html>
<?php
if($_GET['name']!=""){
    $username=$_GET['name'];
}
//消除会话
/*session_start();
if(isset($_SESSION['username'])){
//     var_dump(session_name());die();
    session_unset();
    session_unset($_SESSION['username']);
    session_destroy();//销毁一个会话中的全部数据
    setcookie(session_name(),'');//销毁与客户端的联系
//    echo "<script>alert('注销成功！');location.href='login.php';</script>";
}else{
//    echo "<script>alert('在摧毁页面注销成功！');</script>";
}*/
?>
<html>
<head>
    <meta charset="utf-8">
    <title>房屋租赁网站 - 后台登录</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <script src="../js/login.js"></script>
    <script type="text/javascript" src="../js/yanzm.js"></script>
</head>
<body>
<div class="login_bg">
    <div class="login_logo">
        <h1>自 行 车 在 线 租 赁 管 理 系 统</h1>
    </div>
    <fieldset style="min-height:421px;">
        <legend>骑行伴你好心情！</legend>
        <form action="Success.php" method="post" class="form1" onsubmit="checkLogin()">
            <input type="hidden" name="checkInfo" value="adminLogin">
            <table>
                <tr>
                    <td class="tdFloat "><img src="../image/icons/user.png" class="user_img"alt=""><input type="text"  placeholder="用户名" name="username" id="username" onblur="checkname()"><span id="tipUserName"></span></td>
                </tr>
                <tr>
                    <td class="tdFloat "><img src="../image/icons/key.png" class="key_img" alt=""><input type="password" placeholder="密码" name="passwd" id="passwd" onblur="checkpasswd()"><span id="tipPassWord"></span></td>
                </tr>
                <tr>
                    <td class="tdFloat"><img src="../image/icons/checkD.png" class="check_img" alt=""><input type="text" id="code_input" value="" placeholder="请输入验证码"/><div id="v_container" style="width: 110px;height: 46px;"></div><span style="color: red"><?php if($_GET['res']!=""){echo '*验证码错误';}?></span><div style="clear: both;"></div></td><!--<button id="my_button">验证</button>-->
                </tr>
                <tr>
                    <td style="text-align: center"><p  id="tipInfo" style="text-align: center"><?php if($_GET['info']=="注册成功"){echo "注册成功！用户名：<font color='red'>".$username."</font>";}else if($_GET['error']=="用户名或密码错误"){echo "<span style='color: red;'> *用户名或密码错误</span>";}?></p></td><!--<button id="my_button">验证</button>-->
                </tr>
                <tr>
                    <td   colspan="2" class="srButton"><input type="submit" name="submit1" id="submit" value="登录" /><br></td>
                </tr>
            </table>
            <div class="aside" style="margin-top: 160px;"><a href="../User/pwd.php">·找回密码·</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../User/pwd.html">·修改密码·</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php">·游客登录·</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="login.php" title="前台登录">·前台用户登录·</a></div>
        </form>
    </fieldset>
</div>
<script>
    var verifyCode = new GVerify("v_container");
    document.getElementById("submit").onclick = function(){
        var res = verifyCode.validate(document.getElementById("code_input").value);
        if(!res){
            /*            alert("验证码错误");*/
            document.getElementsByTagName('form')[0].action="Success.php?res="+res;
        }
    }
</script>
<script src="../js/clearInputHistory.js"></script>
</body>
</html>