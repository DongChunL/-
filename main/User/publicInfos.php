<?php
include '../../sql/phpConnectDb.php';
include'../model/head.php';

//去掉多余的字
function cut_str($str, $length)
{
    if (mb_strlen($str, 'UTF-8') > $length) {
        return mb_substr($str, 0, $length, 'UTF-8') . '...';
    } else {
        return $str;
    }
}
//用*替换电话号码
/*function replace_str($str,$pattern,$replacement){
    return preg_replace($pattern,$replacement,$str);
}*/
?>
<html>
<head>
    <meta charset="utf-8">
    <title>出租信息</title>
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
        nav ul li:nth-child(2){
            background: white;
        }
        nav ul li:nth-child(2) a{
            color: darkgreen!important;
        }
        nav a:hover{
            color: yellow!important;
        }
    </style>
    <style>
        #manageUser{
            margin: 0 auto;
            width: 960px;
        }
        td[class^='to'] a:hover{
            color: red!important;
        }
        .contact_imgs{
            font-size: 15px;

        }
        .contact_imgs img{
            width: 15px;
            height: 15px;
        }
        .contact_imgs div{
            height: 23px;
            display: inline-block;
            vertical-align: middle;
            text-align: left;
        }
        td{
            text-align: left;
            padding-top: 10px;
        }
        .toTitles{
            width: 300px;
        }
        .toRents{
            width: 130px;
        }
        .toSevers{
            width: 160px;
        }
        .toPerson{
            width: 90px;
            padding-right: 15px;
        }
        .toContacts{
            width: 220px;
        }
        .toAddress{
            width: 250px;
        }
        .toDo{
            width: 70px;
        }
    </style>
    <link rel="stylesheet" href="../Css/headso.css">
</head>
<body>
<!--导航-->
<nav class="navigation">
    <section class="center">
        <ul>
            <li><a href="../../index.php">首页</a></li>
            <li><a href="publicInfos.php">出租信息</a></li>
            <li><a href="seekInfos.php">求租信息</a></li>
            <Li><a href="newInfos.php">租赁资讯</a></Li>
            <Li><a href="help.php">帮助中心</a></Li>
            <Li><a href="about.php">关于我们</a></Li>
        </ul>
    </section>
</nav>
<div class="center">
        <h5>您当前所在的位置：<a href="../../index.php" style="color: #666;font-size: 15px;">自行车租赁网</a> &gt;&gt; 出租信息</h5>
    <div style="color: #666;font-size: 12px;float: right;"><?php if($_GET['tipToLogin']=='1'){echo "<img src='../../image/icons/msg_icon.gif'><span id='tipToLogin' style='color: red;'>&nbsp;&nbsp;游客只能浏览，【<a href='../login.php'>登录</a>】后才能进行租赁等相关操作！</span>";}?></div>
    <div style="clear: both"></div>
<fieldset id="manageUser">
    <legend>全国自行车出租</legend>

    <table class="tableUser" border="0" cellspacing="0" cellpadding="0">
        <tr  style="height:40px" bgcolor="#F7F7F7">
            <td class="toTitles">标题</td>
            <td class="toRents">租金</td>
            <td class="toSevers">服务保障</td>
            <td class="toPerson">联系人</td>
            <td class="toContacts">联系方式</td>
            <td class="toAddress">租赁联系地址</td>
            <td class="toDo">操作</td>
        </tr>
        <?php
        $isRent ="未出租";
        $sql = "SELECT * FROM carpublic WHERE isRent ='$isRent' ORDER BY publicId ";
        $query = mysqli_query($link,$sql);

        /*--------------分页---------------*/

        $pagesize = 8; //每页显示 自定义
        if(empty($_GET['upage'])){     //$page;设置当前页 用户自己选择
            $upage = 1;
            $startrow = ($upage -1)*$pagesize; //开始行号($page -1)*$pagesize
        }else{
            $upage = $_GET['upage'];
            $startrow = ($upage - 1)*$pagesize;
        }
        $records = mysqli_num_rows($query);  //总记录数mysqli_num_rows()
        $pages = ceil($records/$pagesize); //总页数 $records/$pagesize ceil()向上取整
        //构建分页sql语句
        $sql = "SELECT * FROM carpublic  WHERE isRent ='$isRent' ORDER BY publicId DESC LIMIT $startrow,$pagesize";
        $query = mysqli_query($link,$sql);
        $usern=1;
        while($arr = mysqli_fetch_array($query)){
            /*
                 echo "<pre>";
                 print_r($arr);
                 echo "</pre>";
                 exit();
             */

            //隔行变色
/*            if($usern%2==0){
                echo "<tr bgcolor='grey'>";
            }else{
                echo "<tr>";
            }*/


            //设置租赁所需权限
            if (isset($_SESSION['username'])) {
                $order_href = "order.php?id=" .$arr[0];
            } else {
                $tipToLogin = '1'; //登录后才能进行租赁操作！
                $order_href = "?tipToLogin=" . $tipToLogin;
            }

   /*         $usern++;*/
            ?>
            <tr>
            <td class="toDetail"><a href="bikeDetail.php?id=<?php echo $arr[0];?>" style="font-size: 15px;font-weight: bold;color: black"><?php echo cut_str($arr[1],10);?></a></td>
            <td style="color: red;"><?php echo $arr[7].$arr[8];?></td>
            <td><img src="../../image/icons/icon33.gif" alt=""><img src="../../image/icons/icon34.gif" alt=""><img src="../../image/icons/icon35.gif" alt=""></td>
            <td style="color: gray;"><?php echo $arr[13];?></td>
            <td class="contact_imgs">
                <div><img src="../../image/icons/tel_icon.gif" alt="">固话：<?php echo substr_replace($arr[15],'****',3,5);?></div><div><img src="../../image/icons/icon_phone.gif" alt="">手机：<?php echo substr_replace($arr[14],'****',3,4);?></div><div><img src="../../image/icons/icon_qqA.gif" alt="">QQ：<?php echo substr_replace($arr[16],'****',1,6);?></div></td>
            <td><?php echo cut_str($arr[3].$arr[4].$arr[5],10);?></td>
            <!--租赁-->
            <td class="toOrder"><a href="<?php echo $order_href;?>">租赁</a></td>
            </tr>
        <?php }?>
        <tr><!--mysqli_num_rows($query)总记录数-->
            <td colspan="5" class='pagelist' bgcolor="white"><?php

                //上一页
                $previous =$upage-1;
                if($previous>0){
                    echo "<a href='?upage=$previous'>上一页</a>";
                }

                //显示页数
                for ($i=1; $i <= $pages; $i++) {
                    # code...
                    if($i==$upage){
                        echo "<span>$i</span>";
                    }
                    else{
                        echo "<a href='?upage=$i' class='pagelist'>$i</a>";
                    }

                }

                //下一页
                $next = $upage+1;
                if($next<=$pages){
                    echo "<a href='?upage=$next'>下一页</a>";
                }
                ?></td>
            <td  bgcolor="white">总数量:<?php echo $records;?>条</td>
        </tr>
    </table>
</fieldset>
</div>
</body>
</html>
<?php
include '../model/footer.html';
?>

