//メニューのアコーディオン
$(function() {

    // $("dd:not(:first)").css("display","none");
    // $("dt:first").addClass("selected");
    // $("dl dt").click(function() {
    //     if($("+dd",this).css("display") == "none") {
    //         $("+dd",this).slideDown("slow");
    //         $("dd").slideUp("slow");
    //         $("dt").removeClass("selected");
    //         $("this").addClass("selected");
    //     }
    // }).mouseover(function() {
    //     $(this).addClass("over");
    // }).mounseout(function(){
    //     $(this).removeClass("over");
    // });
console.log("aaaaa");
    //最初は全てのパネルを非表示に
    $('#panel > dd').hide();
    $("dt:first").addClass("selected");
    $('#panel > dt').click(function(e){
        //選択したパネルを開く
        $('+dd', this).slideToggle(200);
        $("dt").removeClass("selected");
        $("this").addClass("selected");
    }).mouseover(function() {
        $(this).addClass("over");
    }).mounseout(function(){
        $(this).removeClass("over");
    });
    $('dt').mouseout(function() {
        $(this).removeClass("over");
    });

});
