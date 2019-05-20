<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Session;
use App\Role;
use App\User;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::paginate(5);

        return view('users.index',compact('users'));
    }
    public function create(){
        $roles = Role::all();
        if(count($roles) == 0){
            Session::flash('success','role empty, you need create role before create users');
            return view('roles.create');

        }
        return view('users.create',compact('roles'));
    }
    public function store(UserRequest $request){
        $user = new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =bcrypt($request->password);
        if($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('images','public');
            $user->image = $path;
        }
        $user->phone =$request->phone;
        $user->address =$request->address;
        $user->role_id =$request->role_id;
        $user->save();
        Session::flash('success','add new user success');
        return redirect()->route('users.create');
    }
    public function destroy($userId){
        $user = User::FindOrFail($userId);
        $user->delete();
        Session::flash('success','delete user complete');
        return redirect()->route('users.index');
    }
    public function edit($userId){
        $user = User::FindOrFail($userId);
        $roles = Role::all();
        return view('users.update',compact('user','roles'));
    }
    public function update(UserRequest $request,$userId){
        $users = User::FindOrFail($userId);
        $users->name =$request->name;
        $users->email =$request->email;
        $users->password =bcrypt($request->password);
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
