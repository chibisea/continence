<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
    return view('profile.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request -> all();
        unset($form['__token']);
        
        $profile->fill($form);
        $profile->save();
        return redirect('profile/create');
    }
    
    public function index(Request $request)
    {
        $profiles = Profile::all()->sortByDesc('name');
        return view('profile.index', ['profiles' => $profiles]);
    }
    
    public function edit(Request $request)
  {
      $profiles = Profile::find($request->id);
      if (empty($profiles)){
        abort(404);
      }
      return view('profile.edit', ['profiles_form' => $profiles]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Profile::$rules);
      // Profile Modelからデータを取得する
      $profiles = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profiles_form = $request->all();
      unset($profiles_form['_token']);

      // 該当するデータを上書きして保存する
      $profiles->fill($profiles_form)->save();

      return redirect('profile/index');
  }
    
    public function delete(Request $request)
  {
      $profiles = Profile::find($request->id);
      // 削除する
      $profiles->delete();
      return redirect('profile/index/');
  }
    
}
