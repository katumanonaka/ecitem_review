$(function() {

    $("body").append("<div id='glayLayer'></div> <div id='overLayer'></div>");

    $("#glayLayer").click(function(){
        $(this).hide(500);
        $("#overLayer").hide(500);
    });

    $("a.icon").click(function(){
        $("#glayLayer").show(500);
        $("#overLayer").show(500).html("<img src='"+$(this).attr("href")+"' />");
        return false;
    });
});
