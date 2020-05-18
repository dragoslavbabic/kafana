<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function store(Request $request){
        if (Auth::user()->admin == 0) {
            return view('noauth');
          }
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'admin' => 'required'
        ]);
        $user = new User ([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'password' => Hash::make($request->get('password')),
            'admin' => $request->get('admin')
        ]);
        $user->save();
        return redirect('/home');
    }

    public function edituser($id){
        if (Auth::user()->admin == 0) {
            return view('noauth');
          }
        $user = User::where('id',$id)->get();
        return view('/parcijali.useredit',compact('user'));
    }

    public function updateuser(Request $request, $id){
        if (Auth::user()->admin == 0) {
            return view('noauth');
          }
        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->admin = $request->admin;
        $user->save();
        return redirect('/home');//->with('alert-success','Uspesno!');
    }
}
