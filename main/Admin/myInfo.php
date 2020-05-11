<?php
include '../../sql/phpConnectDb.php';
session_start();
$username = $_SESSION['admin'];
$sql = "SELECT * FROM admin WHERE username = '$username'";
$query = mysqli_query($link,$sql);
if(!$arr = mysqli_fetch_array($query)){
    echo mysqli_error($link);
}
?>
<style>
    .InfoBox input{
        height: 30px;
    }
    .InfoBox td{
        height: 50px;
    }
    #lastForm td{
        font-size: 20px;
    }
    #lastForm input{
        font-size: 20px;
    }
</style>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<fieldset id="manageUser" style="height:680px;width: 900px;">
    <legend style="font-size: 24px;color: #666;">管理账号</legend>
<div class="InfoBox">
    <form action="updateMyInfo.php" method="post" id="lastForm">
    <table>
        <tr><td>你的账号：<input type="text"width="60px" class="readonly" style="height: 30px;" name="username" readonly="readonly" value="<?php echo $arr['username']?>"></td></tr>
        <tr><td>你设置的邮箱：<input type="text" class="readonly" style="height: 30px;"name="email" value="<?php echo $arr['email']?>"></td></tr>
        <tr><td>绑定的手机：<input type="text" class="readonly" style="height: 30px;"name="phone" value="<?php echo $arr['phone']?>"></td></tr>
        <tr><td>默认联系地址：<input type="text" class="readonly" id="normalAddress" name="userAddress" style="height: 30px;width: 280px;" value="<?php echo $arr['userAddress']?>"></td></tr>
        <tr>
            <td><input type="button" value="修改" onclick="updateInfo()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" id="button01"value="确认" hidden="hidden"onclick="confirms()"></td>
        </tr>
    </table>
    </form>
</div>
</fieldset>
<script>
    //默认样式
   (function(){
        var arrLength = document.getElementsByClassName('readonly').length;
        var normalAddress = document.getElementById('normalAddress');

        for (var i =0; i<arrLength ;i++){
            document.getElementsByClassName('readonly')[i].setAttribute('readonly','readonly');
            document.getElementsByClassName('readonly')[i].setAttribute('style','border:0;outline:none;');
            normalAddress.setAttribute('style','width:280px;border:0;outline:none;');
        }
    })();

   //点击修改时的样式
   function updateInfo(){
       var normalAddress = document.getElementById('normalAddress');
       var arrLength = document.getElementsByClassName('readonly').length;
       for (var i =0; i<arrLength ;i++){
           document.getElementsByClassName('readonly')[i].removeAttribute('readonly');
           document.getElementsByClassName('readonly')[i].setAttribute('style','border:1px solid black;outline:invert;height: 30px;');
           normalAddress.setAttribute('style','width:280px;border:1px solid black;outline:invert;');
           document.getElementById('button01').removeAttribute('hidden');
       }
   }
   //点击后的样式
   function confirms(){
       var normalAddress = document.getElementById('normalAddress');
       var arrLength = document.getElementsByClassName('readonly').length;
       for (var i =0; i<arrLength ;i++){
           document.getElementsByClassName('readonly')[i].setAttribute('readonly','readonly');
           document.getElementsByClassName('readonly')[i].setAttribute('style','border:0;outline:none;');
           normalAddress.setAttribute('style','width:280px;border:0;outline:none;');
       }
/*       window.location.href="updateMyInfo.php";*/
   }
</script>
</body>
</html>