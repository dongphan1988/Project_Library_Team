@extends('master')
@section('title','list users')
@section('namepage','List Users')
@section('content')
    <a href="{{route('users.create')}}">
        <button type="button" class="btn btn-outline-primary ">ADD USER</button>
    </a>
        <table class="table table-striped">
            <thead>
            <tr style="background: #4dc0b5">
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">password</th>
                <th scope="col">phone</th>
                <th scope="col">email</th>
                <th scope="col">address</th>
                <th scope="col">role</th>
                <th scope="col">image</th>
                <th scope="col"></th>
            </thead>
            @if(count($users)==0)
                <tr><td colspan="4">empty data</td></tr>
            @else
                @foreach($users as $key=>$user)
                    <tbody>
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td style="font-size: 25px">{{$user->name}}</td>
                        <th scope="row">{{$user->password}}</th>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>
                            <img src="{{asset('storage/'.$user->image)}}" style="width: 50px">
                        </td>
                        <td>
                            <a href="{{route('users.destroy',['id'=>$user->id])}}">
                                <button type="button" class="btn btn-outline-danger" onclick="return confirm('do you want delete  user {{$user->name}}')" >DELETE</button>
                            </a>
                            <a href="{{route('users.edit',['id'=>$user->id])}}">
                                <button type="button" class="btn btn-outline-primary" >UPDATE</button>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
                {{$users->links()}}
            @endif
        </table>
@endsection