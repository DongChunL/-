<?php
include '../../sql/phpConnectDb.php';
session_start();
$username = $_SESSION['admin'];
?>
<style>
    .InfoBox input{
        /*  border: 0;*/
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
    #lastForm select{
        font-size: 20px;
        height: 30px;
    }
</style>
<html>
<head>
    <meta charset="utf-8">
    <script src="../../jquery-3.3.1/jquery-3.3.1.min.js"></script>
</head>
<body>
<fieldset id="manageUser" style="height:680px;width: 900px;">
    <legend style="font-size: 24px;color: #666;">添加管理员</legend>
<div class="InfoBox">
    <form action="addAdminSuccess.php" method="post" id="lastForm">
        <table>
            <tr><td>账号：<input type="text"width="60px"style="height: 30px;" name="username"  value=""></td></tr>
            <tr><td>密码：<input type="password"width="60px"style="height: 30px;" id="passwd" name="passwd"  value=""></td></tr>
            <tr><td>确认密码：<input type="password"style="height: 30px;"width="60px" class="readonly" id="confirmPasswd" name="confirmPasswd"  value=""></td></tr>
            <tr><td>邮箱：<input type="text" style="height: 30px;" name="email" value=""></td></tr>
            <tr><td>手机：<input type="text" style="height: 30px;" name="phone" value=""></td></tr>

            <tr>
                <td width="83%">
                    <div id="divCity" style="float: left;">
                        <div id="UpdatePanel1">
                            默认地址：省:<select id="provinces" name="provinces">  <option value="">请选择省份</option></select>
                            市:<select id="citys" name="city"><option value="">请选择市</option></select>
                            区:<select id="countys" name="area"><option value="">请选择县</option></select>
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
                <td><input type="submit" value="添加"></td>
            </tr>
            <div id="tip" style="color: red;"></div>
        </table>
    </form>
</div>
</fieldset>
<script>
    var passwd = document.getElementById('passwd').value;
    var confirmPasswd = document.getElementById('confirmPasswd').value;
    if(passwd!=confirmPasswd){
        document.getElementById('tip').innerHTML="*输入密码不一致"
    }
</script>
</body>
</html>