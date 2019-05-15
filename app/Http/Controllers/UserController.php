<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Session;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(5);

        return view('users.index',compact('users'));
    }
    public function create(){
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }
    public function store(UserRequest $request){
        $users = new User();
        $users->name =$request->name;
        $users->email =$request->email;
        $users->password =$request->password;
        if($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('images','public');
            $users->image = $path;
        }
        $users->phone =$request->phone;
        $users->address =$request->address;
        $users->role_id =$request->role_id;
        $users->save();
        Session::flash('success','add new user success');
        return redirect()->route('users.index');
    }
}
