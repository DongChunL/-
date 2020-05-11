// JScript 文件

/*******************************************修改收件地址****************************************************************************/
function CheckAddr() {
    $("#Div_Adr").hide();
    $("#editAdr").show();
}
function Cancel() {
    $("#editAdr").hide();
    $("#Div_Adr").show();
}
function SetAddr() {
    var username = $("#").val();
}
//验证联系人
function checkUserName() {
    var uname = String($.trim($("#TextUserName").val()));
    var reg = /^[\u4e00-\u9fa5]{1,4}$/;
    if (uname == "") {
        $("#spanUserName").html("<img src='../../image/icons/err_icon.gif' style='vertical-align: middle'/>&nbsp;<font color='#FF0000'>输入1-4个字</font>");
        $("#TextUserName").removeClass("inputBorder");
    }
    else {
        if (!reg.test(uname) || uname.length > 5) {
            $("#spanUserName").html("<img src='../../image/icons/err_icon.gif' style='vertical-align: middle'/>&nbsp;<font color='#FF0000'>输入1-4个字</font>");
            $("#TextUserName").addClass("inputBorder");
            return false;
        }
        else {
            $("#spanUserName").html("<img src='../../image/icons/right_icon.gif' style='vertical-align: middle'/>");
            $("#TextUserName").removeClass("inputBorder");
        }
    }
}
//验证手机
function checkMobile() {
    var mobile = String($.trim($("#TextMobile").val()));
    var reg = /^1\d{10}$/;
    if (mobile == "") {
        $("#spanMobile").html("<img src='../../image/icons/err_icon.gif' style='vertical-align: middle' /><font color='#FF0000'>请输入真实有效的手机号码</font>");
        $("#TextMobile").removeClass("inputBorder");
    }
    else {
        if (!reg.test(mobile)) {
            $("#spanMobile").html("<img src='../../image/icons/err_icon.gif' style='vertical-align: middle'/>&nbsp;<font color='#FF0000'>手机格式错误，格式如：13512345678</font>");
            $("#TextMobile").addClass("inputBorder");
            return false;
        }
        else {
            $("#spanMobile").html("<img src='../../image/icons/right_icon.gif' style='vertical-align: middle'/>");
            $("#TextMobile").removeClass("inputBorder");
        }
    }
}
function checkData() {
    if ($.trim($("#TextUserName").val()) == "") {
        $("#spanUserName").html("<img src='../../image/icons/reg2.gif' style='vertical-align: middle' /><font color='#003cc8'>请输入1-4个字</font>");
        return;
    }
    else {
        if (checkUserName() == false) {
            return;
        }
    }
    if ($.trim($("#TextMobile").val()).length == 0) {
        $("#spanMobile").html("<img src='../../image/icons/reg2.gif' style='vertical-align: middle' /><font color='#003cc8'>请输入真实有效的手机号码</font>");
        return;
    }
    else {
        if (checkMobile() == false) {
            return;
        }
    }
    if ($.trim($("#TextAddr").val()).length < 5) {
        $("#spanAddr").html("<img src='../../image/icons/err_icon.gif' style='vertical-align: middle'/>&nbsp;<font color='#FF0000'>联系地址不少于5个字</font>");
        return;
    }
    $("#Span_Addr").html($.trim($("#TextAddr").val()));
    $("#Span_Mobile").html($.trim($("#TextMobile").val()));
    $("#Span_UserName").html($.trim($("#TextUserName").val()));
    Cancel();
}

/*************************************************订单提交******************************************************************/

function ModifNum(type, oper) {
    var flag = "0";
    if (type == "1") {
        //租期
        var zuqi = $("#TextZuqi").val();
        if (oper == "+") {
            $("#TextZuqi").val(parseInt(zuqi) + 1);
            flag = "1";
        }
        else {
            if (parseInt(zuqi) > 1) {
                $("#TextZuqi").val(parseInt(zuqi) - 1);
                flag = "1";
            }
        }
    }
    else if (type == "2") {
        //数量
        var bigtype = $("#Hf_type").val();
        if (bigtype == "57")
        { $("#TextAmount").val("1"); } else {
            var amount = $("#TextAmount").val();
            if (oper == "+") {
                $("#TextAmount").val(parseInt(amount) + 1);
                flag = "1";
            }
            else {
                if (parseInt(amount) > 1) {
                    $("#TextAmount").val(parseInt(amount) - 1);
                    flag = "1";
                }
            }
        }
    }
    if (flag == "1") {
        ActionMoeny();
    }
}
function ActionMoeny() {
    var zprice = $("#Span_ZuMoney").text();
    var yprice = $("#Span_YaMoney").text();
    var zuqi = $("#TextZuqi").val();
    var amount = $("#TextAmount").val();
    var moneyAll = (parseFloat(zprice) * parseInt(zuqi) * parseInt(amount) + parseFloat(yprice)).toFixed(2);
    if (!isNaN(zprice) && !isNaN(yprice) && !isNaN(zuqi) && !isNaN(amount)) {
        $("#Span_Money").html((parseFloat(zprice) * parseInt(zuqi) * parseInt(amount) + parseFloat(yprice)).toFixed(2));
        document.getElementById('orderMoney').setAttribute('value',moneyAll);

    }
    else {
        $("#Span_Money").html("&yen;0");
        document.getElementById('orderMoney').setAttribute('value','0');
    }
}
function TextKeyPass() {


    if (event.keyCode < 48 || event.keyCode > 57) {
        event.returnValue = false;
    }
    //  onafterpaste = "this.value=this.value.replace(/\D/g,'')"

}
function Textkeyup(type) {
    if (type == "1") {
        var data = $("#TextZuqi").val().replace(/\D/g, '');
        var datas = data.split("");
        for (var i = 0; i < datas.length; i++) {
            if (datas[i] != "0") {
                data = data.substr(i, datas.length - i);
                break;
            }
        }
        data = data == "" ? "1" : data;
        $("#TextZuqi").val(data);
    }
    else if (type == "2") {
        var data = $("#TextAmount").val().replace(/\D/g, '');
        var datas = data.split("");
        for (var i = 0; i < datas.length; i++) {
            if (datas[i] != "0") {
                data = data.substr(i, datas.length - i);
                break;
            }
        }
        data = data == "" ? "1" : data;
        $("#TextAmount").val(data);
    }
    ActionMoeny();
}