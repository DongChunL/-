// JScript 文件
function change()
{
    var obj;
    if(document.getElementById("leaveWord_txtContent")!=null)
    {
        obj=document.getElementById("leaveWord_txtContent");
    }
    else
    {
        obj=document.getElementById("ctl00_ContentPlaceHolder1_leaveWord_txtContent");
    }
    var content = obj.value.replace(/^\s|\s*$/g,"");
    var word=document.getElementById("spanWord");
    if(content.length>200)
    {
        obj.value=content.substring(0,200);
        return false;
    }
    else
        word.innerHTML=200-content.length;
}

function CheckBrowser()
{
    var app=navigator.appName;
    var verStr=navigator.appVersion;
    if (app.indexOf('Netscape') != -1) {
        var obj;
        if(document.getElementById("leaveWord_txtContent")!=null)
        {
            obj=document.getElementById("leaveWord_txtContent");
        }
        else
        {
            obj=document.getElementById("ctl00_ContentPlaceHolder1_leaveWord_txtContent");
        }
        obj.addEventListener("input",change,false);
    }
    else if (app.indexOf('Microsoft') != -1) {
        var obj;
        if(document.getElementById("leaveWord_txtContent")!=null)
        {
            obj=document.getElementById("leaveWord_txtContent");
        }
        else
        {
            obj=document.getElementById("ctl00_ContentPlaceHolder1_leaveWord_txtContent");
        }
        obj.onpropertychange=change;
    }
}
/*
CheckBrowser();*/
