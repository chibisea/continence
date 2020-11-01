 {{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- profile.blade.phpの@yield('title')に'患者一覧'を埋め込む --}}
@section('title', '患者情報編集')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>患者情報編集</h1>
                <form action="{{ action('ProfileController@update') }}" method="post" enctype="multipart/form-data">
                     @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                     @endif
                    <div class="form-group row">
                        <label class="col-md-2"for="name">患者名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profiles_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2"for="gender">性別</label>
                        <select name="gender">
                         <option value="man" {{$profiles_form->gender=="man"? 'selected':''}} >男性</option>
                         <option value="woman"{{$profiles_form->gender=="woman"? 'selected':''}}>女性</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2"for="age">年齢</label>
                        <select name="age">
                          <option value="">{{$profiles_form->age . "歳"}}</option>
                          @foreach(range(60,110) as $cnt)
                           <option value="{{$cnt}}"> {{$cnt . "歳"}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2"for="ward">病棟名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="ward" value="{{ $profiles_form->ward}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2"for="desease">基礎疾患</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="disease" value="{{ $profiles_form->disease}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profiles_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection