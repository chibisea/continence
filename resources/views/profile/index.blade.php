 {{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- profile.blade.phpの@yield('title')に'患者一覧'を埋め込む --}}
@section('title', '患者一覧')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
        <div class="row">
            <div class="list-profiles col-md-10 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <thead> 
                            <tr>
                                <th width="5%">ID</th>
                                <td width="10%">患者名</td>
                                <td width="5%">性別</td>
                                <td width="5%">年齢</td>
                                <td width="5%">病棟</td>
                                <td width="10%">基礎疾患</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($profiles as $profile)
                                <tr>
                                    <th>{{ $profile->id }}</th>
                                    <td>{{ $profile->name}}</td>
                                    <td>{{ $profile->gender}}</td>
                                    <td>{{ $profile->age}}</td>
                                    <td>{{ $profile->ward}}</td>
                                    <td>{{ $profile->desease}}</td>
                                    <td>
                                     <div>
                                      <a href="{{ action('ProfileController@edit', ['id' => $profiles->id]) }}">編集</a>
                                     </div>
                                     <div>
                                      <a href="{{ action('ProfileController@delete', ['id' => $profiles->id]) }}">削除</a>
                                     </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button type="button" onclick="location.href='/home'">戻る</button>
@endsection