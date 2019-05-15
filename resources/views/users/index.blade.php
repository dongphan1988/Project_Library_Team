@extends('master')
@section('title','list users')
@section('namepage','List Users')
@section('content')
    <div class="row">
        <table class="table table-striped">
            <thead>
            <tr style="background: #4dc0b5">
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">password</th>
                <th scope="col">phone</th>
                <th scope="col">email</th>
                <th scope="col">address</th>
                <th scope="col"></th>
                <th scope="col">image</th>
            </thead>
            @if(count($users)==0)
                <p class="alert-danger">users list is empty !</p>
            @else
            @foreach($users as $key=>$user)
            <tbody>
            <tr>
                <th style="color: black" scope="row">{{++$key}}</th>
                <td style="font-size: 25px">{{$user->name}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->role->name}}</td>
                <td>
                    <img src="{{asset('storage/'.$user->image)}}" style="width: 50px">
                </td>
            </tr>
            </tbody>
                @endforeach
                {{$users->links()}}
                @endif
        </table>
    </div>
@endsection