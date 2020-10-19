 {{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- profile.blade.phpの@yield('title')に'新規患者登録'を埋め込む --}}
@section('title', 'ホーム')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>コンチネンスケア</h1>
                
               <button type=“button” onclick="location.href='/profile/create'">＋新規作成</button><br>
               <button type=“button” onclick="location.href='/patient'">患者一覧</button>
            </div>
        </div>
    </div>
@endsection