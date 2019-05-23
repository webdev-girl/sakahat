<?php

namespace App\Http\Controllers;

use Image;
use App\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function profile()
{
    $user = Auth::user();

    // return view('profile', array('user' => Auth::user()) );
    return view('profile',compact('user',$user));
    }

    public function update_avatar(Request $request){

    $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user = Auth::user();

    $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

    $request->avatar->storeAs('avatars',$avatarName);

    $user->avatar = $avatarName;
    $user->save();

    return back()
        ->with('success','You have successfully upload image.');

    }
///////////////////// gravatar
//     public function profile()
// {
//     return view('profile', array('user' => Auth::user()) );
// }

// public function update_avatar(Request $request)
// {
//     if($request->hasFile('avatar')){
//         $avatar = $request->file('avatar');
//         $filename = time() . '.' . $avatar->getClientOriginalExtension();
//         Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/' . $filename) );
//
//         $user = Auth::user();
//         $user->avatar = $filename;
//         $user->name = Request::input('username');
//         $user->email = Request::input('email');
//         $user->save();
//
//     }
    // return view('profile', array('user' => Auth::user()) );
    // return URL::signedRoute('unsubscribe', ['user' => 1]);
    }
}
