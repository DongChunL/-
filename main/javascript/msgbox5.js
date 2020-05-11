function showmsg() {
    if (checkData() != false) {
        $("#mask").show(); window.location.href = "#form1"; $("#ltlTitle").text("信息标题：" + getval("TitleBox")); setmsg(); setimg(); setcon(); if (getval("txtContent").length >= 800)
        { $("#msgContent").html(getval("txtContent").replace(/([\r\n])+/g, "<br />").substring(0, 800) + "......"); }
        else
        { $("#msgContent").html(getval("txtContent").replace(/([\r\n])+/g, "<br />")); }
        $("#msgbox5").show();
    }
}
function closemsg()
{ $("#mask").hide(); $("#msgbox5").hide(); }
function getval(target)
{ return $.trim($("#" + target).val()); }
function gettxt(target)
{ return $.trim($("#" + target).text()); }
function getdrop(target)
{ return $("#" + target).find("option[selected]").text(); }
function getradio() {
    var rado1 = document.getElementById("rostate");
    if (rado1.checked) {
        return "立即上架";
    }
    else {
        return "暂不上架";
    }
}
function setmsg() {
    var str = ""; if ($("#checkAllCity").attr("checked") == true)
    { str = "<tr><td height=\"25\" align=\"right\" width=\"24%\">面向城市：</td><td colspan=\"3\" style=\"color: #333;\">全国</td></tr>"; }
    else if ($("#checkMoreCity").attr("checked") == true) {
        var cities = ""; $("#ListBox3 option").each(function() { cities += $(this).text() + ","; }); if (cities.indexOf(',') != "-1")
        { cities = cities.substring(0, cities.length - 1); }
        str = "<tr><td height=\"25\" align=\"right\" width=\"24%\">面向城市：</td><td style=\"color: #333;\">" + cities + "</td></tr>";
    }
    else
    { str = "<tr><td height=\"25\" align=\"right\" width=\"24%\">面向城市：</td><td style=\"color: #333;\">" + getdrop("ddlCity") + "</td></tr>"; }
//    if ($("#FreeRent").attr("checked") == true)
//    { str += common("租　　金", "面议"); }
//    else {
    str += common("租　　金", getval("RentMoneyBox") + " " + getdrop("RentMoneyStyle"));
//     }
//    if ($("#FreeDeposit").attr("checked") == true) {
//    str += common("押　　金", "面议"); }
//    else {
    str += common("押　　金", getval("DepositBox") + " 元");
//     }
    str += common("数　　量", getval("txtAmount"));
    if ($("#spanHandShort").attr("style") != "")
    { str += common("最短租期", getdrop("ddlZuQi")); }
    else
    { str += common("最短租期", getval("txtHandShort")); }
    if ($("#spanHandPay").attr("style") != "")
    { str += common("付款要求", getdrop("ddlPayReq")); }
    else
    { str += common("付款要求", getval("txtHandPay")); }
    if ($("#showState").val() != undefined) {
        str += common("出租状态", getradio());
    }
    $("#msgDetails").html(str);
}
function common(name, value)
{ return "<tr><td align=\"right\" height=\"25\">" + name + "：</td><td style=\"color: #333;\">" + value + "</td></tr>"; }
function setimg() {
    if ($("#ShowImage").find("img").length == 0)
    { $("#headimg").hide(); $("#msgimg").hide(); }
    else {
        $("#headimg").show(); $("#msgimg").show(); var img = "<tr><td bgcolor=\"#FFFFFF\" class=\"infoCon\">"; var end = ""; $("#ShowImage").find("img").each(function(i) {
            if (i <= 6) {
                if ($(this).attr("src") != "http://www.zulinbao.com/javascript/jquery.uploadify-v2.1.4/cancel.png") {
                    img += "<img border=\"0\" style=\"max-width:100px;max-height:100px;\" src=\"" + $(this).attr("src") + "\"/>";
                }
            }
            else
            { img += "</td></tr>"; end = $(this).attr("src") }
        }); if (end != "" && end != "undefined" && end != "http://www.zulinbao.com/javascript/jquery.uploadify-v2.1.4/cancel.png")
        { img += "<tr><td bgcolor=\"#FFFFFF\" class=\"infoCon\"><img border=\"0\"  style=\"max-width:100px;max-height:100px;\" src=\"" + end + "\"/></td></tr>"; }
        $("#msgimg").html(img);
    }
}
function setcon() {
    var con = ""; con = "<li class=\"browseTxt\">联 系 人：</li><li class=\"browseCon\">" + getval("RelationMan") + "</li>"; if (getval("PhoneBox") != "") {
        con += "<li class=\"browseTxt\">固定电话：</li><li class=\"browseCon\">" + getval("AreaCodeBox") + "-" + getval("PhoneBox")
        if (getval("ExtensionBox") != "")
        { con += "-" + getval("ExtensionBox"); }
        con += "</li>";
    }
    if (getval("MobileBox") != "")
    { con += "<li class=\"browseTxt\">手　　机：</li><li class=\"browseCon\">" + getval("MobileBox") + "</li>"; }
    if (getval("QQBox") != "")
    { con += "<li class=\"browseTxt\">Q　Q：</li><li class=\"browseCon\">" + getval("QQBox") + "</li>"; }
    $("#ulContact").html(con);
}