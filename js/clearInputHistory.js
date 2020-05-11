(function(){
    var userAgent = navigator.userAgent;
    var isChrome = userAgent.indexOf('Chrome')>-1 && userAgent.indexOf('Safari')>-1;
    var arr = document.getElementsByTagName('input');  //添加autocomplete属性清除input历史记录
    for(var i=0;i<arr.length;i++){
        if(isChrome){
            document.getElementsByTagName('input')[i].setAttribute('autocomplete','off');
        }else{
            document.getElementsByTagName('input')[i].setAttribute('autocomplete','off');
        }

    }
})();