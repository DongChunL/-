<?php
    session_start();
    include 'sql/phpConnectDb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>租赁网-让租赁更简单</title>
    <link rel="stylesheet" href="css/index-context.css">
    <link rel="stylesheet" href="css/slideStyle.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="main/Css/head.css">
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <style>
        /*nav*/
        nav{
            width: 100%;
            background: darkslategrey;
            height: 60px;
        }
        nav li{
            display: inline-block;
            width: 100px;
            text-align: center;
            height: 56px;
            line-height: 56px;
             margin-top: 2px;
            padding-right: 15px;
            padding-left: 15px;
        }
/*        nav li:last-child{
            background-color: red; !* 浏览器不支持时显示 *!
            background-image: linear-gradient(#ffffff, #ff0000);
        }*/
        nav li a{
            color: white!important;
            font-size: 22px!important;
            height: 36px;
            line-height: 36px;
            width: 80px;
            font-weight: bold;
        }
        nav ul li:nth-child(1){
            background: white;
        }
        nav ul li:nth-child(1) a{
            color: darkgreen!important;
        }
        nav a:hover{
            color: yellow!important;
        }
    </style>
</head>
<body>
<!--头部-->
<header class="headerBackground">
    <section class="center">
        <div class="userInfo">
            <ul>
                    <?php
                    if($_SESSION['username']){
                        echo "<li><a href='#' onclick='' style='font-weight: bold;'>". $_SESSION['username']. "</a></li><li><a href='main/User/session/sessionUnset.php'>&nbsp;&nbsp;&nbsp;&nbsp;[退出]</a></li><li><a href='main/User/carSeek.php'>&nbsp;&nbsp;&nbsp;&nbsp;发布求租</a></li><li><a href='main/userCenter/user_index.php'>&nbsp;&nbsp;&nbsp;&nbsp;用户中心</a></li>";
                    }else{
                        echo "<li><a href=\"main/register.html\">免费注册</a></li><li><a href='main/login.php'>&nbsp;&nbsp;&nbsp;&nbsp;登录</a></li>";
                        }?>
            </ul>
        </div>
<!--        <div class="headerBody">
            <img src="image/Logo.jpg" alt="自行车租赁网">
            <div class="headerSearch">
                <div class="searchTab">
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
                <img src="image/new_tel.gif" alt="400-666-9089">
            </div>
        </div>-->
    </section>
</header>
<!--导航-->
<nav class="navigation">
    <section class="center">
    <ul>
        <ul>
            <li><a href="index.php">首页</a></li>
            <li><a href="main/User/publicInfos.php">出租信息</a></li>
            <li><a href="main/User/seekInfos.php">求租信息</a></li>
            <Li><a href="main/User/newInfos.php">租赁资讯</a></Li>
            <Li><a href="main/User/help.php">帮助中心</a></Li>
            <Li><a href="main/User/about.php">关于我们</a></Li>

        </ul>
    </ul>
    </section>
</nav>
<!--主体-->
    <div class="body-wrapper" class="container">
        <div class="body-left">
            <article>
                <section class="slide">
                    <div id="slide-holder">
                        <div id="slide-runner">
                            <a href="main/User/news.php?id=33"><img id="slide-img-1" src="image/Bikes/bicycles_parking_city_106198_3840x2160.jpg" class="slide" alt="" /></a>
                            <a href="main/User/news.php?id=34"><img id="slide-img-2" src="image/Bikes/bicycle_steering_wheel_evening_165351_3840x2400.jpg" class="slide" alt="" /></a>
                            <a href="main/User/news.php?id=38"><img id="slide-img-3" src="image/Bikes/bicycle_grass_trees_115692_3840x2160.jpg" class="slide" alt="" /></a>
                            <a href="main/User/news.php?id=35"><img id="slide-img-4" src="image/Bikes/bicycle_street_yellow_116535_3840x2160.jpg" class="slide" alt="" /></a>
                            <a href="main/User/news.php?id=37"><img id="slide-img-5" src="image/Bikes/bicycles_parking_street_106429_3840x2160.jpg" class="slide" alt="" /></a>
                            <a href="main/User/news.php?id=24"><img id="slide-img-6" src="image/Bikes/bikes_citybike_wheel_106241_3840x2160.jpg" class="slide" alt="" /></a>
                            <a href="main/User/news.php?id=29"><img id="slide-img-7" src="image/Bikes/bicycle_parking_wheel_115883_3840x2160.jpg" class="slide" alt="" /></a>
                            <div id="slide-controls">
                                <p id="slide-client" class="text"><strong>阅读推荐: </strong><span></span></p>
                                <p id="slide-desc" class="text"></p>
                                <p id="slide-nav"></p>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        if(!window.slider) var slider={};slider.data=[{"id":"slide-img-1","client":"共享单车热潮“降温” 太原公共自行车租骑量“回暖” ","desc":""},{"id":"slide-img-2","client":"八通线通州段将设自行车租赁网点 明年启动建设 ","desc":""},{"id":"slide-img-3","client":"租赁自行车坏了应及时更新","desc":""},{"id":"slide-img-4","client":"成都将再设上千租赁点位 摆6万辆公共自行车 ","desc":""},{"id":"slide-img-5","client":"新疆库尔勒27岁小伙开自行车租赁店 每月仅10元 ","desc":""},{"id":"slide-img-6","client":"江西：公园景区自行车租赁大幅涨价最高罚500万元","desc":""},{"id":"slide-img-7","client":"春暖花开骑行正当时！青岛公共自行车日均租还量超4000次 ","desc":""}];
                    </script>
                </section>
                <section class="newsList">
                    <div class="news-title">
                        <h2><a href="main/User/publicInfos.php">最新出租信息</a></h2>
                    </div>
                    <div class="news">
                        <?php
                        $sql = "SELECT * FROM  carpublic order by publicId desc limit 3";
                        if(!$query = mysqli_query($link,$sql)){
                            echo mysqli_error($link);
                            exit();
                        }
                       while($arr = mysqli_fetch_array($query)):
                           $publicId = $arr['publicId'];
                        $tup_sql = "select photoUrl from tup where public_Id = '$publicId'";
                        $tup_query = mysqli_query($link,$tup_sql);
                        $tup = mysqli_fetch_row($tup_query);
                        ?>
                        <div class="new-1">
                            <a href="main/User/bikeDetail.php?id=<?php echo $arr['publicId']?>">
                                <div class="triangle"></div>
                                <img src="<?php echo $tup[0]?>" alt=""><seciton class="content">
                                <h3><?php echo  $arr['publicTitle']?></h3>
                                <hr>
                                <p><?php
                                    if(strlen($arr['publicDescribe'])>=50)
                                    {
                                        $article = mb_substr($arr['publicDescribe'],0,50,"utf-8");
                                        echo $article.'...';
                                    }else
                                    {echo $arr['publicDescribe'];}?></p>
                            </seciton>
                            </a>
                        </div>
                        <?php endwhile;?>
                    </div>
                </section>
            </article>
        </div>
        <div class="body-right">
            <aside>
                <section class="activeList">
                    <div class="essay-title">
                        <h2><a href="main/User/newInfos.php">最新租赁资讯</a></h2>
                    </div>
                    <div class="active-news">
                        <div class="active-left">
                            <ul>
                                <?php
                                $news_sql = "SELECT * FROM news order by id desc limit 8";
                                $news_query = mysqli_query($link,$news_sql);
                                while($news_arr = mysqli_fetch_array($news_query)):
                                    ?>
                                    <li><a href="main/User/news.php?id=<?php echo $news_arr['id']?>"><?php
                                            echo  $news_arr['title'];?></a></li>
                                <?php endwhile;?>
                            </ul>
                        </div>
                    </div>
                </section>
                <section class="recruit">
                    <div class="recruit-title">
                        <h2><a href="">最新网友留言</a></h2>
                    </div>
                    <section class="recruit-information">
                        <ul>
                            <?php
                            $comment_sql = "SELECT * FROM comment order by commentId desc limit 7";
                            $comment_query = mysqli_query($link,$comment_sql);
                            while($comment_arr = mysqli_fetch_array($comment_query)):
                                ?>
                                <li><a href="main/User/bikeDetail.php?id=<?php echo $comment_arr['public_Id']?>"><?php
                                        echo  $comment_arr['commentWho'].'说：'.$comment_arr['commentWhat'];?></a></li>
                            <?php endwhile;?>
                        </ul>
                    </section>
                </section>
                <section class="contact">
                    <div class="contact-title">
                        <h2><a href="main/User/help.php">帮助中心</a></h2>
                    </div>
                    <section>
                        <a href="main/User/help.php"><img src="images/about_13.jpg" alt=""></a>
                    </section>
                </section>
            </aside>
        </div>
    </div>
<br>
<!--尾部-->
<footer>
    <section class="footerTop center">
        <ul>
            <li><a href="">租赁简介</a></li>
            <li><a href="">意见反馈</a></li>
            <li><a href="">广告服务</a></li>
            <li><a href="">法律声明</a></li>
            <li><a href="">联系我们</a></li>
            <li><a href="">商务合作</a></li>
            <li><a href="">服务条款</a></li>
            <li><a href="">支付方式</a></li>
        </ul>
    </section>
    <section class="footerBottom center">
        Copyright ©2008－2020 All Rights Reserved. 版权所有：<a href="">自行车租赁网</a> 赣ICP证050123号
    </section>
</footer>
</body>
</html>