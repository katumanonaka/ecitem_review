
//スクロールするトップへ戻るボタン
$(function(){
//#back-to-topを消す
$('back-to-top').hide();

//スクロールが十分された#back-to-topを表示、スクロールが戻ったら非表示
$(window).scroll(function(){
$('#pos').text($(this).scrollTop());
if ($(this).scrollTop() > 60) {
	$('#back-to-top').fadeIn();
	} else {
		$('#back-to-top').fadeOut();
		}
	});
	//#back-to-topがクリックされたら上に戻る
	$('#back-to-top a').click(function(){
		$('body').animate({
			scrollTop:0
		},500);
	});
});
