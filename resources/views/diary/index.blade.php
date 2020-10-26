 {{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- profile.blade.phpの@yield('title')に'患者一覧'を埋め込む --}}
@section('title', '日誌確認')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>日誌確認</h1>
            </div>
            <div class="col-md-8 mx-auto">
            <table border="1">
             <tr>
              <th>日付</th>
              <th>時刻</th>
              <th>BS</th>
              <th>便の量</th>
              <th>便臭</th>
              <th>便の色</th>
              <th>下剤の種類</th>
              <th>下剤の量</th>
              <th>水分量</th>
              <th>備考</th>
             </tr>
             </div>
        </div>
</div>

@endsection