<html>
<head>
    <meta charset="utf-8">
    <style>
        .setPassword{
     /*       width: 200px;*/
            height: 200px;
/*            border: 1px solid black;*/
        }
        .setPassword tr{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<fieldset id="manageUser" style="height:680px;width: 900px;">
    <legend style="font-size: 24px;color: #666;">修改密码</legend>
<div class="setPassword">
    <form action="changeOldPassword.php" method="post">
    <table>
        <tr>
            <td><span>原密码</span></td><span class="tipOld"></span>
        </tr>
    <tr><td><input type="password" style="height: 30px;"name="oldPassword" id="oldPassword"></td></tr>
        <tr>
            <td><span>新密码</span></td>
        </tr>
    <tr><td><input type="password" style="height: 30px;"name="newPassword" id="newPassword"></td></tr>
        <tr>
            <td><span>确认密码</span></td>
        </tr>
        <tr><td><input type="password"style="height: 30px;" name="confirmPassword" id="confirmPassword"></td></tr>

        <tr>
            <td><input type="submit" name="submit" class="submit" style="width: 50px;height: 30px;"value="提交" onclick="passwordIsEqual()"></td>
        </tr>
        <?php
        session_start();
        if (isset($_SESSION['tip'])){
            $tip = $_SESSION['tip'];
            unset($_SESSION['tip']);
  /*          echo $tip;*/
            if ($tip == 1){
                echo "<tr><td><span>*密码修改成功，建议</span><a href='../User/session/sessionUnset.php' style='color: blue;'>重新登录</a></td></tr>";
            }else if ($tip ==2){
                $tips ="*原密码错误";
            }
        }
        ?>
        <tr>
            <td><span id="tips"><?php  echo $tips?></span></td>
        </tr>
    </table>
    </form>
</div>
</fieldset>
<script>
    function passwordIsEqual(){
        var oldPassword = document.getElementById('oldPassword').value;
        var newPassword = document.getElementById('newPassword').value;
        var confirmPassword = document.getElementById('confirmPassword').value;
        if(oldPassword == newPassword){
            document.getElementById('tips').innerHTML = "*新密码不能与旧密码相同！";
         /*   window.location.href='#';*/
            window.event.returnValue=false;
        }else if( newPassword.length<6){
            document.getElementById('tips').innerHTML = "*密码设置太过简单！密码长度请不低于6位数";
            window.event.returnValue=false;
        }else if (newPassword != confirmPassword) {
            document.getElementById('tips').innerHTML = "*确认密码不一致！请重新输入";
            window.event.returnValue=false;
        }
    }
</script>
</body>
</html>
