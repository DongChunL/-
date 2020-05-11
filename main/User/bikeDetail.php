<?php
include'../model/head.php';
include'../../sql/phpConnectDb.php';
$publicId = $_GET['id'];
$sql = "SELECT * FROM carpublic WHERE publicId ='$publicId'";
if($result = mysqli_query($link,$sql)){
    $arr = mysqli_fetch_row($result);
}
?>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width:device-width,user-scalable=no,initial-scale=1">
        <title>自行车租赁 - 详情介绍</title>
        <link href="../Css/nav.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../Css/headso.css">
        <link rel="stylesheet" href="../Css/global.css">
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
                    <Li><a href="help.php">帮助中心</a></Li>
                    <Li><a href="about.php">关于我们</a></Li>
                </ul>
            </ul>
        </section>
    </nav>
    <form id="form1" method="post" action="" height="1386px">
        <div id="seat"></div>
        <div  class=" bodyMid">
            <div class="conLeft">
                <div class="conTop">
                    <h1>
                        <strong id="ProductTitle"><?php echo $arr[1];?></strong>
                    </h1>
                </div>
                <div class="conTopInfo">
                    租品编号：<span id="LblID"><?php echo $arr[0];?></span>
                    <span class="jiange"></span>浏览量：<span id="LblTouch" class="red">3836</span>
                    <span class="jiange"></span>更新时间：<span id="LblTime"><?php echo $arr[17];?></span><span class="jiange"></span><span class="jiange"></span><span class="jiange"></span><span class="jiange"></span><span class="jiange"></span><span class="jiange"></span>
                    <img src="../../image/icons/con_fav.gif">&nbsp;<a href="javascript:void(null);" id="imgkeep" onclick="ShowWindow('1','199199');$('#mask').show();">收藏</a>
                    <img src="../../image/icons/con_tuijian.gif">&nbsp;<a href="javascript:DoCommend();">推荐</a>
                    <img src="../../image/icons/con_jvbao.gif">&nbsp;<a href="javascript:void(null);" id="imgreport" onclick="ShowWindow('4','199199');$('#mask').show();">举报</a>
                </div>
                <ul class="conInfoTop"><li><span class="greyFont">面向城市：</span><?php echo $arr[3].$arr[4]?></li><li><span class="greyFont">租　　金：</span><span class="money"><?php echo $arr[7]?></span><span class="red"><?php echo $arr[8]?></span>&nbsp;<span class="green"></li><li><span class="greyFont">押　　金：</span><span class="money"><?php echo $arr[9]?>元</span></li><li><span class="greyFont">数　　量：</span>1</li><li><span class="greyFont">最短租期：</span><?php echo $arr[10]?></li><li><span class="greyFont">付款要求：</span><?php echo $arr[11]?></li></ul><div class="clear">
                </div>
                <div class="space">
                </div>
                <div>
                    <table width="100%" height="" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                            <td width="22%">
                                <a href="javascript:void(null);" id="imgRent">
                                    <img src="../../image/icons/zuyong.jpg" alt="我要租用" onclick="window.location.href='order.php?id=<?php echo $_GET['id']?>'"></a>
                            </td>
                            <td width="22%">
                                <a href="javascript:void(null);" id="imgsendimg1" onclick="SendMsg('25776');">
                                    <img src="../../image/icons/lianxi_btn.jpg" alt="联系出租方"></a>
                            </td>
                            <td rowspan="2" width="52%">
                            </td>
                        </tr>
                        </tbody></table>
                </div>
                <div class="newConTitle">
                    详细信息&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="#pic">租品图片</a></span>&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="#msg">网友留言</a></span>
                </div>
                <div class="qzCon" id="AllInfo">
                    <p id="Content"><?php echo $arr[12];?>
                        下订单即可查看我的联系方式，联系我时请说是在自行车租赁网站上看到的，谢谢。
                    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" style="margin-top: 10px;
                    margin-bottom: 10px;">
                        <span class="bds_more">更多</span><a class="bds_qzone" title="分享到QQ空间" href="#"></a><a class="bds_tsina" title="分享到新浪微博" href="#"></a>
                        <a class="bds_tqq" title="分享到腾讯微博" href="#"></a><a class="bds_renren" title="分享到人人网" href="#"></a>
                    </div>

                    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;mini=1" src="http://bdimg.share.baidu.com/static/js/bds_s_v2.js?cdnversion=440598"></script>



                    <script type="text/javascript">
                        //在这里定义bds_config
                        var bds_config = { 'bdPic': 'http://www.zulinbao.com/AllImg/Up/201904/080034034685e.jpg' };
                        document.getElementById('bdshell_js').src = "http://share.baidu.com/static/js/shell_v2.js?t=" + new Date().getHours();
                    </script>

                    <div class="clear">
                    </div>
                    <!-- Baidu Button END -->
                    <a name="pic"></a>
                    <div id="gallery">
                        <table cellspacing="8" cellpadding="0"><tbody>
                            <tr></tr>
                            <!--图片-->
                            <tr>
                                <?php
                                $sql = "SELECT * FROM tup WHERE public_Id = '$publicId'";
                                if($query = mysqli_query($link,$sql)){
                                    $i = 0;
                                    while($arr = mysqli_fetch_array($query)){
                                        $i++;

                                ?><td style="width:150px;height:150px;border:1px #ccc solid;padding-right:0px;" valign="middle" align="center"><a name="lightimg" href="<?php echo '../../'.$arr[1];?>" title=""><img style="vertical-align:middle; border:0;width: 150px;height: 150px;" src="<?php echo '../../'.$arr[1];?>"></a><br></td>
                           <?php }}?>
                            </tr>
                            </tbody></table></div>
                    <table style="width: 100%;">
                        <tbody><tr>
                            <td style="width: 50%;">
                                <!--上一页-->
                                <?php
                                $sql = "SELECT publicTitle,publicId FROM carpublic where publicId = (select publicId from carpublic where publicId<'$publicId' order by publicId desc limit 1)";
                                $query = mysqli_query($link,$sql);
                                $arr = mysqli_fetch_row($query);
                                ?>
                                <a href="bikeDetail.php?id=<?php echo $arr[1];?>" id="LinkPrev" title="自行车出租">
                                    <img src="../../image/icons/image183.gif" id="previmg" style="vertical-align: middle;" alt="上一个">&nbsp;<span id="LblPrev" style="font-size:12px;"><?php echo $arr[0];?></span></a>
                            </td>
                            <td style="text-align: right;">
                                <!--下一页-->
                                <?php
                                $sql = "SELECT publicTitle,publicId  FROM carpublic where publicId =(select publicId from carpublic where publicId>'$publicId' order by publicId asc limit 1)";
                                $query = mysqli_query($link,$sql);
                                $arr = mysqli_fetch_row($query);
                                ?>
                                <a href="bikeDetail.php?id=<?php echo  $arr[1];?>" id="LinkNext" title="自行车出租">
                                    <span id="LblNext" style="font-size:12px;"><?php echo $arr[0];?></span>&nbsp;<img src="../../image/icons/image182.gif" id="nextpic" style="vertical-align: middle;" alt="下一个"></a>
                            </td>
                        </tr>
                        </tbody></table>
                </div>


                <div class="conTitle" id="Div1">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                            <td style="font-size: 14px;" width="90%">
                                留言板
                            </td>
                            <td class="goTop" width="10%">
                                <img src="../../image/icons/top_icon.gif" style="vertical-align: middle;" alt="返回顶部">&nbsp;<a href="#seat">返回顶部</a>
                            </td>
                        </tr>
                        </tbody></table>
                </div>

         <!--       //显示评分-->
                <div class="conBorder">
                <?php
                $sql = "SELECT * FROM comment WHERE public_Id = ".$_GET['id'];
                if($query = mysqli_query($link,$sql)){
                    while ($arr = mysqli_fetch_array($query)){?>
                        <div class="noneBackcolor">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody><tr>
                                                <td width="80%" height="27">
                                                    <span class="blue">
                                                        <span id="Repeater1_Label1_0"><?php echo $arr[1];?></span></span>
                                                    说：
                                                </td>
                                                <td width="20%">


                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="word-break: break-all;" width="80%">
                                                 <img src="images/left_yh.gif" id="Repeater1_Img2_0" style="vertical-align: text-top;" width="12" height="10">
                                                    <?php
                                                        echo $arr[2];
                                                    ?>
                                             <img src="images/right_yh.gif" id="Repeater1_Img3_0" style="vertical-align: text-top;" width="12" height="10">
                                                </td>
                                                <td width="20%" style="font-size: 10px">
                                                    <?php echo $arr[3]?>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                        <?php
                    }
                }else if(empty($arr)){?>
                    <div class="pfData">暂无评论！</div>
                <?php }?>
                </div>
                <div class="conTitle" id="msg">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                            <td style="font-size: 14px;" width="90%">
                                网友留言
                            </td>
                            <td class="goTop" width="10%">
                                <img src="../../image/icons/top_icon.gif" style="vertical-align: middle;" alt="返回顶部">&nbsp;<a href="#seat">返回顶部</a>
                            </td>
                        </tr>
                        </tbody></table>
                </div>
                <div class="conBorder">
                    <div id="UpdatePanel1">


                        <table style="width: 98%; border-top: 1px #E4E4E4 solid;" align="center">
                            <tbody><tr>
                                <td align="right">

                                    <!-- AspNetPager V7.2 for VS2005 & VS2008  Copyright:2003-2008 Webdiyer (www.webdiyer.com) -->
                                    <!--记录总数只有一页，AspNetPager已自动隐藏，若需在只有一页数据时显示AspNetPager，请将AlwaysShow属性值设为true！-->
                                    <!-- AspNetPager V7.2 for VS2005 & VS2008 End -->



                                    <table>
                                        <tbody><tr>
                                            <td style="width: 7px">&nbsp;

                                            </td>
                                            <td>
                                                <span id="lblnum">共<font color="red">0</font>条记录</span>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </td>
                            </tr>
                            </tbody></table>
                        <table onkeypress="handleEvent(event, 'btnOk')" width="97%" height="175" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody><tr>
                                <td style="height: 25px; padding-left: 10px; color: #000; padding-top: 5px;">
                                    留言：<span></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 90px; padding-left: 10px;">
                                    <textarea name="txtContent" rows="2" cols="20" id="txtContent" class="inputAuto" style="height:86px;width:670px;"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px; height: 40px;" valign="top">
                                    <?php if($_GET['info']=='1'){?><span style="color: red;">*登录之后才能评论，请点击此处<a href="../login.php" style="text-decoration: none;color:blue;">登录</a></span><?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 37px; padding-left: 10px;">
                                    <table cellspacing="0" cellpadding="0" border="0">
                                        <tbody><tr>
                                            <td style="height: 34px">
                                                <input name="btnOk" id="btnOk" src="../../image/icons/ask_btn.jpg" onclick="var text = document.getElementsByTagName('textarea')[0].value;window.location.href='checkComment.php?id=<?php echo $_GET['id'];?>&&txtContent='+text;return false;" type="image">
                                                <img id="graybtnok" alt="正在提交" style="display: none;" src="../../image/icons/ask_graybtn.jpg">
                                            </td>
                                            <td style="height: 34px">
                                                &nbsp;&nbsp;&nbsp;&nbsp;<span id="lblState"></span>
                                                &nbsp;&nbsp;&nbsp;<img src="../../image/icons/con_r2_c4.gif">温馨提示：登录后留言可获 <span class="money">
                                                    <span id="lblIntegral1">1</span>
                                                </span>积分。最多<span class="money" id="spanWord">200</span>个字。
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </td>
                            </tr>
                            </tbody></table>
                        <br>

                        <script type="text/javascript" src="../../js/SmartHint.js" defer="defer">
                        </script>
                    </div>
                </div>
                <div id="mpekeep_backgroundElement" style="display: none; position: fixed; left: 0px; top: 0px;"></div><div id="mpereport_backgroundElement" style="display: none; position: fixed; left: 0px; top: 0px;"></div><div id="mpesendimg_backgroundElement" style="display: none; position: fixed; left: 0px; top: 0px;"></div><div id="mpefriend_backgroundElement" style="display: none; position: fixed; left: 0px; top: 0px;"></div></div>
            <div style="clear: both;"></div>
        </div>
    </form>
    </body>
    <?php
    include'../model/footer.html';
    ?>
    </html>
