var $subbox = $('.subbox'); //都道府県の要素を変数に入れます。
var original = $subbox.html(); //後のイベントで、不要なoption要素を削除するため、オリジナルをとっておく
 
//地方側のselect要素が変更になるとイベントが発生
$('.mainselect').change(function() {
 
  //選択された地方のvalueを取得し変数に入れる
  var val1 = $(this).val();
 
  //削除された要素をもとに戻すため.html(original)を入れておく
  $subbox.html(original).find('option').each(function() {
    var val2 = $(this).data('val'); //data-valの値を取得
 
    //valueと異なるdata-valを持つ要素を削除
    if (val1 != val2) {
      $(this).not(':first-child').remove();
    }
 
  });
 
  //地方側のselect要素が未選択の場合、都道府県をdisabledにする
  if ($(this).val() == "") {
    $subbox.attr('disabled', 'disabled');
  } else {
    $subbox.removeAttr('disabled');
  }
 
});