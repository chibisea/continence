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
        
        $posts = Profile::all()->sortBy('name_kana');
        return view('profile.index', ['posts' => $posts]);
    }
    
}
