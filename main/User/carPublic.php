<?php
        include '../model/head.php';
?><!DOCTYPE html>
<html lang="en">
<head id="Head1"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="x-ua-compatible" content="ie=7"><meta name="keywords" content="网上企业,免费开通企业,网络营销,推荐企业,品牌企业,寻找商机,创造交易,网上订单管理"><meta name="description" content="租赁宝专业为企业用户提供便捷,可靠,易用的网上企业管理系统.在这里您可以您可以方便的打理自己的生意,轻松实现交易管理与网上支付,降低成本而实现盈利最大化."><title>
    填写详细信息-出租物品发布-自行车租赁网-让租赁更简单
</title>
    <link rel="stylesheet" href="../Css/product_release.css" type="text/css">
    <link rel="stylesheet" href="../Css/public.css" type="text/css">
    <link rel="stylesheet" href="../Css/msgbox.css" type="text/css">
    <link href="../Css/popbox.css" rel="stylesheet" type="text/css">
    <link href="../javascript/jquery/uploadify.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../javascript/jquery/jquery-1.4.2.min.js"></script>
    <script src="../../jquery-3.3.1/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../javascript/msgbox5.js"></script>
    <script type="text/javascript" src="../javascript/movediv.js"></script>
    <script language="javascript" type="text/javascript">
        var isalert = true;
        function closepage(oEvent) {
            if (isalert) {
                oEvent.returnValue = "未保存的数据将会丢失！";
            }
        }
    </script>
    <script src="../javascript/Public.js"></script>
    <style type="text/css" media="screen">#uploadifyUploader {visibility:hidden}</style>
    <link rel="stylesheet" href="../Css/photoUpload.css">
    <script src="../javascript/photoUpload.js"></script>
    <link href="../Css/head.css" rel="stylesheet" type="text/css">
    <link href="../Css/nav.css" rel="stylesheet" type="text/css">
</head>
<body>
<form method="post" action="../User/Success.php" id="form1" enctype="multipart/form-data">
    <input type="hidden" name="toSuccess" value="chuzu">
    <input type="hidden" name="timeToPublic" value="<?php echo date('Y-m-d h:i:s', time());?>">
    <!--头部-->
    <!--导航-->
    <nav class="navigation">
        <section class="center">
            <ul>
                <ul>
                    <li><a href="../../index.php">首页</a></li>
                    <li><a href="../User/publicInfos.php">出租信息</a></li>
                    <li><a href="../User/seekInfos.php">求租信息</a></li>
                    <Li><a href="../User/newInfos.php">租赁资讯</a></Li>
                    <Li><a href="../User/help.php">帮助中心</a></Li>
                    <Li><a href="../User/about.php">关于我们</a></Li>
                </ul>
            </ul>
        </section>
    </nav>
    <div class="newFlow" id="newFlow">
        免费发布出租信息步骤：<img src="../../image/icons/Gray_one.gif" alt="选择信息分类" border="0">选择信息分类 &gt;
        <img src="../../image/icons/Green_two.gif" alt="填写详细内容" border="0"><span class="select">填写详细内容</span>
        &gt;
        <img src="../../image/icons/Gray_three.gif" alt="发布成功" border="0">发布成功
    </div>
    <div class="mainBorder">
        <table class="borderTxt" width="100%" height="49" cellspacing="0" cellpadding="0" border="0">
            <tbody><tr>
                <td width="8%" align="center">
                    <img alt="" src="../../image/icons/base_icon.gif" width="33" height="25">
                </td>
                <td width="72%">
                    基本信息
                </td>
                <td style="width: 20%; font-weight: normal;">
                    <a href="../help/HelpList20p10.html" target="_blank">发布不了信息？请查看帮助</a>
                </td>
            </tr>
            </tbody></table>
        <div class="selectCity">
            <table width="100%" height="40" cellspacing="0" cellpadding="0" border="0">
                <tbody><tr>
                    <td width="2%" height="36">
                        <img alt="" src="../../image/icons/msg_icon.gif">
                    </td>
                    <td width="99%">
                        <span class="colorRed"><strong>
                            提示：
                        </strong></span>对于发布重复、广告、虚假、被举报、违反国家政策法规信息，经核实后将会立即删除。
                    </td>
                </tr>
                </tbody></table>
        </div>
        <table width="96%" cellspacing="0" cellpadding="0" border="0" align="center">
            <tbody><tr>
                <td height="32" align="right">
                    <span class="colorRed">*</span>&nbsp;租品类别：&nbsp;
                </td>
                <td>
                    <strong id="CurKind">自行车&gt;</strong><select name="classStyle" id="RentMoneyStyle">
                    <option value="单人骑">单人骑</option>
                    <option value="双人骑">双人骑</option>
                    <option value="三人骑">三人骑</option>
                    <option value="其它">其它</option>
                </select>
                </td>
            </tr>
            <tr>
                <td height="32" align="right">
                    <span class="colorRed">*</span>&nbsp;标题：&nbsp;
                </td>
                <td width="87%">
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                            <td style="height: 24px">
                                &nbsp;<input name="TitleBox" maxlength="30" id="TitleBox" size="44" onfocus="checkTitle1()" onblur="this.value=this.value.replace(/(^\s*)|(\s*$)/g,'');checkTitle()" type="text">
                            </td>
                            <td style="height: 24px">
                                <span id="spanTitle"></span>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>
            <tr>
                <td height="32" align="right">
                    <span class="colorRed">*</span>&nbsp;面向城市：&nbsp;
                </td>
                <td width="83%">
                    <div id="divCity" style="float: left;">
                        <div id="UpdatePanel1">
                        省：<select id="provinces" name="provinces">  <option value="">请选择省份</option></select>
                        市：<select id="citys" name="city"><option value="">请选择市</option></select>
                        区：<select id="countys" name="area"><option value="">请选择县</option></select>
                            <input name="CascadingDropDown2_ClientState" id="CascadingDropDown2_ClientState" value="::::::" type="hidden">
                            <input name="CascadingDropDown1_ClientState" id="CascadingDropDown1_ClientState" value="::::::" type="hidden">
                            <input name="CascadingDropDown3_ClientState" id="CascadingDropDown3_ClientState" value="::::::" type="hidden">

                        </div>
                    </div>
                    <script>
                        $(function() {
//页面初始，加载所有的省份
                            $.ajax({
                                type: "get",
                                url: "getGeography.php",
                                data: {"type":1},
                                dataType: "json",
                                success: function(data) {
//遍历json数据，组装下拉选框添加到html中
                                    $("#provinces").html("<option value=''>请选择省份</option>");
                                    $.each(data, function(i, item) {
                                        $("#provinces").append("<option value='" + item.province_num + "'>" + item.province_name + "</option>");
                                    });
                                }
                            });

//监听省select框
                            $("#provinces").change(function() {
                                $.ajax({
                                    type: "get",
                                    url: "getGeography.php",
                                    data: {"pnum": $(this).val(),"type":2},
                                    dataType: "json",
                                    success: function(data) {
//遍历json数据，组装下拉选框添加到html中
                                        $("#citys").html("<option value=''>请选择市</option>");
                                        $.each(data, function(i, item) {
                                            $("#citys").append("<option value='" + item.city_num + "'>" + item.city_name + "</option>");
                                        });
                                    }
                                });
                            });

//监听市select框
                            $("#citys").change(function() {
                                $.ajax({
                                    type: "get",
                                    url: "getGeography.php",
                                    data: {"cnum": $(this).val(),"type":3},
                                    dataType: "json",
                                    success: function(data) {
//遍历json数据，组装下拉选框添加到html中
                                        $("#countys").html("<option value=''>请选择区</option>");
                                        $.each(data, function(i, item) {
                                            $("#countys").append("<option value='" + item.id + "'>" + item.area_name + "</option>");
                                        });
                                    }
                                });
                            });
                        });
                    </script>
                    <span id="spanCity" style="vertical-align: top;"></span>
                </td>
            </tr>
            <tr>
                <td height="32" align="right">
                    <span class="colorRed">*</span>&nbsp;详细地址：&nbsp;
                </td>
                <td>
                    <input name="address"type="text" placeholder="填写街道门牌号"><span>(选填)</span>
                </td>
            </tr>
            <tr>
                <td height="32" align="right">
                    <span class="colorRed">*</span>&nbsp;租金：&nbsp;
                </td>
                <td>
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                            <td>
                                &nbsp;<input name="RentMoneyBox" maxlength="6" id="RentMoneyBox" onfocus="checkRentMoney1()" onblur="checkRentMoney()" style="width:90px;" type="text">
                                <select name="RentMoneyStyle" id="RentMoneyStyle">
                                    <option value="元/月">元/月</option>
                                    <option value="元/天">元/天</option>
                                    <option value="元/小时">元/小时</option>

                                </select>

                            </td>
                            <td>
                                <span id="spanRentMoney"></span>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>
            <tr>
                <td height="32" align="right">
                    <span class="colorRed">*</span>&nbsp;押金：&nbsp;
                </td>
                <td>
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                            <td style="height: 23px">
                                &nbsp;<input name="DepositBox" maxlength="5" id="DepositBox" onfocus="checkDepositMoney1()" onblur="checkDepositMoney()" style="width:90px;" type="text">
                                &nbsp;元

                            </td>
                            <td style="height: 23px">
                                <span id="spanDepositMoney"></span>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>
            <tr>
                <td height="32" align="right">
                    <span class="colorRed">*</span>&nbsp;最短租期：&nbsp;
                </td>
                <td>
                    <table>
                        <tbody><tr>
                            <td>
                                <div id="lblZuQi" style="width: auto;">
                                    <select name="ddlZuQi" id="ddlZuQi" onchange="checkShortestTime()" onblur="checkShortestTime()" style="height:24px;">
                                        <option value="0">请选择最短租期</option>
                                        <option value="一天">一天</option>
                                        <option value="一月">一月</option>
                                        <option value="一季">一季</option>
                                        <option value="半年">半年</option>
                                        <option value="一年">一年</option>
                                        <option value="其他">其他</option>
                                    </select>
                                </div>
                                <span id="spanHandShort" style="display: none">
                                    <input name="txtHandShort" maxlength="8" id="txtHandShort" onblur="checkTxtShort();" style="width:90px;" type="text">&nbsp;<a href="javascript:void(null);" onclick="reelect();return false;">重选</a></span>
                            </td>
                            <td>
                                <div id="divShortestTime">
                                </div>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>
            <tr>
                <td height="32" align="right">
                    <span class="colorRed">*</span>&nbsp;付款要求：&nbsp;
                </td>
                <td>
                    <table>
                        <tbody><tr>
                            <td>
                                <div id="lblPayReq" style="width: auto;">
                                    <select name="ddlPayReq" id="ddlPayReq" onchange="checkPaymentNeed()" onblur="checkPaymentNeed()">
                                        <option value="0">请选择付款要求</option>
                                        <option value="一天一付">一天一付</option>
                                        <option value="一月一付">一月一付</option>
                                        <option value="一季一付">一季一付</option>
                                        <option value="半年一付">半年一付</option>
                                        <option value="一年一付">一年一付</option>
                                        <option value="其他">其他</option>
                                    </select>
                                </div>
                                <span id="spanHandPay" style="display: none">
                                    <input name="txtHandPay" maxlength="8" id="txtHandPay" onblur="checkTxtPay();" style="width:90px;" type="text">&nbsp;<a href="javascript:void(null);" onclick="reelect1();return false;">重选</a></span>
                            </td>
                            <td>
                                <div id="divPaymentNeed">
                                </div>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>

            <tr>
                <td align="right">
                    上传图片：&nbsp;
                </td>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                            <td style="height: 26px">
                                <img src="../../image/icons/upload_sub.jpg" id="myupload_uploadSub" onclick="document.getElementById('myupload_uploadImg').style.display='block';this.style.display='none';">
                            </td>
                            <td style="height: 26px" width="91%">
                                <span class="explanation">说明：上传图片，信息效果提高60%；只允许上传BMP、GIF、JPG、JPEG格式文件，图片大小不能超过2M，小于5K。</span>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <div id="myupload_uploadImg" style="display: none;" class="uploadStyle">
                        <table>
                            <tbody><tr>
                                <td><div  class="input-file-box"><span style="font-size: 16px;color: darkgreen">选择图片</span><input type="file" name="upload_file"  id="uploadfile" multiple></div>

                                    <img id="btnBegin" alt="开始上传" src="../../image/icons/btnstart.jpg" style="border: 0px; cursor: pointer;"><input name="myupload$hfProId" id="myupload_hfProId" value="0" type="hidden">
                                    <input name="myupload$hfType" id="myupload_hfType" value="1" type="hidden">
                                    &nbsp;&nbsp;<img alt="隐藏" src="../../image/icons/hide.jpg" style="border: 0px;
                            cursor: pointer;" onclick="document.getElementById('myupload_uploadSub').style.display='block';document.getElementById('myupload_uploadImg').style.display='none';">
                                </td>
                                <td>
                                    &nbsp;&nbsp;最多可上传 <span class="colorRed">16</span> 张，已上传 <span id="myupload_spancount" class="colorRed">0</span> 张
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div  id="img-box" name='img-box'style="width: 736px; height: auto; text-align: center; padding-bottom: 5px" class="uploadifyQueue">
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="clear: both;">
                    </div>
                </td>
            </tr>
            <tr id="mao2">
                <td height="106" align="right">
                    <span class="colorRed">*</span>&nbsp;详细描述：&nbsp;
                </td>
                <td>
                    <textarea name="txtContent" rows="2" cols="20" id="txtContent" onfocus="inputfocus(this)" onblur="inputblur();" style="height:180px;width:755px;color: #666;">例如对求租者的要求，租品详细描述，租品相关信息的描述...不能填写QQ、电话等联系方式。</textarea>
                </td>
            </tr>
            <tr style="height: 32px;">
                <td style="width: 153px;">
                </td>
                <td>
                    <span id="ltlContent" style="height: 10px;"></span>
                    <div id="divContent">
                        <span style="color: #999;">说明：您可以输入 <strong><span style="color: #ff6600;" id="spanWord">
                            2000</span></strong> 个字。<span style="color: #ff6600;">温馨提示：输入内容越详细，用户越容易找到此类信息！</span></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td height="25" align="right">
                </td>
                <td>
                </td>
            </tr>
            </tbody></table>
        <a name="mao1"></a>
        <table class="borderTxt" width="100%" height="49" cellspacing="0" cellpadding="0" border="0">
            <tbody><tr>
                <td width="7%" align="center">
                    <img alt="" src="../../image/icons/tel_icon.gif" width="34" height="25">
                </td>
                <td width="85%">
                    联系方式
                </td>
                <td class="backTop" width="8%">
                    <img alt="" src="../../image/icons/top_icon.gif" style="vertical-align: middle;" width="10" height="13">&nbsp;<a href="#newFlow">返回顶部</a>
                </td>
            </tr>
            </tbody></table>
        <table width="96%" cellspacing="0" cellpadding="0" border="0" align="center">
            <tbody><tr>
                <td height="5" align="right">
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td width="13%" height="32" align="right">
                    <span class="colorRed">*</span>&nbsp;联系人：&nbsp;
                </td>
                <td width="87%">
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                            <td style="height: 23px">
                                &nbsp;<input name="RelationMan" maxlength="4" size="20" id="RelationMan" onfocus="my('divRelationMan').style.display='block'" onblur="checkRelationMan()" style="width:80px;" type="text">
                            </td>
                            <td style="height: 23px">
                                <div id="divRelationMan">
                                </div>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>
            <tr>
                <td height="32" align="right">
                    <span class="colorRed">*</span>&nbsp;固定电话：&nbsp;
                </td>
                <td>
                    <table>
                        <tbody><tr>
                            <td>
                                <div id="spanPhone">
                                    <input name="AreaCodeBox" maxlength="4" size="8" id="AreaCodeBox" style="width:30px;" type="text">
                                    -
                                    <input name="PhoneBox" maxlength="8" size="20" id="PhoneBox" style="width:70px;" type="text">
                                    -
                                    <input name="ExtensionBox" maxlength="4" size="8" id="ExtensionBox" style="width:30px;" type="text"></div>
                            </td>
                            <td>
                                <div id="divTelAndPhone">
                                    &nbsp;说明：固定电话和手机任填一项均可</div>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>
            <tr>
                <td height="32" align="right">
                    <span class="colorRed">*</span>&nbsp;手机：&nbsp;
                </td>
                <td>
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                            <td>
                                &nbsp;<input name="MobileBox" maxlength="11" size="20" id="MobileBox" onfocus="my('divPhone').style.display='block'" onblur="checkPhone()" style="width:156px;" type="text">
                            </td>
                            <td>
                                <div id="divPhone">
                                </div>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>
            <tr>
                <td height="32" align="right">
                    QQ：&nbsp;
                </td>
                <td>
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                            <td>
                                &nbsp;<input name="QQBox" maxlength="10" id="QQBox" onfocus="my('divQQ').style.display='block'" onblur="checkQQ()" style="width:156px;" type="text">
                            </td>
                            <td>
                                <div id="divQQ">
                                </div>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>
            <tr>
                <td height="32" align="right">
                    &nbsp;
                </td>
                <td class="browse">
                    <br>
                    <input name="ImageButton1" id="ImageButton1" src="../../image/icons/sumit.jpg" onclick="if (typeof(checkSubmit) == 'function') { if (checkSubmit() == false) { return false; }};this.disabled  = true;isalert=false;__doPostBack('ImageButton1','');" style="vertical-align: middle;" type="image">
                    <!--验证码*</span>-->
                </td>
            </tr>
            </tbody></table>
        <br>
        <br>
    </div>
    <div id="footer1_siteinfomsg" class="msgDiv">

        <br>
        <br>
        <div class="msgList" style="display: none;" id="msgList">
            <div class="xinTxt">
                消息中心<img id="footer1_Image2" onclick="document.getElementById(&quot;msgList&quot;).style.display=&quot;none&quot;;document.getElementById(&quot;footer1_msgTitle&quot;).style.display=&quot;block&quot;" src="../../image/icons/jian_icn.gif" style="cursor: pointer;"></div>
            <div style="padding: 5px 0px 6px 10px; text-align: left;">



            </div>
            <div class="msgFoot">
                <a href="#tar" style="cursor: pointer;" onclick="document.getElementById('msgList').style.display='none';document.getElementById('footer1_msgTitle').style.display='block'">
                    消息中心(<span id="footer1_LblMesCount2" class="msgRed">0</span>)</a></div>
            <div class="footClose">
                <img id="footer1_Image3" onclick="document.getElementById('msgList').style.display='none'" src="../../image/icons/foot_close.jpg"></div>
        </div>
    </div>


    <div id="msgbox5" class="massageBox">
        <div class="mainBorder1">
            <table width="95%" height="77" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody>
                <tr>
                    <td>
                        <label>
                            <input name="surepub" value="确定发布" onclick="if (typeof(checkSubmit) == 'function') { if (checkSubmit() == false) { return false; }};this.disabled  = true;isalert=false;__doPostBack('surepub','');" id="surepub" type="submit">
                            <input value="返回修改" onclick="closemsg();return false;" type="button">
                        </label>
                    </td>
                </tr>
                </tbody></table>
            <table width="95%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center">
                <tbody><tr>
                    <td style="width: 59%" valign="top">
                        <p class="browseName" id="ltlTitle">
                        </p>
                        <table class="listInfo" id="msgDetails" width="98%" cellspacing="2" cellpadding="2" border="0">
                        </table>
                        <table width="100%" height="21" cellspacing="0" cellpadding="0" border="0">
                            <tbody><tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            </tbody></table>
                    </td>
                    <td width="43%" valign="top">
                        <table width="100%" height="35" cellspacing="0" cellpadding="0" border="0">
                            <tbody><tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            </tbody></table>
                        <ul class="browseList" id="ulContact">
                        </ul>
                    </td>
                </tr>
                </tbody></table>
            <div class="spanH">
            </div>
            <table width="95%" height="35" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center">
                <tbody><tr>
                    <td class="infoTxt" style="color: #000;">
                        详细信息
                    </td>
                </tr>
                </tbody></table>
            <table width="95%" height="86" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody><tr>
                    <td class="infoCon" id="msgContent" bgcolor="#FFFFFF">
                    </td>
                </tr>
                </tbody></table>
            <div class="spanH">
            </div>
            <table id="headimg" width="95%" height="35" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center">
                <tbody><tr>
                    <td class="infoTxt">
                        图片
                    </td>
                </tr>
                </tbody></table>
            <table id="msgimg" width="95%" height="86" cellspacing="0" cellpadding="0" border="0" align="center">
            </table>
            <table width="95%" height="54" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody><tr>
                    <td height="54">
                        <label>
                            <input name="surepub1" value="确定发布" onclick="if (typeof(checkSubmit) == 'function') { if (checkSubmit() == false) { return false; }};this.disabled  = true;isalert=false;__doPostBack('surepub1','');" id="surepub1" type="submit">
                            <input value="返回修改" onclick="closemsg();return false;" type="button">
                        </label>
                    </td>
                </tr>
                </tbody></table>
        </div>
    </div>
    <div id="msgLogin" class="massageBox">
        <table class="popTable" onmousedown="MDown(msgLogin)">
            <tbody><tr>
                <td class="popTitle" id="popTitle">
                </td>
                <td align="center">
                    <a href="javascript:void(null);" onclick="closeWin();return false;">
                        <img style="border: 0;" src="../../image/icons/close_icn.gif" alt="关闭窗口"></a>
                </td>
            </tr>
            </tbody></table>
    </div>
    <div id="mask">
    </div>
    <?php
    include '../model/footer.html';
    ?>
    <input name="hfState" id="hfState" value="0" type="hidden">
    <input name="hfSign" id="hfSign" value="0" type="hidden">
    <input name="updateCityType" id="updateCityType" type="hidden">
    <input name="hfId" id="hfId" type="hidden">
    <input name="HiddenField1" id="HiddenField1" value="0" type="hidden">
    <input name="HiddenField2" id="HiddenField2" value="0" type="hidden">
    <input name="HidPageCode" id="HidPageCode" type="hidden">
    <input name="hf_amount" id="hf_amount" value="1" type="hidden">
    <input name="hf_state1" id="hf_state1" value="1" type="hidden">
    <script type="text/javascript">
        /*省市城市*/
    </script>
        <script type="text/javascript">
    function inputfocus(target) {
        target.style.color = "#000";
        var stext = target.value;
        if (stext == "例如对求租者的要求，租品详细描述，租品相关信息的描述...不能填写QQ、电话等联系方式。") {
            target.value = "";
        }
        $("#txtContent").removeClass("inputBorder");
        $("#ltlContent").html("");
    }
    function inputblur() {
        var target = document.getElementById("txtContent");
        var stext = target.value.replace(/\s+/g, "");
        if (stext == "") {
            target.style.color = "#666";
            target.value = "例如对求租者的要求，租品详细描述，租品相关信息的描述...不能填写QQ、电话等联系方式。";
            $("#txtContent").addClass("inputBorder");
            $("#ltlContent").html("<img src='../../image/icons/err_icon.gif'  style='vertical-align: middle' />&nbsp;<font color='FF0000'>详细描述为必填项</font>");
            return false;
        }
        else {
            if (stext == "例如对求租者的要求，租品详细描述，租品相关信息的描述...不能填写QQ、电话等联系方式。") {
                $("#txtContent").addClass("inputBorder");
                $("#ltlContent").html("<img src='../../image/icons/err_icon.gif'  style='vertical-align: middle' />&nbsp;<font color='FF0000'>详细描述为必填项</font>");
                return false;
            }
            else {
                if (stext.length < 10) {
                    $("#txtContent").addClass("inputBorder");
                    $("#ltlContent").html("<img src='../../image/icons/err_icon.gif'  style='vertical-align: middle' />&nbsp;<font color='FF0000'>至少输入10个字</font>");
                    return false;
                }
                else {
                    $.ajax({ type: "GET", url: "carPublic?r=" + Math.round(20000), data: { _content: stext }, success: function (result) {
                            if (parseInt(result) > 0) {
                                $("#txtContent").addClass("inputBorder");
                                $("#ltlContent").html("<img src='../../image/icons/err_icon.gif'  style='vertical-align: middle' />&nbsp;<font color='FF0000'>详细描述包含非法字符</font>");
                                return false;
                            }
                            else {
                                $("#txtContent").removeClass("inputBorder");
                                $("#ltlContent").html("");
                                return;
                            }
                        }
                    });
                }
            }
        }
    }
    //如果面议被选中则清空输入的数字
    //        function checkSelect(num) {
    //            if (num == 1) {
    //                if (document.getElementById("FreeRent").checked == true) {
    //                    var divtitle = my("spanRentMoney");
    //                    getmsg(divtitle, 'right_icon.gif', '', '');
    //                    $("#RentMoneyBox").removeClass("inputBorder");
    //                    document.getElementById("RentMoneyBox").value = "";
    //                }
    //                else {
    //                    checkRentMoney1();
    //                    $("#RentMoneyBox").focus();
    //                }
    //            }
    //            else {
    //                if (document.getElementById("FreeDeposit").checked == true) {
    //                    var divtitle = my("spanDepositMoney");
    //                    getmsg(divtitle, 'right_icon.gif', '', '');
    //                    $("#DepositBox").removeClass("inputBorder");
    //                    document.getElementById("DepositBox").value = "";
    //                }
    //                else {
    //                    checkDepositMoney1();
    //                    $("#DepositBox").focus();

    //                }
    //            }
    //        }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#spanPhone").contents().focus(function () {
            $("#divTelAndPhone").css("display", "block");
        }).blur(function () {
            checkTel();
        });
    });
</script>
<script type="text/javascript">
    function checkData() {
        //标题
        if (checkTitle() == false) {
            window.location.href = "#newFlow";
            return false;
        }
        //城市
        if (checkCity() == false) {
            window.location.href = "#newFlow";
            return false;
        }
        //租金
        if (checkRentMoney() == false) {
            window.location.href = "#newFlow";
            return false;
        }
        //押金
        if (checkDepositMoney() == false) {
            window.location.href = "#newFlow";
            return false;
        }
        //最短租期
        if (my("lblZuQi").style.display == "") {
            if (checkShortestTime() == false) {
                window.location.href = "#newFlow";
                return false;
            }
        }
        //付款要求
        if (my("lblPayReq").style.display == "") {
            if (checkPaymentNeed() == false) {
                window.location.href = "#newFlow";
                return false;
            }
        }
        //详细描述
        if (inputblur() == false) {
            window.location.href = "#mao2";
            return false;
        }
        if (my("RelationMan").value.replace(/(^\s*)|(\s*$)/g, "") == "") {
            var divrelation = my("divRelationMan");
            getmsg(divrelation, 'reg2.gif', '#003cc8', '请输入联系人姓名');
            divrelation.style.display = "block";
            jQuery("#RelationMan").addClass("inputBorder");
            return false;
        }
        else {
            if (checkRelationMan() == false) {
                return false;
            }
        }
        if (checkAllTel() == false) {
            return false;
        }
        if (my("PhoneBox").value.replace(/(^\s*)|(\s*$)/g, "") != "") {
            if (checkTel() == false) {
                return false;
            }
        }
        if (my("MobileBox").value.replace(/(^\s*)|(\s*$)/g, "") != "") {
            if (checkPhone() == false) {
                return false;
            }
        }
        if (my("QQBox").value.replace(/(^\s*)|(\s*$)/g, "") != "") {
            if (checkQQ() == false) {
                return false;
            }
        }
        //是否显示联系方式
        if ($("input[id='rbl_isshow_1']").is(':checked')) {
            if (my("txt_zbcount").value.replace(/(^\s*)|(\s*$)/g, "") == "") {
                var rl = document.getElementsByName("rbl_isshow");
                for (var i = 0; i < rl.length; i++) {
                    if (rl[i].type == "radio") {
                        if (rl[i].checked) {
                            if ((rl[i].value) == "1") {
                                var divzbcount = my("zbcount");
                                jQuery("#txt_zbcount").addClass("inputBorder");
                                getmsg(divzbcount, 'err_icon.gif', '#FF0000', '请填写使用租币个数');
                                divzbcount.style.display = "block";
                                return false;
                            }
                            else {
                                $("#txt_zbcount").removeClass("inputBorder"); my("zbcount").innerText = "";
                                return true;
                            }
                        }
                    }
                }
            }
            else {
                if (checkzbcount() == false) {
                    return false;
                }
            }
        }
    }
    //最后提交数据
    function checkSubmit() {
        if (checkData() == false) {
            return false;
        }
        if ($.trim($("#hfState").val()) == "0") {
            showWin();
            return false;
        }
    }
</script>
</body>
</html>