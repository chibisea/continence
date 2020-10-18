<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function add()
    {
    return view('profile.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, continence/app/Profile::$roles);
        $profile = new Profile;
        
        unset($form['__token']);
        
        $profile->fill($form);
        $profile->save();
        return redirect('profile/create');
    }
    
}
