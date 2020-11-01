 {{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- profile.blade.phpの@yield('title')に'患者一覧'を埋め込む --}}
@section('title', '日誌確認')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<div class="row">
            <div class="list-profiles col-md-10 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <thead> 
                            <tr>
                                <th width="5%">日付</th>
                                <td width="5%">時刻</td>
                                <td width="5%">BS</td>
                                <td width="5%">便の量</td>
                                <td width="5%">便臭</td>
                                <td width="5%">便の色</td>
                                <td width="5%">使用下剤</td>
                                <td width="5%">下剤使用量</td>
                                <td width="5%">水分量</td>
                                <td width="15%">備考</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($diaries as $diary)
                                <tr>
                                    <th>{{ $diary->date }}</th>
                                    <td>{{ $diary->time}}</td>
                                    <td>{{ $diary->bs}}</td>
                                    <td>{{ $diary->amount}}</td>
                                    <td>{{ $diary->smell}}</td>
                                    <td>{{ $diary->color}}</td>
                                    <td>{{ $diary->medicine}}</td>
                                    <td>{{ $diary->amount}}</td>
                                    <td>{{ $diary->water}}</td>
                                    <td>{{ $diary->note}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button type="button" onclick="location.href='/profile/index'">戻る</button>
@endsection