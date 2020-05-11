$(document).ready(function() {
    $("#divPhone").contents().focus(function() { clickPhone(); }).blur(function() { checkPhone(); }); $("#divTime").contents().focus(function() { clickTime(); }).blur(function() { checkTime(); }); $("#UpdatePanel1").contents().focus(function() { clickCity(); }).blur(function() { checkCity(); }); $("#checkAllCity").click(function() {
        if ($(this).attr("checked"))
        { $("#divCity").css("display", "none"); getmsg(my("spanCity"), 'right_icon.gif', '', ''); $("#divCity").removeClass("inputBorder"); return; }
        else
        { $("#divCity").css("display", ""); checkCity(); }
    });
}); var Obj = ''; document.onmouseup = MUp; document.onmousemove = MMove; function MDown(Object) {
    Obj = Object.id
    document.all(Obj).setCapture()
    pX = event.x - document.all(Obj).style.pixelLeft; pY = event.y - document.all(Obj).style.pixelTop;
}
function MMove() { if (Obj != '') { document.all(Obj).style.left = event.x - pX; document.all(Obj).style.top = event.y - pY; } }
function MUp() { if (Obj != '') { document.all(Obj).releaseCapture(); Obj = ''; } }
Date.prototype.format = function(format) {
    var o = { "M+": this.getMonth() + 1, "d+": this.getDate(), "h+": this.getHours(), "m+": this.getMinutes(), "s+": this.getSeconds(), "q+": Math.floor((this.getMonth() + 3) / 3), "S": this.getMilliseconds() }
    if (/(y+)/.test(format))
        format = format.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length)); for (var k in o)
        if (new RegExp("(" + k + ")").test(format))
            format = format.replace(RegExp.$1, RegExp.$1.length == 1 ? o[k] : ("00" + o[k]).substr(("" + o[k]).length)); return format;
}
function my(divid)
{ return document.getElementById(divid); }
function getmsg(div, pic, color, msg)
{ div.innerHTML = "&nbsp;&nbsp;<img src='../../image/icons/" + pic + "'  style='vertical-align: middle' />&nbsp;<font color='" + color + "'>" + msg + "</font>"; }
//function checkSelect(num) {
//    if (num == 1) {
//        if (document.getElementById("FreeRent").checked)
//        { var divtitle = my("spanRentMoney"); getmsg(divtitle, 'right_icon.gif', '', ''); $("#txtRentMoney").removeClass("inputBorder"); $("#txtRentMoney").val(""); }
//        else
//        { checkRentMoney(); $("#txtRentMoney").focus(); }
//    }
//    else {
//        if (document.getElementById("FreeDeposit").checked)
//        { var divtitle = my("spanDepositMoney"); getmsg(divtitle, 'right_icon.gif', '', ''); $("#txtDepositMoney").removeClass("inputBorder"); $("#txtDepositMoney").val(""); }
//        else
//        { checkDepositMoney(); $("#txtDepositMoney").focus(); }
//    }
//}
function change() {
    var content = $.trim($("#txtContent").val()); var word = my("spanWord"); if (content.length > 2000)
    { $("#txtContent").val(content.substring(0, 2000)); return false; }
    else
        word.innerHTML = 2000 - content.length;
}
function CheckBrowser() {
    var app = navigator.appName; var verStr = navigator.appVersion; if (app.indexOf('Netscape') != -1) { my("txtContent").addEventListener("input", change, false); }
    else if (app.indexOf('Microsoft') != -1) { my("txtContent").onpropertychange = change; }
}
window.onload = CheckBrowser; function clickTitle()
{ getmsg(my('spanTitle'), 'reg2.gif', '#003cc8', '2-30个字，不能填写电话'); $("#txtTitle").removeClass("inputBorder"); }
function checkTitle() {
    var title = $.trim($("#txtTitle").val()); var spantitle = my("spanTitle"); if (title == "")
    { getmsg(spantitle, 'err_icon.gif', '#FF0000', '请输入标题'); $("#txtTitle").addClass("inputBorder"); return false; }
    else {
        if (title.length < 2)
        { getmsg(spantitle, 'err_icon.gif', '#FF0000', '标题不足2个字'); $("#txtTitle").addClass("inputBorder"); return false; }
        else if (title.length > 30)
        { getmsg(spantitle, 'err_icon.gif', '#FF0000', '标题字数太长'); $("#txtTitle").addClass("inputBorder"); return false; }
        else {
            var flag = 0; for (var i = 0; i < title.length; i++) {
                if (title.charCodeAt(i) <= 0 || title.charCodeAt(i) >= 255)
                { flag = 1; break; }
            }
            if (flag == 0)
            { getmsg(spantitle, 'err_icon.gif', '#FF0000', '标题太过简单'); $("#txtTitle").addClass("inputBorder"); return false; }
            getmsg(spantitle, 'right_icon.gif', '', ''); $("#txtTitle").removeClass("inputBorder"); return;
        }
    }
}
function clickTime()
{ getmsg(my('spanTime'), 'reg2.gif', '#003cc8', '请选择日期'); $("#divTime").removeClass("inputBorder"); }
function checkTime() {
    var begintime = $.trim($("#txtBeginTime").val()); var endtime = $.trim($("#txtEndTime").val()); var spantime = my("spanTime"); if (begintime == "")
    { getmsg(spantime, 'err_icon.gif', '#FF0000', '请选择日期'); $("#divTime").addClass("inputBorder"); return false; }
    else {
        var reg = /^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))/; if (!reg.test(begintime))
        { getmsg(spantime, 'err_icon.gif', '#FF0000', '日期格式如：2010-01-01'); $("#divTime").addClass("inputBorder"); return false; }
        else {
            if (endtime == "")
            { getmsg(spantime, 'err_icon.gif', '#FF0000', '请选择日期'); $("#divTime").addClass("inputBorder"); return false; }
            else {
                if (!reg.test(endtime))
                { getmsg(spantime, 'err_icon.gif', '#FF0000', '日期格式如：2010-01-01'); $("#divTime").addClass("inputBorder"); return false; }
                else {
                    var today = new Date(); if (begintime > endtime)
                    { getmsg(spantime, 'err_icon.gif', '#FF0000', '开始日期不能大于结束日期'); $("#divTime").addClass("inputBorder"); return false; }
                    else if (endtime < today.format('yyyy-MM-dd').toString())
                    { getmsg(spantime, 'err_icon.gif', '#FF0000', '结束日期不能小于当前日期'); $("#divTime").addClass("inputBorder"); return false }
                    else
                    { getmsg(spantime, 'right_icon.gif', '', ''); $("#divTime").removeClass("inputBorder"); return; }
                }
            }
        }
    }
}
function clickRentMoney()
{ getmsg(my('spanRentMoney'), 'reg2.gif', '#003cc8', '租金为0以外的整数'); $("#txtRentMoney").removeClass("inputBorder"); }
function checkRentMoney() {
    var rentmoney = $.trim($("#txtRentMoney").val());
    var spanrentmoney = my("spanRentMoney");
    if (rentmoney == "") {
        getmsg(spanrentmoney, 'err_icon.gif', '#FF0000', '请输入0以外的整数'); $("#txtRentMoney").addClass("inputBorder"); return false;
        //        if (!my("FreeRent").checked)
        //        { getmsg(spanrentmoney, 'err_icon.gif', '#FF0000', '请输入0以外的整数或选择面议'); $("#txtRentMoney").addClass("inputBorder"); return false; }
        //        else
        //        { getmsg(spanrentmoney, 'right_icon.gif', '', ''); $("#txtRentMoney").removeClass("inputBorder"); return; }
    }
    else {
        var reg = /^[1-9]\d{0,5}$/;
        //my("FreeRent").checked = false;
        if (!reg.test(rentmoney)) {
            getmsg(spanrentmoney, 'err_icon.gif', '#FF0000', '租金为0以外的整数');
            $("#txtRentMoney").addClass("inputBorder"); return false;
        }
        else
        { getmsg(spanrentmoney, 'right_icon.gif', '', ''); $("#txtRentMoney").removeClass("inputBorder"); return; }
    }
}
function clickDepositMoney()
{ getmsg(my('spanDepositMoney'), 'reg2.gif', '#003cc8', '押金为一个整数'); $("#txtDepositMoney").removeClass("inputBorder"); }
function checkDepositMoney() {
    var depositmoney = $.trim($("#txtDepositMoney").val());
    var spandeposit = my("spanDepositMoney");
    if (depositmoney == "") {
        $("#spanDepositMoney").text("");
        $("#txtDepositMoney").removeClass("inputBorder"); return;
    }
    else {
        var reg = /^[0-9]\d{0,4}$/;
//         my("FreeDeposit").checked = false;
        if (!reg.test(depositmoney))
        { getmsg(spandeposit, 'err_icon.gif', '#FF0000', '押金为一个整数'); $("#txtDepositMoney").addClass("inputBorder"); return false; }
        else
        { getmsg(spandeposit, 'right_icon.gif', '', ''); $("#txtDepositMoney").removeClass("inputBorder"); return; }
    }
}
function clickNumber()
{ getmsg(my('spanNumber'), 'reg2.gif', '#003cc8', '数量为0以外的整数'); $("#txtNumber").removeClass("inputBorder"); }
function checkNumber() {
    var number = $.trim($("#txtNumber").val()); var spannumber = my("spanNumber"); if (number == "")
    { getmsg(spannumber, 'err_icon.gif', '#FF0000', '数量为0以外的整数'); $("#txtNumber").addClass("inputBorder"); return; }
    else {
        var reg = /^[1-9]\d{0,3}$/; if (!reg.test(number))
        { getmsg(spannumber, 'err_icon.gif', '#FF0000', '数量为0以外的整数'); $("#txtNumber").addClass("inputBorder"); return false; }
        else
        { getmsg(spannumber, 'right_icon.gif', '', ''); $("#txtNumber").removeClass("inputBorder"); return; }
    }
}
function clickAddr()
{ getmsg(my('spanAddr'), 'reg2.gif', '#003cc8', '地址为6-35个字'); $("#txtAddr").removeClass("inputBorder"); }
function checkAddr() {
    var addr = $.trim($("#txtAddr").val()); var spanaddr = my("spanAddr"); if (addr == "")
    { $("#spanAddr").text(""); $("#txtAddr").removeClass("inputBorder"); return; }
    else {
        if (addr.length < 6)
        { getmsg(spanaddr, 'err_icon.gif', '#FF0000', '地址不足6个字'); $("#txtAddr").addClass("inputBorder"); return false; }
        getmsg(spanaddr, 'right_icon.gif', '', ''); $("#txtAddr").removeClass("inputBorder"); return;
    }
}
function clickContact()
{ getmsg(my("spanContact"), 'reg2.gif', '#003cc8', '2-4个字，不能填写电话和特殊符号'); $("#txtContact").removeClass("inputBorder"); }
function checkContact() {
    var contact = $.trim($("#txtContact").val()); var spancontact = my("spanContact"); if (contact == "")
    { getmsg(spancontact, 'err_icon.gif', '#FF0000', '请输入联系人名称'); $("#txtContact").addClass("inputBorder"); return false; }
    else {
        if (contact.length < 2)
        { getmsg(spancontact, 'err_icon.gif', '#FF0000', '联系人不足2个字'); $("#txtContact").addClass("inputBorder"); return false; }
        else if (contact.length > 4)
        { getmsg(spancontact, 'err_icon.gif', '#FF0000', '联系人名称过长'); $("#txtContact").addClass("inputBorder"); return false; }
        else {
            var reg = /^[\w\u4e00-\u9fa5]{2,4}$/; if (!reg.test(contact))
            { getmsg(spancontact, 'err_icon.gif', '#FF0000', '联系人不能填写特殊符号'); $("#txtContact").addClass("inputBorder"); return false; }
            else
            { getmsg(spancontact, 'right_icon.gif', '', ''); $("#txtContact").removeClass("inputBorder"); return; }
        }
    }
}
function checkMobileAndPhone() {
    var mobile = $.trim($("#txtMobile").val()); var phone = $.trim($("#txtMiddle").val()); var spanphone = my("spanPhone"); if (mobile == "" && phone == "")
    { getmsg(spanphone, 'err_icon.gif', '#FF0000', '电话和手机可任填一项'); return false; }
    return;
}
function clickPhone()
{ getmsg(my('spanPhone'), 'reg2.gif', '#003cc8', '注明区号，格式如：010-12345678-(012)'); $("#divPhone").removeClass("inputBorder"); }
function checkPhone() {
    var phone = $.trim($("#txtMiddle").val()); var spanphone = my("spanPhone"); if (phone != "") {
        var reg = /^((0\d{2,3})-)(\d{7,8})(-(\d{1,5}))?$/; var tel1 = $.trim($("#txtPre").val()); var tel3 = $.trim($("#txtEnd").val()); if (tel1 != "")
            phone = tel1 + "-" + phone; if (tel3 != "")
            phone = phone + "-" + tel3; if (!reg.test(phone))
        { getmsg(spanphone, 'err_icon.gif', '#FF0000', '格式如：010-12345678-(012)'); $("#divPhone").addClass("inputBorder"); return false; }
        else
        { getmsg(spanphone, 'right_icon.gif', '', ''); $("#divPhone").removeClass("inputBorder"); return; }
    }
    else
    { $("#spanPhone").text(""); $("#divPhone").removeClass("inputBorder"); return; }
}
function clickMobile()
{ getmsg(my('spanMobile'), 'reg2.gif', '#003cc8', '请输入手机号码，格式如：13512345678'); $("#txtMobile").removeClass("inputBorder"); }
function checkMobile() {
    var mobile = $.trim($("#txtMobile").val()); var spanmobile = my("spanMobile"); if (mobile != "") {
        var reg = /^1\d{10}$/; if (reg.test(mobile))
        { getmsg(spanmobile, 'right_icon.gif', '', ''); $("#txtMobile").removeClass("inputBorder"); return; }
        else
        { getmsg(spanmobile, 'err_icon.gif', '#FF0000', '手机格式如：13512345678'); $("#txtMobile").addClass("inputBorder"); return false; }
    }
    else
    { $("#spanMobile").text(""); $("#txtMobile").removeClass("inputBorder"); return; }
}
function clickQQ()
{ getmsg(my('spanQQ'), 'reg2.gif', '#003cc8', '请输入您常用的QQ号码'); $("#txtQQ").removeClass("inputBorder"); }
function checkQQ() {
    var qq = $.trim($("#txtQQ").val()); var spanqq = my("spanQQ"); if (qq == "")
    { $("#spanQQ").text(""); $("#txtQQ").removeClass("inputBorder"); return; }
    else {
        var reg = /^\d?\d{5,9}$/; if (!reg.test(qq))
        { getmsg(spanqq, 'err_icon.gif', '#FF0000', '格式如：1234567'); $("#txtQQ").addClass("inputBorder"); return false; }
        else
        { getmsg(spanqq, 'right_icon.gif', '', ''); $("#txtQQ").removeClass("inputBorder"); return; }
    }
}
function inputfocus(target) {
    target.style.color = "#000"; var stext = target.value; if (stext == "例如对求租物品的要求、对自己情况的描述等…不能填写QQ、电话等联系方式。")
    { target.value = ""; }
    $("#txtContent").removeClass("inputBorder"); $("#ltlContent").html("");
}
function inputblur() {
    var target = document.getElementById("txtContent"); var stext = target.value.replace(/\s+/g, ""); if (stext == "")
    { target.style.color = "#666"; target.value = "例如对求租物品的要求、对自己情况的描述等…不能填写QQ、电话等联系方式。"; $("#txtContent").addClass("inputBorder"); $("#ltlContent").html("<img src='../images/err_icon.gif'  style='vertical-align: middle' />&nbsp;<font color='FF0000'>详细描述为必填项</font>"); return false; }
    else {
        if (stext == "例如对求租物品的要求、对自己情况的描述等…不能填写QQ、电话等联系方式。")
        { $("#txtContent").addClass("inputBorder"); $("#ltlContent").html("<img src='../../image/icons/err_icon.gif'  style='vertical-align: middle' />&nbsp;<font color='FF0000'>详细描述为必填项</font>"); return false; }
        else {
            if (stext.length < 10)
            { $("#txtContent").addClass("inputBorder"); $("#ltlContent").html("<img src='../../image/icons/err_icon.gif'  style='vertical-align: middle' />&nbsp;<font color='FF0000'>至少输入10个字</font>"); return false; }
            else
            { $("#txtContent").removeClass("inputBorder"); $("#ltlContent").html(""); return; }
        }
    }
}
function testAllCity() {
    if ($("#checkAllCity").attr("checked"))
    { getmsg(my("spanCity"), 'right_icon.gif', '', ''); $("#divCity").removeClass("inputBorder"); return; }
    else {
        if (checkCity() == false)
        { return false; }
    }
}
function checkData() {
    if (checkTitle() == false)
    { window.location.href = "#newFlow"; return false; }
    if (typeof ($("#checkAllCity")[0]) == "undefined") {
        if (checkCity() == false)
        { window.location.href = "#newFlow"; return false; }
    }
    else {
        if (testAllCity() == false)
        { window.location.href = "#newFlow"; return false; }
    }
    if (checkTime() == false)
    { window.location.href = "#newFlow"; return false; }
    if (checkRentMoney() == false)
    { window.location.href = "#newFlow"; return false; }
    if (checkDepositMoney() == false)
    { window.location.href = "#newFlow"; return false; }
    if ($("#txtNumber")[0] != undefined) {
        if (checkNumber() == false)
        { window.location.href = "#newFlow"; return false; }
    }
    if (checkAddr() == false)
    { window.location.href = "#newFlow"; return false; }
    if (inputblur() == false)
    { return false; }
    if (checkContact() == false)
    { return false; }
    if (checkMobileAndPhone() == false)
    { return false; }
    if (checkPhone() == false)
    { return false; }
    if (checkMobile() == false)
    { return false; }
    if (checkQQ() == false)
    { return false; }
    if ($.trim($("#hfState").val()) == "0")
    { showWin(); return false; }
}