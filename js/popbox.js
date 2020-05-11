// 图片浏览
window.onerror = function() { return true; };
$(function() {
    $('#gallery a').lightBox();
});
function lightstart() {
    var oTargets = document.getElementsByName("lightimg");
    if (oTargets.length > 0) {
        oTargets[0].click();
    }
}
var chars = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
function generateMixed(n) {
    var res = "";
    for (var i = 0; i < n; i++) {
        var id = Math.ceil(Math.random() * 35);
        res += chars[id];
    }
    return res;
}
function SendMsg(id) {
    $("#popBox").hide();
    $("#mask").hide();
    window.open("http://www.zulinbao.com/weibo/myspeak" + id + ".html");
}
//弹出框
function ShowWindow(type, id) {
    $("#popBox").height("230px");
    var oFrame = document.getElementById("popIframe");
    switch (type) {
        case "1":
            $("#popTitle").text("收藏租品");
            oFrame.src = "../model/SendMessage.html?type=1&p=" + id + "&rand=" + generateMixed(6);
            oFrame.style.height = "230px"; break;
        case "2":
            $("#popTitle").text("发站内信");
            oFrame.src = "../model/SendMessage.html?id=" + id + "&rand=" + generateMixed(6);
            oFrame.style.height = "230px"; break;
        case "3":
            $("#popTitle").text("加为好友");
            oFrame.src = "../model/SendMessage.html?friend=" + id + "&rand=" + generateMixed(6);
            oFrame.style.height = "230px"; break;
        case "4":
            $("#popTitle").text("举报");
            oFrame.src = "../model/SendMessage.html?id=" + id + "&rand=" + generateMixed(6);
            document.getElementById("popBox").style.height = "257px";
            oFrame.style.height = "300px"; break;
            break;
        case "5":
            $("#popTitle").text("收藏租铺");
            oFrame.src = "../model/SendMessage.html?type=2&p=" + id + "&rand=" + generateMixed(6);
            oFrame.style.height = "230px"; break;
        case "6":
            $("#popTitle").text("申请友情链接");
            oFrame.src = "../model/SendMessage.html?received=" + $("#storereceiveid").text() + "&rand=" + generateMixed(6);
            oFrame.style.height = "230px"; break;
    }
    $("#popBox")[0].style.left = (screen.width - 430) / 2 + "px";
    var height = $("#popBox").height();
    var clientheight = (document.documentElement.clientHeight - height) / 2;
    //    if(window.ActiveXObject)
    //    {
    //        $("#popBox")[0].style.top=(Number(clientheight)+Number(document.documentElement.scrollTop))+"px";
    //    }
    //    else
    //    {
    $("#popBox")[0].style.top = (Number(clientheight)) + "px";
    //    }
    $("#popBox").show();
    $("#mask").show();
}
var flag = 3;
function CloseWindow() {
    $("#popBox").width("430px");
    $("#popIframe").width("430px");
    $("#popIframe").attr("src", "");
    $("#popBox").hide();
    if (document.getElementById("mask") != null) {
        $("#mask").hide();
    }
    if (flag == 2) {
        var url = window.location.href;
        if (url.indexOf('#') != -1) {
            url = url.substring(0, url.indexOf('#'));
        }
        window.location.href = url;
        flag = 3;
    }
}
//推荐
function DoCommend() {
    var txt = window.location.href;
    if (window.clipboardData) {
        window.clipboardData.clearData();
        window.clipboardData.setData("Text", txt);
    } else if (navigator.userAgent.indexOf("Opera") != -1) {
        window.location = txt;
    } else if (window.netscape) {
        try {
            netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
        } catch (e) {
            alert("被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将'signed.applets.codebase_principal_support'设置为'true'");
        }
        var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
        if (!clip)
            return;
        var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
        if (!trans)
            return;
        trans.addDataFlavor('text/unicode');
        var str = new Object();
        var len = new Object();
        var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
        var copytext = txt;
        str.data = copytext;
        trans.setTransferData("text/unicode", str, copytext.length * 2);
        var clipid = Components.interfaces.nsIClipboard;
        if (!clip)
            return false;
        clip.setData(trans, null, clipid.kGlobalClipboard);
    }
    alert("复制成功，您可以通过QQ、MSN，或者发送邮件，把下面的链接告诉你的好友：\r" + txt);
}
//租用
function DoRent(state, id) {
    if (state == "0") {
        if (document.getElementById("mask") != null) {
            $("#mask").show();
        }
        LoginAndRedirect(id);
    }
    else if (state == "1") {
        alert("您已经对此物品下过订单了！"); return;
    }
    else if (state == "2") {
        alert("自己不能租用自己的物品！"); return;
    }
    location.href = "order" + id + ".html";
}
//登陆成功后直接跳转
function LoginAndRedirect(id) {
    $("#popBox")[0].style.left = (screen.width - 430) / 2 + "px";
    var height = $("#popBox").height();
    var clientheight = (document.documentElement.clientHeight - height) / 2;
    //    if(window.ActiveXObject)
    //    {
    //        $("#popBox")[0].style.top=(Number(clientheight)+Number(document.documentElement.scrollTop))+"px";
    //    }
    //    else
    //    {
    $("#popBox")[0].style.top = (Number(clientheight)) + "px";
    //    }
    $("#popBox").show();
    $("#popTitle").text("登录");
    $("#popIframe").attr("src", "../model/SendMessage.html?type2=2&productid=" + id);
    $("#popBox").height("230px");
    $("#popIframe").height("230px");
}
function CloseWindow11(state, id) {
    $("#popBox").width("430px");
    $("#popIframe").width("430px");
    $("#popBox").hide();
    $("#popIframe").attr("src", "");
    if (document.getElementById("mask") != null) {
        $("#mask").hide();
    }
    DoRent1(state, id);
}
function DoRent1(state, id) {
    if (state == "1") {
        alert("您已经对此物品下过订单了！");
        refreshWindow();
    }
    else if (state == "2") {
        alert("自己不能租用自己的物品！");
        refreshWindow();
    }
    else if (state == "57") {
        location.href = "house_order.aspx?id=" + id;
    }
    else if (state == "60") {
        location.href = "car_order.aspx?id=" + id;
    }
    else {
        location.href = "else_order.aspx?id=" + id;
    }
}
function MyImage(Img, w, h) {
    var image = new Image();
    image.src = Img.src;
    width = w; //预先设置的所期望的宽的值
    height = h; //预先设置的所期望的高的值
    if (image.width > width || image.height > height) {
        //现有图片只有宽或高超了预设值就进行js控制
        w = image.width / width;
        h = image.height / height;
        if (w > h) {
            //比值比较大==>宽比高大 定下宽度为width的宽度
            Img.width = width;
            //以下为计算高度
            Img.height = image.height / w;
        }
        else {
            //高比宽大 定下宽度为height高度
            Img.height = height;
            //以下为计算高度
            Img.width = image.width / h;
        }
    }
}