function fillList(data) {
    if (data.unfilled == "") {
        $("#unfilled").append("<h3>问卷都填过啦</h3>");
    } else {
        $("#unfilled").append("<h3>你有没填的问卷哦</h3>");
        $.each(data.unfilled, function(i, item){
            var quesHref = $("<a></a>");
            quesHref.attr("href","Qanswer.php?id="+item.ID);
            quesHref.append("<a>"+ item.Title +"</a>");
            $("#unfilled").append(quesHref);
            $("#unfilled").append("<br />");
        });
    }
    if (data.filled == "") {
        $("#unfilled").append("<h3>你还没有填写过任何问卷哦</h3>");
    } else {
        $("#unfilled").append("<h3>这是你填写过的问卷</h3>");
        $.each(data.filled, function(i, item){
            var quesHref = $("<a></a>");
            quesHref.attr("href","Qanswer.php?id="+item.ID);
            quesHref.append("<a>"+ item.Title +"</a>");
            $("#unfilled").append(quesHref);
            $("#unfilled").append("<br />");
        });
    }
}

$(document).ready(function(){
    $.ajax({
        type:'post',
        url:'GetQuestionnaireInfo.php',
        data:{},
        dataType:'json',
        async:false,
        success:fillList,
        error:function(XMLHttpRequest, status, errorThrown){
            alert('失败，请重试\n'+'状态：'+status);
        },
    })
});