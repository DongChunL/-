<?php
/*    session_start();
    $sessionUser = session_id($_GET['username']);
    session_write_close();*/
session_start();
//echo $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/head.css">
</head>
<body>
<!--头部-->
<header class="headerBackground">
    <section class="center">
        <div class="userInfo">
            <ul>
                <?php
                if($_SESSION['username']){
                    echo "<li><a href='#' onclick='' style='font-weight: bold;'>". $_SESSION['username']. "</a></li><li><a href='../User/session/sessionUnset.php'>&nbsp;&nbsp;&nbsp;&nbsp;[退出]</a></li><li><a href='../User/carSeek.php'>&nbsp;&nbsp;&nbsp;&nbsp;发布求租</a></li><li><a href='../userCenter/user_index.php'>&nbsp;&nbsp;&nbsp;&nbsp;用户中心</a></li>";
                }else{
                    echo "<li><a href=\"../register.html\">免费注册</a></li><li><a href='../login.php'>&nbsp;&nbsp;&nbsp;&nbsp;登录</a></li>";
                }?>
            </ul>
        </div>
  <!--      <div class="headerBody">
            <img src="../../image/Logo.jpg" alt="自行车租赁网">
            <div class="headerSearch">
                <div class="searchTab" id="searchTab">
                    <ul>
                        <li class="tabBackground"><a href=""   id="searchTab">出租</a></li>
                        <li><a href="">求租</a></li>
                        <li><a href="">租赁资讯</a></li>
                        <li><a href="">租赁商家</a></li>
                    </ul>
                </div>
                <div class="searchText">
                    <input type="text" placeholder="请输入搜索关键字"><input type="button" name="searchKey" value="搜索">
                </div>
                <span><a href="https://www.baidu.com">高级搜索</a></span>
                <img src="../../image/new_tel.gif" alt="400-666-9089">
            </div>
        </div>-->
    </section>
</header>
<script>
    (function(){
        var arr = document.getElementById('searchTab').getElementsByTagName('li');
    })();
</script>
</body>

</html>
