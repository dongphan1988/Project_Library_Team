<?php

namespace App\Http\Controllers;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Session;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
$roles = Role::all();
return view('roles.index',compact('roles'));
    }
    public function destroy($roleId){
        $role = Role::FindOrFail($roleId);
        $role->users()->delete();
        $role->delete();
        Session::flash('success', 'delete role success');
        return redirect()->route('roles.index');
    }
    public function create(){
return view('roles.create');
    }
    public function store(Request $request){
        $role = new Role();
        $role->name = $request->name;
        if($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('images','public');
            $role->image = $path;
        }


        $role->save();
        Session::flash('success', 'create role success');
        return redirect()->route('roles.create');
    }
    public function edit($roleId){
        $role = Role::FindOrFail($roleId);
        Session::flash('succsess', 'update success');

        return view('roles.update',compact('role'));
    }
    public function update(RoleRequest $request,$roleId){
        $role = Role::FindOrFail($roleId);
        $role->name = $request->name;
        if($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('images','public');
            $role->image = $path;
        }
        Session::flash('success', 'update success');
        $role->save();
return redirect()->route('roles.index');
    }
}
