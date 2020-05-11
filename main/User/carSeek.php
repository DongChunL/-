<?php
include '../model/head.php';
include '../../sql/phpConnectDb.php';

?>
<!DOCTYPE html>
<html lang="en">
<head id="Head1"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="x-ua-compatible" content="ie=7"><title>
    填写详细信息-求租物品发布-租赁宝-让租赁更简单
</title><link rel="stylesheet" href="../Css/product_release.css" type="text/css"><link rel="stylesheet" href="../Css/public.css" type="text/css"><link rel="stylesheet" href="../Css/msgbox.css" type="text/css"><link href="../Css/popbox.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="../javascript/jquery/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="../../jquery-3.3.1/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../My97DatePicker/WdatePicker.js"></script><link href="../Css/WdatePicker.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../javascript/Seek.js"></script>
    <link href="../Css/nav.css" rel="stylesheet" type="text/css">
</head>
<body onbeforeunload="closepage(event)"><div style="position: absolute; z-index: 19700; top: -1970px; left: -1970px; display: none;"><iframe src="http://www.zulinbao.com/User/js/My97DatePicker.htm" border="0" scrolling="no" style="width: 186px; height: 198px;" frameborder="0"></iframe></div>
<!--导航-->
<nav class="navigation">
    <section class="center">
        <ul>
            <ul>
                <li><a href="../../index.php">首页</a></li>
                <li><a href="publicInfos.php">出租信息</a></li>
                <li><a href="seekInfos.php">求租信息</a></li>
                <Li><a href="newInfos.php">租赁资讯</a></Li>
                <Li><a href="about.php">关于我们</a></Li>
                <Li><a href="help.php">帮助中心</a></Li>
                <li><a href="onlinePredict.php">在线预订</a></li>
            </ul>
        </ul>
    </section>
</nav>
<form method="post" action="Success.php" id="form1">
    <input type="hidden" name="toSuccess" value="qiuzu">
    <div class="aspNetHidden">
        <input name="__EVENTTARGET" id="__EVENTTARGET" value="" type="hidden">
        <input name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" type="hidden">
        <input name="toolkit_HiddenField" id="toolkit_HiddenField" value=";;AjaxControlToolkit, Version=3.5.50401.0, Culture=neutral, PublicKeyToken=28f01b0e84b6d53e:zh-CN:beac0bd6-6280-4a04-80bd-83d08f77c177:475a4ef5:effe2a26:beb16dc9" type="hidden">
        <input name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTQ5NDc1NTYwMg9kFgICAQ9kFhACAQ9kFgICBQ8PFgIeB1Zpc2libGVnZBYKZg8PFgQeBFRleHQFGOadpeeci+e9keermeeahOeoi+W6j+WRmB4LTmF2aWdhdGVVcmwFFn4vVXNlci91c2VyX2luZGV4LmFzcHhkZAIDDxYCHwEFigE8c3BhbiBjbGFzcz0icHRoeSI+5pmu6YCa5Lya5ZGYPC9zcGFuPiZuYnNwOzxhIGhyZWY9InZpcF9zZXJ2ZXIuaHRtbCIgdGl0bGU9Iui/m+WFpVZJUOacjeWKoeS4reW/gyI+PGZvbnQgY29sb3I9InJlZCI+5oiQ5Li6VklQPC9mb250PjwvYT5kAgUPFgIeBGhyZWYFUX4vTG9nb3V0LmFzcHg/dXJsPSUyZlVzZXIlMmZxaXV6dS5hc3B4JTNmdHlwZSUzZDElMjZ0eXBlMWlkJTNkMzE3JTI2dHlwZTJpZCUzZDM5MGQCBw8PFgIfAgUWfi9Vc2VyL3VzZXJfaW5kZXguYXNweGRkAgkPDxYCHwIFFn4vVXNlci9TdG9yZVN0YXRlLmFzcHhkZAICDxYCHglpbm5lcmh0bWwFEOWFtuS7liZndDvlhbbku5ZkAgMPFgIfAwUdLi4vVXNlci9xaXV6dXNvcnQuYXNweD90eXBlPTFkAgYPZBYCAgEPZBYCZg9kFgYCAQ8QZBAVAQAVAQAUKwMBZ2RkAgMPEGQQFQEAFQEAFCsDAWdkZAIFDxBkEBUBABUBABQrAwFnZGQCCw8QDxYGHg1EYXRhVGV4dEZpZWxkBQRuYW1lHg5EYXRhVmFsdWVGaWVsZAUCaWQeC18hRGF0YUJvdW5kZ2QQFQMH5YWDL+aciAflhYMv5aSpCuWFgy/lsI/ml7YVAwExATIBMxQrAwNnZ2dkZAIZDw9kFgIeB29uY2xpY2sFlwFpZiAodHlwZW9mKGNoZWNrRGF0YSkgPT0gJ2Z1bmN0aW9uJykge2lmIChjaGVja0RhdGEoKSA9PSBmYWxzZSkgeyByZXR1cm4gZmFsc2U7IH19O3RoaXMuZGlzYWJsZWQgID0gdHJ1ZTtpc2FsZXJ0PWZhbHNlO19fZG9Qb3N0QmFjaygnSW1hZ2VCdXR0b24xJywnJyk7ZAIaD2QWAmYPZBYEAgEPEA8WBB4HQ2hlY2tlZGgeB0VuYWJsZWRoZGRkZAIDDw8WBB4ISW1hZ2VVcmwFFS4uL2ljb24vc2luYV9oaWRlLmpwZx8KaGRkAhwPZBYGAgEPFgIeC18hSXRlbUNvdW50AgsWFmYPZBYCAgEPFgIfAwUiLi4vYWJvdXR1cy9NYXJrVGVtcGxldC5hc3B4P2lkPTEyNxYCZg8VAQ/np5/otYHlrp3nroDku4tkAgEPZBYCAgEPFgIfAwUiLi4vYWJvdXR1cy9NYXJrVGVtcGxldC5hc3B4P2lkPTEzNhYCZg8VAQzmhI/op4Hlj43ppohkAgIPZBYCAgEPFgIfAwUhLi4vYWJvdXR1cy9NYXJrVGVtcGxldC5hc3B4P2lkPTU5FgJmDxUBDOWKoOebn+S7o+eQhmQCAw9kFgICAQ8WAh8DBSEuLi9hYm91dHVzL01hcmtUZW1wbGV0LmFzcHg/aWQ9NTgWAmYPFQEM5bm/5ZGK5pyN5YqhZAIED2QWAgIBDxYCHwMFIS4uL2Fib3V0dXMvTWFya1RlbXBsZXQuYXNweD9pZD02NxYCZg8VAQzms5Xlvovlo7DmmI5kAgUPZBYCAgEPFgIfAwUhLi4vYWJvdXR1cy9NYXJrVGVtcGxldC5hc3B4P2lkPTY4FgJmDxUBDOe9keermeWcsOWbvmQCBg9kFgICAQ8WAh8DBSEuLi9hYm91dHVzL01hcmtUZW1wbGV0LmFzcHg/aWQ9NjkWAmYPFQEM6IGU57O75oiR5LusZAIHD2QWAgIBDxYCHwMFIS4uL2Fib3V0dXMvTWFya1RlbXBsZXQuYXNweD9pZD05MxYCZg8VAQzor5rogZjoi7HmiY1kAggPZBYCAgEPFgIfAwUiLi4vYWJvdXR1cy9NYXJrVGVtcGxldC5hc3B4P2lkPTIwMxYCZg8VAQzllYbliqHlkIjkvZxkAgkPZBYCAgEPFgIfAwUiLi4vYWJvdXR1cy9NYXJrVGVtcGxldC5hc3B4P2lkPTY1NRYCZg8VAQzmnI3liqHmnaHmrL5kAgoPZBYCAgEPFgIfAwUiLi4vYWJvdXR1cy9NYXJrVGVtcGxldC5hc3B4P2lkPTY1NhYCZg8VAQzmlK/ku5jmlrnlvI9kAgMPFgIfAQUEMjAyMGQCBQ9kFghmD2QWBGYPDxYCHwEFATJkZAIBDw9kFgIfCAVAZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2Zvb3RlcjJfbXNnVGl0bGUnKS5zdHlsZS5kaXNwbGF5PSdub25lJ2QCAQ8PZBYCHwgFeWRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJtc2dMaXN0Iikuc3R5bGUuZGlzcGxheT0ibm9uZSI7ZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoImZvb3RlcjJfbXNnVGl0bGUiKS5zdHlsZS5kaXNwbGF5PSJibG9jayJkAgIPFgIfAQVyPHVsIGNsYXNzPSJ4aW5MaXN0Ij48bGk+PGEgaHJlZj0iaHR0cDovL3d3dy56dWxpbmJhby5jb20vVXNlci9NeV9TeXNJbmZvLmFzcHgiPuacquivu+ezu+e7n+a2iOaBrygyKTwvYT48L2xpPjwvdWw+ZAIDDw8WAh8BBQEyZGQYAQUeX19Db250cm9sc1JlcXVpcmVQb3N0QmFja0tleV9fFgYFDGNoZWNrQWxsQ2l0eQUIcmJTdXBwbHkFCHJiU3VwcGx5BQpyYk5vU3VwcGx5BQxJbWFnZUJ1dHRvbjEFB3NpbmFidG7y4ha8EEJljMrdXxmW0vH9GBk1IA==" type="hidden">
    </div>
    <script type="text/javascript">
        //<![CDATA[
        var theForm = document.forms['form1'];
        if (!theForm) {
            theForm = document.form1;
        }
        function __doPostBack(eventTarget, eventArgument) {
            if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
                theForm.__EVENTTARGET.value = eventTarget;
                theForm.__EVENTARGUMENT.value = eventArgument;
                theForm.submit();
            }
        }
        //]]>
    </script>


    <script type="text/javascript">
        //<![CDATA[
        if (typeof(Sys) === 'undefined') throw new Error('ASP.NET Ajax 客户端框架未能加载。');
        //]]>
    </script>

    <div class="aspNetHidden">

        <input name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="E5E8EA93" type="hidden">
        <input name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEdACa0k6/Q3/d+/kNr2ZCTRsAo5zWayQiUQh3YpXfp9HkgkYpv349jDgSv3bScjJGp38ll2vCtSqucyFDubkngQHN6U32i76/stCzFrUGX0xPOSnxSKsHzeWd62/0hrvAGbDW7HQ7Zoa3FdKycsZXZLU9dPQPkEKOME3NY5xO/0Fi1y6wjHkesi5J+CeLK/TW/BZr4e3ZSZuyPJwfevOT/LkN4n6t/Ph6PGdu7MGgjhJEZLEy4Zif84bQksiaaY+KJq3jNgLTFheZDSQWF430eQLOc3FmvQKuT1z5JjHtiQBpZe2+BUc0nzdnRlSkW3mgpG9jngOIYE8mLWzNu1P+kPOhdgF8O4AJumzPysE5Uk0GlrLZUdqXEqUEGZ4VhEwb0n5WW6vdhkyVb8o53EXCOy7aNc+y+arwkf5u/+UNKyW5s6K3ScNz7OBLtEdjfdm+M0Oj12fJ7AzIJBuLKS6lhbBAWukR4XUWPB2XBxaHnXrTVckyHQSOGlII8f5kKy6io5Tn8fy/KU6WITf8v1AWFbhmBaUT3m8HPK67YfEJIcdYx/bBt4XmdvQTOrMpF7uodUJhvFTtjz0xwuN25Ru5DEjRf34uWDAbChiCERXidB9wivxXE3dkwa1cRACVa3MHp4BvKTmE82TItSIvlatMO4O+I6ZACrx5RZnllKSerU+IuKlVB0q7yL6RFgu8LteOw4QXSn5qmRvTRsPSphacWJeJ7pmNojsZ+tRSkbRvi3ZsKZ/i8SVuR0Hu3gHTaAzE8+cB07xLztArDv6R9cbEo73ouR7w9m0JlgD8iDjA7jSSiMJ0cuXNXUEtcHFu+6xb3t8zDfE+G" type="hidden">
    </div>
    <script type="text/javascript">
        //<![CDATA[
        Sys.WebForms.PageRequestManager._initialize('toolkit', 'form1', ['tUpdatePanel1','UpdatePanel1','tUpdatePanel2','UpdatePanel2'], [], [], 90, '');
        //]]>
    </script>
    <div class="newFlow" id="newFlow">
        免费发布求租信息步骤：<img src="../../image/icons/Gray_one.gif" alt="选择信息分类" border="0">选择信息分类 &gt;
        <img src="../../image/icons/Green_two.gif" alt="填写详细内容" border="0"><span class="select">填写详细内容</span>
        &gt;
        <img src="../../image/icons/Gray_three.gif" alt="发布成功" border="0">发布成功
    </div>
    <div class="mainBorder">
        <table style="height: 49;" class="borderTxt" width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody><tr>
                <td width="8%" height="10" align="center">
                </td>
                <td colspan="2" width="92%">
                </td>
            </tr>
            <tr>
                <td width="8%" align="center">
                    <img src="../../image/icons/base_icon.gif" alt="" width="33" height="25">
                </td>
                <td width="72%">
                    基本信息
                </td>
                <td style="width: 20%; font-weight: normal;">
                    <a href="../help/HelpList20p10.html" target="_blank">发布不了信息？请查看帮助</a>
                </td>
            </tr>
            <tr>
                <td width="8%" height="10" align="center">
                </td>
                <td colspan="2" width="92%">
                </td>
            </tr>
            </tbody></table>
        <div class="selectCity">
            <table width="100%" height="40" cellspacing="0" cellpadding="0" border="0">
                <tbody><tr>
                    <td width="2%" height="36">
                        <img src="../../image/icons/msg_icon.gif">
                    </td>
                    <td width="99%">
                        提示：发布求租信息，经审核通过后即可获得 <font style="font-weight: bold;" color="#ff6600">
                        1
                    </font>积分，赶快行动吧！
                    </td>
                </tr>
                </tbody></table>
        </div>
        <table width="96%" cellpadding="0" border="0" align="center">
            <tbody><tr style="height: 32px;">
                <td style="width: 153px;" height="28" align="right">
                    <span class="colorRed">*</span>&nbsp;租品类别：
                </td>
                <td>
                    <strong id="CurKind">自行车&gt;</strong><select name="seekStyle" id="RentMoneyStyle">
                    <option value="单人骑">单人骑</option>
                    <option value="双人骑">双人骑</option>
                    <option value="三人骑">三人骑</option>
                    <option value="其它">其它</option>
                </select>
                </td>
            </tr>
            <tr style="height: 32px;">
                <td style="text-align: right; width: 153px;">
                    <span style="color: #ff6600">*</span>&nbsp;标 题：
                </td>
                <td width="83%">
                    <input name="txtTitle" maxlength="30" id="txtTitle" onfocus="clickTitle();" onblur="this.value=this.value.replace(/\s/g,'');checkTitle()" style="width:291px;" class="inputBorder" type="text">
                    <span id="spanTitle" style="vertical-align: top;">&nbsp;&nbsp;<img src="../../image/icons/err_icon.gif" style="vertical-align: middle">&nbsp;<font color="#FF0000">请输入标题</font></span>
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
            <tr style="height: 32px;">
                <td style="text-align: right; width: 153px;">
                    <span style="color: #ff6600">*</span>&nbsp;有效日期：
                </td>
                <td>
                    <div id="divTime" style="float: left;">
                        <input name="txtBeginTime" id="txtBeginTime" style="width:95px;" type="text">
                        <img onclick="WdatePicker({el:$dp.$('txtBeginTime')})" src="../../image/icons/picker.gif" style="width: 33px; height: 21px; font-weight: bold;" align="absmiddle">
                        至
                        <input name="txtEndTime" id="txtEndTime" style="width:95px;" type="text">
                        <img onclick="WdatePicker({el:$dp.$('txtEndTime')})" src="../../image/icons/picker.gif" style="width: 33px; height: 21px; font-weight: bold;" align="absmiddle">
                    </div>
                    &nbsp;<span id="spanTime" style="vertical-align: top;"></span>
                </td>
            </tr>
            <tr style="height: 32px;">
                <td style="text-align: right; width: 153px;">
                    <span style="color: #ff6600">*</span>&nbsp;期望租金：
                </td>
                <td>
                    <input name="txtRentMoney" maxlength="6" id="txtRentMoney" onkeyup="this.value=this.value.replace(/\D/g,'')" onfocus="clickRentMoney();" onblur="checkRentMoney();" style="width:90px;" type="text">&nbsp;
                    <select name="RentMoneyStyle" id="RentMoneyStyle">
                        <option value="元/月">元/月</option>
                        <option value="元/天">元/天</option>
                        <option value="元/小时">元/小时</option>

                    </select>

                    <span id="spanRentMoney" style="vertical-align: top;"></span>
                </td>
            </tr>
            <tr style="height: 32px;">
                <td style="text-align: right; width: 153px;">
                    期望押金：
                </td>
                <td>
                    <input name="txtDepositMoney" maxlength="5" id="txtDepositMoney" onkeyup="this.value=this.value.replace(/\D/g,'')" onfocus="clickDepositMoney();" onblur="checkDepositMoney();" style="width:90px;" type="text">&nbsp;元

                    <span id="spanDepositMoney" style="vertical-align: top;"></span>
                </td>
            </tr>
            <tr id="trNumber" style="height: 32px;">
                <td style="text-align: right; width: 153px;">
                    <span style="color: #ff6600">*</span>&nbsp;数 量：
                </td>
                <td>
                    <input name="txtNumber" maxlength="4" id="txtNumber" onkeyup="this.value=this.value.replace(/\D/g,'')" onfocus="clickNumber();" onblur="checkNumber();" style="width:90px;" type="text">&nbsp;个
                    <span id="spanNumber" style="vertical-align: top;"></span>
                </td>
            </tr>
            <tr style="height: 32px;">
                <td style="text-align: right; width: 153px;">
                    是否提供发票：
                </td>
                <td>
                    <input id="rbSupply" name="sm" value="提供" type="radio"><label for="rbSupply">提供</label>
                    <input id="rbNoSupply" name="sm" value="不提供" checked="checked" type="radio"><label for="rbNoSupply">不提供</label>
                </td>
            </tr>
            <tr style="height: 32px;">
                <td style="text-align: right; width: 153px; height: 72px;">
                    <span class="colorRed">*</span>&nbsp;详细描述：
                </td>
                <td>
                    <textarea name="txtContent" rows="2" cols="20" id="txtContent" onfocus="inputfocus(this)" onblur="inputblur();" style="height:164px;width:716px;color: #666;">例如对求租物品的要求、对自己情况的描述等…不能填写QQ、电话等联系方式。</textarea>
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
                <td style="width: 153px" height="25">
                </td>
                <td>
                </td>
            </tr>
            </tbody></table>
        <table class="borderTxt" width="100%" height="40" cellspacing="0" cellpadding="0" border="0">
            <tbody><tr>
                <td width="7%" align="center">
                    <img src="../../image/icons/tel_icon.gif" width="34" height="25">
                </td>
                <td width="85%">
                    联系方式
                </td>
                <td class="backTop" width="8%">
                    <img src="../../image/icons/top_icon.gif" style="vertical-align: middle;" alt="返回顶部" width="10" height="13">&nbsp;<a href="#newFlow">返回顶部</a>
                </td>
            </tr>
            </tbody></table>
        <table width="96%" cellspacing="0" cellpadding="0" border="0" align="center">
            <tbody><tr style="height: 32px;">
                <td style="text-align: right; height: 32px; width: 152px;">
                    <span style="color: #ff6600">*</span>&nbsp;联系人：
                </td>
                <td style="height: 32px">
                    <input name="txtContact" maxlength="4" id="txtContact" onfocus="clickContact();" onblur="checkContact();" style="width:80px;" type="text">
                    <span id="spanContact" style="vertical-align: top;"></span>
                </td>
            </tr>
            <tr style="height: 32px;">
                <td style="text-align: right; height: 32px; width: 152px;">
                    <span style="color: #ff6600">*</span>&nbsp;固定电话：
                </td>
                <td style="height: 32px">
                    <div id="divPhone" style="float: left;">
                        <input name="txtPre" maxlength="4" id="txtPre" style="width:30px;" type="text">-
                        <input name="txtMiddle" maxlength="8" id="txtMiddle" style="width:63px;" type="text">-
                        <input name="txtEnd" maxlength="4" id="txtEnd" style="width:30px;" type="text"></div>
                    &nbsp;<span id="spanPhone"> 电话和手机可任填一项</span>
                </td>
            </tr>
            <tr style="height: 32px;">
                <td style="text-align: right; width: 152px;">
                    <span style="color: #ff6600">*</span>&nbsp;手 机：
                </td>
                <td>
                    <input name="txtMobile" maxlength="11" id="txtMobile" onfocus="clickMobile();" onblur="checkMobile();" type="text">
                    <span id="spanMobile" style="vertical-align: top;"></span>
                </td>
            </tr>
            <tr style="height: 32px;">
                <td style="text-align: right; height: 32px; width: 152px;">
                    QQ：
                </td>
                <td style="height: 32px">
                    <input name="txtQQ" maxlength="10" id="txtQQ" onkeyup="this.value=this.value.replace(/\D/g,'')" onfocus="clickQQ();" onblur="checkQQ();" type="text">
                    <span id="spanQQ" style="vertical-align: top;"></span>
                </td>
            </tr>
            <tr style="height: 32px;">
                <td style="width: 152px; height: 30px;" align="right">
                    &nbsp;
                </td>
                <td class="browse" style="height: 30px">
                    <p style="height: 10px;">
                    </p>
                    <input name="ImageButton1" id="ImageButton1" src="../../image/icons/sumit.jpg" onclick="if (typeof(checkData) == 'function') {if (checkData() == false) { return false; }};this.disabled  = true;isalert=false;__doPostBack('ImageButton1','');" style="vertical-align: middle;" type="image">
                </td>
            </tr>
            </tbody></table>
        <p style="height: 20px;">
        </p>
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
        <iframe id="popIframe" class="popIframe" frameborder="0"></iframe>
    </div>
    <div id="mask">
    </div>
    <input name="hfState" id="hfState" value="1" type="hidden">

    <script type="text/javascript">
        //<![CDATA[
        (function() {var fn = function() {$get("toolkit_HiddenField").value = '';Sys.Application.remove_init(fn);};Sys.Application.add_init(fn);})();WebForm_AutoFocus('txtTitle');Sys.Application.add_init(function() {
            $create(Sys.Extended.UI.CascadingDropDownBehavior, {"Category":"Province","ClientStateFieldID":"CascadingDropDown2_ClientState","LoadingText":"省份加载中...","PromptText":"请选择省份","ServiceMethod":"GetProvinceContents","ServicePath":"SNWebService.asmx","id":"CascadingDropDown2"}, null, null, $get("ddlProvince"));
        });
        Sys.Application.add_init(function() {
            $create(Sys.Extended.UI.CascadingDropDownBehavior, {"Category":"City","ClientStateFieldID":"CascadingDropDown1_ClientState","LoadingText":"城市加载中...","ParentControlID":"ddlProvince","PromptText":"请选择城市","ServiceMethod":"GetCityContents","ServicePath":"SNWebService.asmx","id":"CascadingDropDown1"}, null, null, $get("ddlCity"));
        });
        Sys.Application.add_init(function() {
            $create(Sys.Extended.UI.CascadingDropDownBehavior, {"Category":"Villiage","ClientStateFieldID":"CascadingDropDown3_ClientState","LoadingText":"区县加载中...","ParentControlID":"ddlCity","PromptText":"请选择区县","ServiceMethod":"GetViliageContents","ServicePath":"SNWebService.asmx","id":"CascadingDropDown3"}, null, null, $get("ddlVilliage"));
        });
        //]]>
    </script>
    <input value="0" id="hiddenInputToUpdateATBuffer_CommonToolkitScripts" name="hiddenInputToUpdateATBuffer_CommonToolkitScripts" type="hidden"></form>

<script type="text/javascript">
    var type1id=317;
    var style=$("#ddlProvince").css("display");
    function clickCity()
    {
        if(style.toLowerCase()=="none")
        {
            getmsg(my("spanCity"),'reg2.gif','#003cc8','请选择区县');
            $("#divCity").removeClass("inputBorder");
        }
        else
        {
            getmsg(my("spanCity"),'reg2.gif','#003cc8','请选择面向城市');
            $("#divCity").removeClass("inputBorder");
        }
    }
    function checkCity()
    {
        var style=$("#ddlProvince").css("display");
        var spancity=my("spanCity");
        if(style.toLowerCase()=="none")
        {
            var area=$("#ddlVilliage").find("option:selected").val();
            if(area==""||area=="0")
            {
                getmsg(spancity,'err_icon.gif','#FF0000','请选择区县');
                $("#divCity").addClass("inputBorder");
                return false;
            }
            else
            {
                getmsg(spancity,'right_icon.gif','','');
                $("#divCity").removeClass("inputBorder");
                return;
            }
        }
        else
        {
            var province=$("#ddlProvince").find("option:selected").val();
            var city=$("#ddlCity").find("option:selected").val();
            var area=$("#ddlVilliage").find("option:selected").val();
            if(province==""||province=="0")
            {
                getmsg(spancity,'err_icon.gif','#FF0000','请选择省份');
                $("#divCity").addClass("inputBorder");
                return false;
            }
            else if(city==""||city=="0")
            {
                getmsg(spancity,'err_icon.gif','#FF0000','请选择城市');
                $("#divCity").addClass("inputBorder");
                return false;
            }
            else
            {
                if(type1id=="57")
                {
                    if(area==""||area=="0")
                    {
                        getmsg(spancity,'err_icon.gif','#FF0000','请选择区县');
                        $("#divCity").addClass("inputBorder");
                        return false;
                    }
                }
                getmsg(spancity,'right_icon.gif','','');
                $("#divCity").removeClass("inputBorder");
                return;
            }
        }
    }
    function inputblur() {
        var target = document.getElementById("txtContent");
        var stext = target.value.replace(/\s+/g, "");
        if (stext == "") {
            target.style.color = "#666";
            target.value = "例如对求租物品的要求、对自己情况的描述等…不能填写QQ、电话等联系方式。";
            $("#txtContent").addClass("inputBorder");
            $("#ltlContent").html("<img src='../../image/icons/err_icon.gif'  style='vertical-align: middle' />&nbsp;<font color='FF0000'>详细描述为必填项</font>");
            return false;
        }
        else {
            if (stext == "例如对求租物品的要求、对自己情况的描述等…不能填写QQ、电话等联系方式。") {
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
</script>
<?php
include'../model/footer.html';
?>

</body>
</html>