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
                     <input type="radio" name="smell" value="1">正常
                     <input type="radio" name="smell" value="2">おむつを開けた時点で感じるやや不快な臭い
                     <input type="radio" name="smell" value="3">おむつを開けた時点で感じる不快な臭い
                     <input type="radio" name="smell" value="4">部屋に入ると感じる不快な臭い
                     <input type="radio" name="smell" value="5">廊下にいても感じられる不快な臭い
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
                          <option value="">下剤の選択</option>
                          <option value="gezai">下剤</option>
                          <option value="syoka">消化管運動機能改善剤</option>
                          <option value="kanpo">漢方</option>
                         </select>
                          <select id="gezai" class="subbox">
                           <option value="">下剤を選択</option>
                           <option value="medicine">マグミット錠</option>
                           <option value="medicine">バルコーゼ顆粒</option>
                           <option value="medicine">アローゼン顆粒</option>
                           <option value="medicine">プルゼニド錠</option>
                           <option value="medicine">ラキソベロン内用液</option>
                           <option value="medicine">ピコスルファートナトリウム内用液</option>
                           <option value="medicine">ルビプロストン</option>
                           <option value="medicine">リナクロチド</option>
                           <option value="medicine">新レシカルボン坐剤</option>
                           <option value="medicine">テレミンソフト坐剤</option>
                           <option value="medicine">グリセリン浣腸</option>
                           <option value="medicine">アミティーザカプセル</option>
                          </select>
                          <select id="shoka" class="subbox">
                           <option value="">消化管運動機能改善剤を選択</option>
                           <option value="medicine">ガスモチン錠5mg</option>
                           <option value="medicine">ガスコン錠80mg</option>
                           <option value="medicine">ガナトン錠</option>
                           <option value="medicine">プルゼニド錠</option>
                           <option value="medicine">セレキノン錠100mg</option>
                           <option value="medicine">アコファイド錠</option>
                           <option value="medicine">パントール注射液</option>
                           <option value="medicine">プロスタルモン・F注射液</option>
                          </select>
                          <select id="kanpo" class="subbox">
                           <option value="">漢方を選択</option>
                           <option value="medicine">麻子仁丸</option>
                           <option value="medicine">大黄甘草湯</option>
                           <option value="medicine">大建中湯</option>
                           <option value="medicine">六君子湯</option>
                           <option value="medicine">桂皮加芍薬湯</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">下剤の使用量</label>
                        <select name="amount">
                          @foreach(range(1,30) as $cnt)
                           <option value="{{$cnt}}"> {{$cnt . "(個/滴/錠/管/グラム"}}</option>
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
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
               <button type="button" onclick="location.href='/home'">ホーム</button>
            </div>
        </div>
    </div>
@endsection