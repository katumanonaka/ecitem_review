//マウスオーバーした画像に枠線をつける

$(function(){

    //画像の上にマウスオーバーしたらグレーの枠線をつける
    // $("td#item_img").mouseover(function(){
    //     $(this).css("outline","5px solid #e6e6e6");
    // }).mouseout(function(){
    //     $(this).css("outline","");
    // });
    $(".col-md-6").mouseover(function(){
        $(this).css("outline","5px solid #e6e6e6");
    }).mouseout(function(){
        $(this).css("outline","");
    });

});
