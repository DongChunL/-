<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>发布租赁资讯</title>
    <style type="text/css">
        span{display:inline-block; vertical-align: top}
        input[type="submit"]{margin-left: 10%;}
    </style>
</head>
<body>
<fieldset id="manageUser" style="height:680px;width: 900px;">
    <legend style="font-size: 24px;color: #666;">发布租赁资讯</legend>
<form name="article" method="post" action="publish.php" style="">
    标 题：<input type="text" id="title" name="title" style="width: 300px;height: 20px;border-radius: 4px;border: 2px solid darkgrey;"/>
    <br/><br/>
    作 者/来源: <input type="text" id="author"  name="author" style="width: 80px;height: 20px;;border-radius: 4px;border: 2px solid darkgrey;"/>
    <br/><br/>

    <span>内 容:</span>
    <!--      <div class="iframecontent">

              <div class="pos">
                  <span>公司介绍</span><i> | </i><span>公司介绍</span><i> > </i>
              </div>-->

    <div class="list">
        <form action="/" method="get" accept-charset="utf-8" class="gsjs-form">
            <!--                  <dl class="clearfix">
                                  <dt class="left gsjs_title">摘要：</dt>
                                  <dd class="left">
                                      <textarea name="gsjs_content" class="textarea-default">网络科技有限公司成立于2007年。是一家集科研、生产、开发、销售为一体的互联网产业高新技术企业。 我公司在全国与多个大型门户网站保持密切技术合作与往来；并且与全国多所高校合作，开发与研究互联网深度产品，取得了不错的研究成果，获得良好的好评</textarea>
                                  </dd>
                              </dl>-->
            <dl class="clearfix">
<!--                <dt class="left gsjs_title">内容：</dt>-->
                <dd class="left">
                    <script id="editor" type="text/plain" style="width:600px;height:220px;"></script>
                </dd>
            </dl>
            <!--                    <dl class="clearfix">
                                    <dt class="left gsjs_title gsjs_btntit">提交按钮</dt>
                                    <dd class="left">
                                        <input type="button" name="gsjs_btn" value="提交" class="btn btn-blue">
                                    </dd>
                                </dl>-->
        </form>
    </div>
<!--    <input type="button" onclick="editorContent()" value="测试">-->
    <!--     </div>-->

    <!--JavaScript-->
    <script type="text/javascript" charset="utf-8" src="lib/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="lib/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="lib/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script>
        $(function(){
            //实例化编辑器
            //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
            var ue = UE.getEditor('editor');
        });
        //获取编辑器内容

        function editorContent() {
            var ue = UE.getEditor('editor');
            /*          alert(ue.getContent());//获取编辑器html内容
          alert(ue.getPlainTxt());//获取保留换行/空格等格式的纯文本
          alert(ue.getContentTxt());//获取纯文本内容*/
            document.getElementById('newsContent').innerHTML = ue.getPlainTxt();
            var newsContent = document.getElementById('newsContent').innerHTML;

            var title = document.getElementById('title').value;
            var author =  document.getElementById('author').value;
            window.location.href='publish.php?title='+title+'&author'+author+'&newsContent='+newsContent;
        }
    </script>

    <textarea id="newsContent" cols=35 rows=8 name="content" style="margin: 0; width: 708px; height: 435px;" hidden="hidden"></textarea><br/><br/>
    <input type="submit"  id="submit" onclick="editorContent()" value="发布新闻"/>

</form>
</fieldset>
</body>
</html>