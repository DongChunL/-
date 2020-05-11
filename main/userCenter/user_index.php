<?php
include '../model/head.php';
include '../../sql/phpConnectDb.php';
/*$PHP_SELF=$_SERVER['PHP_SELF'];

$url='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strrpos($PHP_SELF,'/')+1);*/
/*$url='http://'.$_SERVER['HTTP_HOST'];
echo $url;*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>用户中心</title>
    <link id="style" rel="stylesheet" type="text/css" href="../Css/head.css">
    <link id="style" rel="stylesheet" type="text/css" href="css/admincss.css">
    <script src="../../jquery-3.3.1/jquery-3.3.1.js"></script>
<!--    <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>-->
</head>
<body style="text-align: center;text-align: -webkit-center;text-align: -moz-center;margin: 0 auto;">
<form method="post" action="user_index.php" style='margin-top:10px;min-height:650px'>
    <div>
        <table class="main" cellspacing="0" cellpadding="0" border="0">
            <tbody><tr>
                <td width="190" valign="top">
                    <table width="178" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                            <td class="left_border" valign="top" id="form1" >
                                <table id="usermenu" width="178" cellspacing="0" cellpadding="0" border="0"  class="leftNav">
                                    <tbody>
                                    <tr>
                                        <td valign="top">
                                            <table class="left" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                <tr onclick="showMenu('a6',event)">
                                                    <th class="LeftTdBg2 hand" style="text-align: left;">
                                                        基本设置
                                                    </th>
                                                </tr>
                                                <tr id="a6" style="display: none;">
                                                    <td align="left">
                                                        <table style="width: 100%;" cellspacing="0" cellpadding="2" border="0">
                                                            <tbody><tr>
                                                                <td>
                                                                    <a data-id="myInfo"style="color: black;font-size: 20px!important;">个人信息</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a data-id="changePassword"style="color: black;font-size: 20px!important;">修改密码</a>
                                                                </td>
                                                            </tr>
                                                            </tbody></table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                            <table class="left" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                <tr onclick="showMenu('a1',event)">
                                                    <th class="LeftTdBg hand" style="text-align: left;">
                                                        租赁管理
                                                    </th>
                                                </tr>
                                                <tr id="a1" style="display: none;">
                                                    <td align="left">

                                                        <table style="width: 100%;" cellspacing="0" cellpadding="2" border="0">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a data-id="seekManage"style="color: black;font-size: 20px!important;">管理租赁订单</a>
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <table class="left" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                <tr onclick="showMenu('a3',event)">
                                                    <th class="LeftTdBg2 hand" style="text-align: left;">
                                                        <div style="    color: white;font-size: 22px;">
                                                            租币/余额</div>
                                                    </th>
                                                </tr>
                                                <tr id="a3" style="display: none;">
                                                    <td style="height: 63px" align="left">
                                                        <table class="left_boder" style="width: 100%;" cellspacing="0" cellpadding="2" border="0">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a data-id="myCoins"style="color: black;font-size: 20px!important;">
                                                                        充值中心</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a data-id="myAccount"style="color: black;font-size: 20px!important;">
                                                                        充值记录</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a data-id="seekHistory"style="color: black;font-size: 20px!important;">消费记录</a>
                                                                </td>
                                                            </tr>

                                                            </tbody></table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <table class="left" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                <tr onclick="showMenu('a5',event)">
                                                    <th class="LeftTdBg2 hand" style="text-align: left;">
                                                        消息/留言管理
                                                    </th>
                                                </tr>
                                                <tr id="a5" style="display: none;">
                                                    <td align="left">
                                                        <table style="width: 100%;" cellspacing="0" cellpadding="2" border="0">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a data-id="myComment"style="color: black;font-size: 20px!important;">
                                                                        我的留言</a>
                                                                </td>
                                                            </tr>
                                                            </tbody></table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <table class="left" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                <tr onclick="showMenu('a0',event)">
                                                    <th class="LeftTdBg hand" style="text-align: left;">
                                                        快捷导航&nbsp;
                                                    </th>
                                                </tr>
                                                <tr id="a0" style="display: none;">
                                                    <td align="left">

                                                        <table style="width: 100%;" cellspacing="0" cellpadding="2" border="0">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a href="../../index.php" style="font-size: 20px!important;">返回首页</a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>
                                                                    <a href="../User/publicInfos.php"style="font-size: 20px!important;">安全退出</a>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody></table>
                    <script>
                        $(function() {
                            $(".leftNav").on("click", "a", function() {
                                var sId = $(this).data("id"); //获取data-id的值
                                window.location.hash = sId; //设置锚点
                                loadInner(sId);
                            });

                            function loadInner(sId) {
                                var sId = window.location.hash;
                                var pathn, i;
                                switch(sId) {
                                    case "#carSeek":
                                        pathn = "carSeek.php";
                                        i = 0;
                                        break;
                                    case "#seekManage":
                                        pathn = "seekManage.php";
                                        i = 1;
                                        break;
                                    case "#seekHistory":
                                        pathn = "seekHistory.php";
                                        i = 2;
                                        break;
                                    case "#orderManage":
                                        pathn = "orderManage.php";
                                        i = 3;
                                        break;
                                    case "#orderHistory":
                                        pathn = "orderHistory.php";
                                        i= 4;
                                        break;
                                    case "#myCoins":
                                        pathn = "myCoins.php";
                                        i= 5;
                                        break;
                                    case "#myAccount":
                                        pathn = "myAccount.php";
                                        i= 6;
                                        break;
                                    case "#myComment":
                                        pathn = "myComment.php";
                                        i= 6;
                                        break;
                                    case "#myInfo":
                                        pathn = "myInfo.php";
                                        i= 7;
                                        break;
                                    case "#changePassword":
                                        pathn = "changePassword.php";
                                        i= 8;
                                        break;
                                    default:
                                        pathn = "myInfo.php";  //默认
                                        i = 0;
                                        break;
                                }
                                $("#content").load(pathn); //加载相对应的内容
                                $(".userMenu li").eq(i).addClass("current").siblings().removeClass("current"); //当前列表高亮
                            }
                            var sId = window.location.hash;
                            loadInner(sId);
                        });
                    </script>
                    <script type="text/javascript">
                        function showMenu(objStr, e) {
                            var ob = e.srcElement || e.target;

                            if (ob.tagName == "TD") {
                                ob = ob.parentNode.childNodes[1].childNodes[0];
                            }
                            if (ob.tagName == "A") {
                                ob = ob.parentNode.childNodes[1].childNodes[0];
                            }
                            var obj = document.getElementById(objStr);
                            if (obj.style.display == "") {
                                obj.style.display = "none";
                                //ob.src ="images/ad.gif";
                            }
                            else {
                                obj.style.display = "";
                                //ob.src = "images/ad.gif";
                            }
                        }
                        function change_bgcolor(obj, val) {
                            obj.className = val;
                        }
                        function showlist() {
                            var sUrl = location.pathname;
                            var sName = sUrl.substring(sUrl.lastIndexOf("/") + 1).toLowerCase();
                            var arrLinks = document.getElementById("usermenu").getElementsByTagName("a");
                            var oLink = null, sLink = "";
                            for (var i = 0; i < arrLinks.length; i++) {
                                oLink = arrLinks[i];

                                if (oLink.attributes["collinks"] != null) {
                                    sLink = oLink.attributes["collinks"].value;
                                    var arrtargets = sLink.split(",");
                                    for (var j = 0; j < arrtargets.length; j++) {
                                        if (arrtargets[j].toLowerCase() == sName) {
                                            oLink.style.background = "#EBFBE3";
                                            oLink.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.style.display = "";
                                            return;
                                        }
                                    }
                                }
                            }
                        }
                        showlist();
                    </script>
                </td>
                <!--右部-->
                <td width="742" valign="top">
                    <div id="content"></div>
                </td>
            </tr>
            </tbody></table>
    </div>
</form>
</body>
<?php
include '../model/footer.html';
?>
</html>