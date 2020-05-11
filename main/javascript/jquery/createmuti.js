//修改照片标题
function ajaxTitle(title, id){$.get("upLoadAjax.aspx?r="+Math.random(),{title : title, picID : id},function(data){if(data == "0"){alert("对不起，修改标题失败，请您重新修改！");}});}
//封面照片
function coverAjax(id){$.get("upLoadAjax.aspx?r="+Math.random(),{coverID : id});}
var count=$("#myupload_spancount").text();
$(document).ready(function() {
    $("#uploadify").uploadify({
        'uploader': '../javascript/jquery.uploadify-v2.1.4/uploadify.swf',
        'cancelImg': '../javascript/jquery.uploadify-v2.1.4/cancel.png',
        'folder': '../AllImg',
        'sizeLimit': 1024 * 1024 * 2,
        'queueSizeLimit': 16 - count,
        'fileDesc': '只允许上传bmp，gif，jpg，jpeg图片',
        'fileExt': '*.bmp;*.gif;*.jpg;*.jpeg',
        'method': 'Post',
        'queueID': 'ShowImage',
        'buttonImg': '../javascript/jquery.uploadify-v2.1.4/btn.png',
        'width': 100,
        'height': 30,
        'wmode': 'transparent',
        'auto': false,
        'multi': true,
        'onComplete': function(e, q, f, data, d) {
            //                alert("e=" + e);
            //alert("q=" + q);
            //                 alert("f=" + f);
            //alert("data=" + data);
            //              alert("d=" + );
            //                     alert(data);
            if (data.toString().indexOf(",") > -1) {
                var datas = data.toString().split(',');
                count++;
                $("#myupload_spancount").text(count);
                var Image = "<img width='120px' height='70px' src='../" + datas[0] + "'/>";
                var Delete = "<a href=\"javascript:void(null);\" onclick=\"javascript:DeleteImage('" + q + "','" + datas[0] + "','" + datas[1] + "','1'); return false;\">删除</a>";
                var lab = "<br /><input id=\"" + datas[1] + "\" type=\"text\" style=\"border='1px solid #ccc'\" value=\"填写图片标题\" size=\"14\" maxlength=\"20\" onfocus=\"if(this.value=='填写图片标题') this.value='';\" onblur=\"if(this.value!=''){ajaxTitle(this.value,this.id);}else{this.value='填写图片标题'};\"/>";
                var cover = "<input type=\"radio\" onclick=coverAjax(\"" + datas[1] + "\") name=\"piccover\" />封面";
                var Div = "<div style='text-align:center;'>" + cover + "&nbsp;&nbsp;&nbsp;" + Delete + "&nbsp;" + lab + "</div>";
                $("#uploadify" + q).html(Image + Div);

                $('#uploadify').uploadifySettings('queueSizeLimit', 16 - count);
            }
            else {
                //                 var datas = data.toString().split(',');
                //                 count++;
                //                 $("#myupload_spancount").text(count);
                //                 var Image = "<img width='120px' height='70px' src='../" + datas[0] + "'/>";
                //                 var Delete = "<a href=\"javascript:void(null);\" onclick=\"javascript:DeleteImage('" + q + "','" + datas[0] + "','" + datas[1] + "','1'); return false;\">删除</a>";
                //                 var lab = "<br /><input id=\"" + datas[1] + "\" type=\"text\" style=\"border='1px solid #ccc'\" value=\"填写图片标题\" size=\"14\" maxlength=\"20\" onfocus=\"if(this.value=='填写图片标题') this.value='';\" onblur=\"if(this.value!=''){ajaxTitle(this.value,this.id);}else{this.value='填写图片标题'};\"/>";
                //                 var cover = "<input type=\"radio\" onclick=coverAjax(\"" + datas[1] + "\") name=\"piccover\" />封面";
                //                 var Div = "<div style='text-align:center;'>" + cover + "&nbsp;&nbsp;&nbsp;" + Delete + "&nbsp;" + lab + "</div>";
                //                 $("#uploadify" + q).html(Image + Div);
                //                 $('#uploadify').uploadifySettings('queueSizeLimit', 8 - count);

                $("#uploadify" + q).html("<div class=\"cancel\">\<a href=\"javascript:void(null);\" onclick=\"javascript:jQuery('#uploadify').uploadifyCancel('" + q + "');return false;\"><img src=\"../javascript/jquery.uploadify-v2.1.4/cancel.png\" border=\"0\" /></a></div><span style=\"color:red\">" + data + "</span>");
            }
        }
    });
    $("#btnBegin").click(function() {
        $('#uploadify').uploadifySettings('script', "../Ashx/UploadHander.ashx?r=" + Math.random() + "&proId=" + $("#myupload_hfProId").val() + "&type=" + $("#myupload_hfType").val());

        $("#uploadify").uploadifyUpload(); return false;
    });
});
function DeleteImage(q,n,pid,t){
    $.ajax({type:"POST",url:"../Ashx/deletehander.ashx?r="+Math.random()+"&q="+q+"&n="+n+"&pid="+pid+"&t="+t,
        success:function(msg){
            if(msg!="0"){count--;$("#myupload_spancount").text(count);$('#uploadify').uploadifySettings('queueSizeLimit',16-count);
                jQuery("#uploadify").uploadifyCancel(msg);
            }
        }
    });
}
