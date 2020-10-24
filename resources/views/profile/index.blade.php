 {{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- profile.blade.phpの@yield('title')に'患者一覧'を埋め込む --}}
@section('title', '患者一覧')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
        <div class="row">
            <div class="list-profile col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <td width="10%">患者名</td>
                                <td width="10%">性別</td>
                                <td width="10%">年齢</td>
                                <td width="10%">病棟</td>
                                <td width="10%">基礎疾患</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{ $profile->id }}</th>
                                    <td>{{ $profile->name}}</td>
                                    <td>{{ $profile->gender}}</td>
                                    <td>{{ $profile->age}}</td>
                                    <td>{{ $profile->ward}}</td>
                                    <td>{{ $profile->desease}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button type="button" onclick="location.href='/home'">戻る</button>
@endsection