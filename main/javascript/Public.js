function my(divid)
{ return document.getElementById(divid); }
function getmsg(div, pic, color, msg)
{ div.innerHTML = "&nbsp;&nbsp;<img src='../../image/icons/" + pic + "'  style='vertical-align: middle' />&nbsp;<font color='" + color + "'>" + msg + "</font>"; }
function getmsg1(div, pic, color, msg)
{ div.innerHTML = "&nbsp;<img src='../../image/icons/" + pic + "'  style='vertical-align: middle' />&nbsp;<font color='" + color + "'>" + msg + "</font>"; }
function checkradio(name) {
    var arrs = document.getElementsByName(name); var len = arrs.length; for (var i = 0; i < len; i++) {
        if (arrs[i].checked == true)
        { return true; }
    }
    return false;
}
function checkTitle1()
{ getmsg(my('spanTitle'), 'reg2.gif', '#003cc8', '2-30个字，不能填写电话和特殊符号'); $("#TitleBox").removeClass("inputBorder"); }
function checkTitle() {
    var title = my("TitleBox").value.replace(/(^\s*)|(\s*$)/g, ""); var divtitle = my("spanTitle"); if (title == "")
    { getmsg(divtitle, 'err_icon.gif', '#FF0000', '请输入标题'); $("#TitleBox").addClass("inputBorder"); return false; }
    else {
        var reg = /^[a-zA-Z0-9_\s\u4e00-\u9fa5]{2,30}$/; if (title.length < 2)
        { getmsg(divtitle, 'err_icon.gif', '#FF0000', '标题不足2个字'); $("#TitleBox").addClass("inputBorder"); return false; }
        else if (title.length > 30)
        { getmsg(divtitle, 'err_icon.gif', '#FF0000', '标题字数太长'); $("#TitleBox").addClass("inputBorder"); return false; }
        else {
            var flag = 0; for (var i = 0; i < title.length; i++) {
                if (title.charCodeAt(i) <= 0 || title.charCodeAt(i) >= 255)
                { flag = 1; break; }
            }
            if (flag == 0)
            { getmsg(divtitle, 'err_icon.gif', '#FF0000', '标题太过简单'); $("#TitleBox").addClass("inputBorder"); return false; }
            if (!reg.test(title))
            { getmsg(divtitle, 'err_icon.gif', '#FF0000', '标题为2-30个字，不能填写电话和特殊符号'); $("#TitleBox").addClass("inputBorder"); return false; }
            else {
                var regnum = /\d{7,30}/g; if (regnum.test(title))
                { getmsg(divtitle, 'err_icon.gif', '#FF0000', '不能包含联系方式'); $("#TitleBox").addClass("inputBorder"); return false; }
                else {
                    var pid = my("hfId").value;
                    $.ajax({ type: "GET", url: "carPublic.php?r=" + Math.round(20000), data: { _title: title, _pid: pid }, success: function(result) {
                            if (parseInt(result) == 1)
                            { getmsg(divtitle, 'err_icon.gif', '#FF0000', '该标题已经存在'); $("#TitleBox").addClass("inputBorder"); return false; }
                            else if (parseInt(result) == 2) {
                                getmsg(divtitle, 'err_icon.gif', '#FF0000', '标题中包含非法字符'); $("#TitleBox").addClass("inputBorder"); return false;
                            }
                            else {
                                getmsg(divtitle, 'right_icon.gif', '', ''); $("#TitleBox").removeClass("inputBorder"); return;
                            }
                        }
                    });
                }
            }
        }
    }
}
function checkCity() {
    if (typeof ($("#checkMoreCity")[0]) == "undefined")
    { testcity(); }
    else {
        if (my("checkMoreCity").checked == false && my("checkAllCity").checked == false)
        { testcity(); }
    }
}
function testcity() {
    var shorttime = my("ddlProvince");
    var city = my("ddlCity"); var area = my("ddlVilliage"); var divshorttime = my("divCity");
    if (shorttime.options[shorttime.selectedIndex].value == 0 || shorttime.options[shorttime.selectedIndex].value == "") {
        divshorttime.style.display = "block"; getmsg(divshorttime, 'err_icon.gif', '#FF0000', '请选择省份'); $("#lblCity").addClass("inputBorder"); return false;
    }
    else if (city.options[city.selectedIndex].value == 0 || city.options[city.selectedIndex].value == "") {

        //  searchByStationName(shorttime.options[shorttime.selectedIndex].text);
        divshorttime.style.display = "block"; getmsg(divshorttime, 'err_icon.gif', '#FF0000', '请选择城市'); $("#lblCity").addClass("inputBorder"); return false;
    }
    else if (area.options[area.selectedIndex].value == 0 || area.options[area.selectedIndex].value == "") {
        // searchByStationName(shorttime.options[shorttime.selectedIndex].text + city.options[city.selectedIndex].text);
        divshorttime.style.display = "block"; getmsg(divshorttime, 'err_icon.gif', '#FF0000', '请选择区县'); $("#lblCity").addClass("inputBorder"); return false;
    }
    else {
        //  searchByStationName(shorttime.options[shorttime.selectedIndex].text + city.options[city.selectedIndex].text + area.options[area.selectedIndex].text);
        divshorttime.style.display = "none"; $("#lblCity").removeClass("inputBorder"); return;
    }
}




function testcity1() {
    var shorttime = my("ddlProvince");
    var city = my("ddlCity"); var area = my("ddlVilliage"); var divshorttime = my("divCity");
    if (shorttime.options[shorttime.selectedIndex].value == 0 || shorttime.options[shorttime.selectedIndex].value == "")
    { divshorttime.style.display = "block";  getmsg(divshorttime, 'err_icon.gif', '#FF0000', '请选择省份!'); $("#lblCity").addClass("inputBorder"); return false; }
    else if (city.options[city.selectedIndex].value == 0 || city.options[city.selectedIndex].value == "") {
        //searchByStationName(shorttime.options[shorttime.selectedIndex].text);
        divshorttime.style.display = "block";  getmsg(divshorttime, 'err_icon.gif', '#FF0000', '请选择城市!'); $("#lblCity").addClass("inputBorder"); return false;
    }
    else {
        //  searchByStationName(shorttime.options[shorttime.selectedIndex].text + city.options[city.selectedIndex].text);
        divshorttime.innerText = ""; divshorttime.style.display = "none"; $("#lblCity").removeClass("inputBorder"); return; }
}
function checkRentMoney1() {
    getmsg(my('spanRentMoney'), 'reg2.gif', '#003cc8', '租金为0以外的整数，租赁宝建议您填写真实有效租金以提高可信度');
    $("#RentMoneyBox").removeClass("inputBorder");
}
function checkRentMoney() {
    var rentmoney = my("RentMoneyBox").value.replace(/(^\s*)|(\s*$)/g, "");
    var divrent = my("spanRentMoney");
    if (rentmoney == "") {
        getmsg(divrent, 'err_icon.gif', '#FF0000', '请输入0以外的整数');
        $("#RentMoneyBox").addClass("inputBorder"); return false;
    }
    else {
        var ddd = /^[1-9]\d{0,5}$/;
        if (!ddd.test(rentmoney)) {
            getmsg(divrent, 'err_icon.gif', '#FF0000', '租金为0以外的整数');
            if (rentmoney.length > 6)
            { getmsg(divrent, 'err_icon.gif', '#FF0000', '租金最大为6位整数'); }
            $("#RentMoneyBox").addClass("inputBorder");
            return false;
        }
        else {
            getmsg(divrent, 'right_icon.gif', '', '');
            $("#RentMoneyBox").removeClass("inputBorder"); return;
        }
    }
}
function checkDepositMoney1() {
    getmsg(my('spanDepositMoney'), 'reg2.gif', '#003cc8', '押金为一个整数');
    $("#DepositBox").removeClass("inputBorder");
}
function checkDepositMoney() {
    var depositmoney = my("DepositBox").value.replace(/(^\s*)|(\s*$)/g, "");
    var divdeposit = my("spanDepositMoney");
    if (depositmoney == "") {
        getmsg(divdeposit, 'err_icon.gif', '#FF0000', '请输入一个整数');
        $("#DepositBox").addClass("inputBorder");
        return false;
    }
    else {
        var ddd = /^[0-9]\d{0,4}$/;
        if (!ddd.test(depositmoney)) {
            getmsg(divdeposit, 'err_icon.gif', '#FF0000', '押金为一个整数');
            if (depositmoney.length > 5)
            { getmsg(divdeposit, 'err_icon.gif', '#FF0000', '押金最大为5位整数'); }
            $("#DepositBox").addClass("inputBorder"); return false;
        }
        else {
            getmsg(divdeposit, 'right_icon.gif', '', '');
            $("#DepositBox").removeClass("inputBorder"); return;
        }
    }
}
function checkShortestTime() {
    var shorttime = my("ddlZuQi"); var divshorttime = my("divShortestTime"); my("HiddenField1").value = shorttime.options[shorttime.selectedIndex].value; var val = my("HiddenField1").value; if (val == 0)
    { divshorttime.style.display = "block"; getmsg(divshorttime, 'err_icon.gif', '#FF0000', '请选择最短租期'); $("#lblZuQi").addClass("inputBorder"); return false; }
    else if (val == "其他")
    { divshorttime.style.display = "none"; $("#lblZuQi").removeClass("inputBorder"); my("spanHandShort").style.display = ""; my("txtHandShort").focus(); my("lblZuQi").style.display = "none"; }
    else
    { my("spanHandShort").style.display = "none"; divshorttime.style.display = "none"; $("#lblZuQi").removeClass("inputBorder"); return; }
}
function reelect()
{ my("spanHandShort").style.display = "none"; my("lblZuQi").style.display = ""; my("ddlZuQi").selectedIndex = 0; }
function checkTxtShort() {
    my("HiddenField1").value = my("txtHandShort").value.replace(/(^\s*)|(\s*$)/g, ""); if (my("txtHandShort").value.replace(/(^\s*)|(\s*$)/g, "") == "") {
        if (my("spanHandShort").style.display != "none")
        { my("txtHandShort").focus(); }
    }
}
function checkPaymentNeed() {
    var shorttime = my("ddlPayReq"); var divshorttime = my("divPaymentNeed"); my("HiddenField2").value = shorttime.options[shorttime.selectedIndex].value; var val = my("HiddenField2").value; if (val == 0)
    { divshorttime.style.display = "block"; getmsg(divshorttime, 'err_icon.gif', '#FF0000', '请选择付款要求'); $("#lblPayReq").addClass("inputBorder"); return false; }
    else if (val == "其他")
    { divshorttime.style.display = "none"; $("#lblPayReq").removeClass("inputBorder"); my("spanHandPay").style.display = ""; my("txtHandPay").focus(); my("lblPayReq").style.display = "none"; }
    else
    { my("spanHandPay").style.display = "none"; divshorttime.style.display = "none"; $("#lblPayReq").removeClass("inputBorder"); return; }
}
function checkTxtPay() {
    my("HiddenField2").value = my("txtHandPay").value.replace(/(^\s*)|(\s*$)/g, ""); if (my("txtHandPay").value.replace(/(^\s*)|(\s*$)/g, "") == "") {
        if (my("spanHandPay").style.display != "none")
        { my("txtHandPay").focus(); }
    }
}
function reelect1()
{ my("spanHandPay").style.display = "none"; my("lblPayReq").style.display = ""; my("ddlPayReq").selectedIndex = 0; }

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
window.onload = CheckBrowser;
function checkRelationMan() {
    var relation = my("RelationMan").value.replace(/(^\s*)|(\s*$)/g, ""); var divrelation = my("divRelationMan"); if (relation == "")
    { getmsg(divrelation, 'reg2.gif', '#003cc8', '请输入联系人姓名'); divrelation.style.display = "none"; $("#RelationMan").removeClass("inputBorder"); return false; }
    else
    { divrelation.innerText = ""; divrelation.style.display = "none"; $("#RelationMan").removeClass("inputBorder"); return; }
}
function checkAllTel() {
    var tel = my("PhoneBox").value.replace(/(^\s*)|(\s*$)/g, ""); var phone = my("MobileBox").value.replace(/(^\s*)|(\s*$)/g, ""); var divtp = my("divTelAndPhone"); if (tel == "" && phone == "")
    { getmsg1(divtp, 'err_icon.gif', '#FF0000', '固定电话和手机任填一项均可'); divtp.style.display = "block"; return false; }
    else
    { divtp.innerText = ""; return; }
}
function checkTel() {
    var tn = my("PhoneBox").value.replace(/(^\s*)|(\s*$)/g, ""); var divtn = $("#divTelAndPhone")[0]; if (tn == "")
    { getmsg1(divtn, 'reg2.gif', '#003cc8', '注明区号，格式如：010-12345678-(012)'); divtn.style.display = "none"; $("#spanPhone").removeClass("inputBorder"); return false; }
    else {
        divtn.style.display = "block"; var reg = /^(([0|4]\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/; var tel1 = my("AreaCodeBox").value.replace(/(^\s*)|(\s*$)/g, ""); var tel3 = my("ExtensionBox").value.replace(/(^\s*)|(\s*$)/g, ""); if (tel1 != "")
            tn = tel1 + "-" + tn; if (tel3 != "")
            tn = tn + "-" + tel3; if (!reg.test(tn))
        { getmsg1(divtn, 'err_icon.gif', '#FF0000', '格式如：010-12345678-(012)'); $("#spanPhone").addClass("inputBorder"); return false; }
        else
        { getmsg1(divtn, 'right_icon.gif', '', ''); $("#spanPhone").removeClass("inputBorder"); return; }
    }
}
function checkPhone() {
    var regphn = /^1\d{10}$/; var phone = my("MobileBox").value.replace(/(^\s*)|(\s*$)/g, ""); var divphone = my("divPhone"); if (phone == "")
    { getmsg(divphone, 'reg2.gif', '#003cc8', '请输入手机号码，格式如：13512345678'); divphone.style.display = "none"; $("#MobileBox").removeClass("inputBorder"); return false; }
    else {
        if (!regphn.test(phone))
        { getmsg(divphone, 'err_icon.gif', '#FF0000', '格式如：13512345678'); $("#MobileBox").addClass("inputBorder"); return false; }
        else
        { getmsg(divphone, 'right_icon.gif', '', ''); $("#MobileBox").removeClass("inputBorder"); return; }
    }
}
function checkQQ() {
    var reg = /^\d?\d{5,9}$/;
    var qq = my("QQBox").value.replace(/(^\s*)|(\s*$)/g, "");
    var divqq = my("divQQ"); if (qq == "") {
        getmsg(divqq, 'reg2.gif', '#003cc8', '请输入正确的QQ(可选填)');
        divqq.style.display = "none";
        $("#QQBox").removeClass("inputBorder");
        return false;
    }
    else {
        if (!reg.test(qq))
        { getmsg(divqq, 'err_icon.gif', '#FF0000', '格式如：1234567'); $("#QQBox").addClass("inputBorder"); return false; }
        else
        { getmsg(divqq, 'right_icon.gif', '', ''); $("#QQBox").removeClass("inputBorder"); return; }
    }
}
