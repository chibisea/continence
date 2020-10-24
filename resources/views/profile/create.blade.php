 {{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- profile.blade.phpの@yield('title')に'新規患者登録'を埋め込む --}}
@section('title', '新規患者登録')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
 <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>新規患者登録</h1>
                <form action="{{ action('ProfileController@create') }}" method="post" enctype="multipart/form-data">
                     @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                     @endif
                    <div class="form-group row">
                        <label class="col-md-2">患者名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <select name="gender">
                         <option value="man">男性</option>
                         <option value="woman">女性</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">年齢</label>
                        <select name="age">
                          @foreach(range(60,110) as $cnt)
                           <option value="{{$cnt}}"> {{$cnt . "歳"}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">病棟名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="ward" value="{{ old('ward') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">基礎疾患</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="disease" value="{{ old('disease') }}">
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