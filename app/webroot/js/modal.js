$(function() {

    $("body").append("<div id='glayLayer'></div> <div id='overLayer'></div>");

    $(#glayLayer).click(function(){
        $(this).hide();
        $("#overLayer").hide();
    });

    $("a.icon").click(function(){
        $("#glayLayer").show();
        $("#overLayer").show().html("<img src='"+$(this).attr("href")+"' />");
        return false;
    });
});
