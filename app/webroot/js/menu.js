//メニューのアコーディオン
$(function() {

    //変数dis
    var dis =230;

    $("#slide_btn").click(function() {
        //アイコンをクリック
         //nav要素のmargin-leftを-250pxへ
         $("nav").animate({"margin-left": "+=" + dis + "px"}, 200);
         //header要素のmargin-leftを0pxから250pxへ
         $(".articles_index").animate({"margin-left": "+=" + dis + "px"}, 200);
         $(".container").animate({"margin-left": "+=" + dis + "px"}, 200);
         $(".footer").animate({"margin-left": "+=" + dis + "px"}, 200);
         $("#slide_btn").animate({"margin-left": "+=" + dis + "px"}, 200);
         $(".users_index").animate({"margin-left": "+=" + dis + "px"}, 200);
         $(".products_index").animate({"margin-left": "+=" + dis + "px"}, 200);
         $(".categories_index").animate({"margin-left": "+=" + dis + "px"}, 200);
         $(".companies_index").animate({"margin-left": "+=" + dis + "px"}, 200);
         //disに-1をかける
         dis *= -1;
    });

/*-------------------------------------------------------
メニューのアコーディオン
-------------------------------------------------------*/
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
