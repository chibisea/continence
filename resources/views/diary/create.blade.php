{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- profile.blade.phpの@yield('title')に'新規患者登録'を埋め込む --}}
@section('title', '排便日誌入力')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>排便日誌入力</h1>
                <form action="{{ action('DiaryController@create') }}" method="post" enctype="multipart/form-data">
                     @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                     @endif
                    <div class="form-group row">
                     <label class="col-md-2">日付</label>
                     <input type="date" name="date">
                    </div>
                    <div class="form-group row">
                     <label class="col-md-2">時刻</label>
                     <input type="time" name="time">
                    </div>
                    <div class="form-group row">
                     <label class="col-md-2">ブリストルスケール</label>
                     <input type="radio" name="bs" value="1">1
                     <input type="radio" name="bs" value="2">2
                     <input type="radio" name="bs" value="3">3
                     <input type="radio" name="bs" value="4">4
                     <input type="radio" name="bs" value="5">5
                     <input type="radio" name="bs" value="6">6
                     <input type="radio" name="bs" value="7">7
                    </div>
                    <div class="form-group row">
                     <label class="col-md-2">便の量</label>
                     <input type="radio" name="size" value="1">うずらの卵
                     <input type="radio" name="size" value="2">ゴルフボール
                     <input type="radio" name="size" value="3">鶏卵
                     <input type="radio" name="size" value="4">こぶし
                     <input type="radio" name="size" value="5">バナナ
                    </div>
                    <div class="form-group row">
                     <label class="col-md-2">便臭</label>
                     <input type="radio" name="smell" value="1">(1)正常
                     <input type="radio" name="smell" value="2">(2)おむつを開けた時点で感じるやや不快な臭い
                     <input type="radio" name="smell" value="3">(3)おむつを開けた時点で感じる不快な臭い
                     <input type="radio" name="smell" value="4">(4)部屋に入ると感じる不快な臭い
                     <input type="radio" name="smell" value="5">(5)廊下にいても感じられる不快な臭い
                    </div>
                    <div class="form-group row">
                     <label class="col-md-2">便の色</label>
                     <input type="radio" name="color" value="1">薄茶
                     <input type="radio" name="color" value="2">茶
                     <input type="radio" name="color" value="3">黒
                     <input type="radio" name="color" value="4">白色・灰色
                     <input type="radio" name="color" value="5">赤
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">下剤の種類</label>
                        <div class="pulldownset">
                         <select class="mainselect">
                          <option value="">下剤の種類を選択</option>
                          <option value="gezai">一般的な下剤</option>
                          <option value="syoka">消化管運動機能改善剤</option>
                          <option value="kanpo">漢方</option>
                         </select>
                          <select name="medicine" class="subbox" disabled>
                           <option value=""selected="selected">下剤名を選択</option>
                           <option value="マグミット" data-val="gezai">マグミット錠</option>
                           <option value="バルコーゼ" data-val="gezai">バルコーゼ顆粒</option>
                           <option value="アローゼン" data-val="gezai">アローゼン顆粒</option>
                           <option value="プルゼニド" data-val="gezai">プルゼニド錠</option>
                           <option value="ラキソベロン" data-val="gezai">ラキソベロン内用液</option>
                           <option value="ピコ" data-val="gezai">ピコスルファートナトリウム内用液</option>
                           <option value="ルビプロストン" data-val="gezai">ルビプロストン</option>
                           <option value="リクロチド" data-val="gezai">リナクロチド</option>
                           <option value="新レシカ" data-val="gezai">新レシカルボン坐剤</option>
                           <option value="テレミンソフト" data-val="gezai">テレミンソフト坐剤</option>
                           <option value="グリセリン" data-val="gezai">グリセリン浣腸</option>
                           <option value="アミティーザ" data-val="gezai">アミティーザカプセル</option>
                           <option value="ガスモチン" data-val="syoka">ガスモチン錠5mg</option>
                           <option value="ガスコン" data-val="syoka">ガスコン錠80mg</option>
                           <option value="ガナトン" data-val="syoka">ガナトン錠</option>
                           <option value="プルゼニド" data-val="syoka">プルゼニド錠</option>
                           <option value="セレキノン" data-val="syoka">セレキノン錠100mg</option>
                           <option value="アコファイド" data-val="syoka">アコファイド錠</option>
                           <option value="パントール" data-val="syoka">パントール注射液</option>
                           <option value="プロスタルモン" data-val="syoka">プロスタルモン・F注射液</option>
                           <option value="麻子仁丸" data-val="kanpo">麻子仁丸</option>
                           <option value="大黄甘草湯" data-val="kanpo">大黄甘草湯</option>
                           <option value="大建中湯" data-val="kanpo">大建中湯</option>
                           <option value="六君子湯" data-val="kanpo">六君子湯</option>
                           <option value="桂皮" data-val="kanpo">桂皮加芍薬湯</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">下剤の使用量(個/滴/錠/管/グラム)</label>
                        <select name="amount">
                          @foreach(range(1,30) as $cnt)
                           <option value="{{$cnt}}"> {{$cnt}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">水分量</label>
                        <select name="water">
                          @foreach(range(1000,2000,50) as $cnt)
                           <option value="{{$cnt}}"> {{$cnt . "ml"}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">備考</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="note" value="{{ old('note') }}">
                        </div>
                    </div>
                    <input type="hidden" name="profile_id" value="{{$profile_id}}"/>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
               <div>
               <button type="button" onclick="location.href='/profile/index'">戻る</button>
               </div>
               <button type="button" onclick="location.href='/home'">ホーム</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    window.onload = function(){
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
}
</script>
@endsection