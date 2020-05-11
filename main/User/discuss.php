<?php
include'../model/head.php';
?>
    <html>
    <head>
        <meta charset="utf-8">
        <title>租赁问答</title>
        <style>
            /*nav*/
            nav{
                width: 100%;
                background: url("../../image/main_nav_bg.jpg")repeat-x;
                height: 40px;
            }
            nav li{
                display: inline-block;
                border-right: 1px solid rgb(80,200,10);
                width: 80px;
                text-align: center;
                height: 36px;
                margin-top: 2px;
                padding-right: 15px;
                padding-left: 15px;
            }
            nav li:last-child{
                background-color: red; /* 浏览器不支持时显示 */
                background-image: linear-gradient(#ffffff, #ff0000);
            }
            nav li a{
                color: white!important;
                font-size: 16px!important;
                height: 36px;
                line-height: 36px;
                width: 80px;
                font-weight: bold;
            }
            nav ul li:nth-child(5){
                background: white;
            }
            nav ul li:nth-child(5) a{
                color: darkgreen!important;
            }
            nav a:hover{
                color: yellow!important;
            }
        </style>
    <body>
    <!--导航-->
    <nav class="navigation">
        <section class="center">
            <ul>
                <li><a href="../../index.php">首页</a></li>
                <li><a href="publicInfos.php">出租信息</a></li>
                <li><a href="seekInfos.php">求租信息</a></li>
                <Li><a href="newInfos.php">租赁资讯</a></Li>
                <Li><a href="about.php">关于我们</a></Li>
                <Li><a href="help.php">帮助中心</a></Li>
                <li><a href="onlinePredict.php">在线预订</a></li>
            </ul>
        </section>
    </nav>
    </body>
    </html>
<?php
include '../model/footer.html';
?>