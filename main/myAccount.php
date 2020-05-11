<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="../../jquery-3.3.1/jquery-3.3.1.js"></script>
    <link id="style" rel="stylesheet" type="text/css" href="../userCenter/css/admincss.css">
</head>
<body>
<!--左侧导航-->
<form method="post" action="admin.php" id="form1" style='min-height:650px;margin-left: 400px;'>
    <div>
        <table class="main" cellspacing="0" cellpadding="0" border="0">
            <tbody><tr>
                <td width="190" valign="top">
                    <table width="178" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                            <td class="left_border" valign="top">

                                <div>
                                    <a href="admin.php">
                                        <img src="image/admin_Home.jpg" alt="" border="0"></a></div>
                                <table id="usermenu" width="178" cellspacing="0" cellpadding="0" border="0"  class="leftNav">
                                    <tbody>
                                    <tr>
                                        <td valign="top">
                                            <table class="left " width="100%" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                <tr onclick="showMenu('a2',event)">
                                                    <th class="LeftTdBg2 hand" style="height: 23px; text-align: left;">
                                                        出租管理
                                                    </th>
                                                </tr>
                                                <tr id="a2" style="display: none;">
                                                    <td align="left">
                                                        <table style="width: 100%;" cellspacing="0" cellpadding="2" border="0">
                                                            <tbody><tr>
                                                                <td>
                                                                    <a href="carPublic.php"  target="contents">发布出租信息</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a href="publicInfos.php"  target="contents">
                                                                        查询出租信息</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a href="publicManage.php"  target="contents">
                                                                        管理出租信息</a>
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
                                                        用户管理&nbsp;
                                                    </th>
                                                </tr>
                                                <tr id="a1" style="display: none;">
                                                    <td align="left">

                                                        <table style="width: 100%;" cellspacing="0" cellpadding="2" border="0">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a href="userInfos.php"  target="contents">管理用户信息</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a href="userOrders.php"  target="contents">用户动态</a>
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
                                                        <div style="color:  #006600;font-size: 13px;">
                                                            租币/余额</div>
                                                    </th>
                                                </tr>
                                                <tr id="a3" style="display: none;">
                                                    <td style="height: 63px" align="left">
                                                        <table class="left_boder" style="width: 100%;" cellspacing="0" cellpadding="2" border="0">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a href="myCoins.php"  target="contents">
                                                                        充值窗口</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a href="myAccount.php"  target="contents">
                                                                        账户流水</a>
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
                                                                    <a href="myComment.php"  target="contents">
                                                                        管理用户留言</a>
                                                                </td>
                                                            </tr>
                                                            </tbody></table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
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
                                                                    <a href="myInfo.php"  target="contents">个人信息</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a  href="changePassword.php"  target="contents">修改密码</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <a href="sessionUnset.php"  target="contents">安全退出</a>
                                                                </td>
                                                            </tr>
                                                            </tbody></table>
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
                                    case "#publicInfos":
                                        pathn = "publicInfos.php";
                                        i = 0;
                                        break;
                                    case "#carPublic":
                                        pathn = "carPublic.php";
                                        i = 0;
                                        break;
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
</html>