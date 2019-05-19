@extends('master')
@section('title','list roles')
@section('namepage','List Roles')
@section('content')
    <a href="{{route('roles.create')}}">
        <button type="button" class="btn btn-outline-success" > ADD ROLE</button>
    </a>
    <div class="row">
        <table class="table table-striped">
            <thead>
            <tr style="background: #4dc0b5">
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">image</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </thead>


            <tbody>
            @if(count($roles)==0)
                <tr><td colspan="4">empty data</td></tr>
            @else
                @foreach($roles as $key=>$role)
            <tr>
                <th style="color: black" scope="row">{{++$key}}</th>
                <td style="font-size: 25px">{{$role->name}}</td>
                <td>
                    <img src="{{asset('storage/'.$role->image)}}" style="width: 50px">
                </td>
                <td>
                <td>
                    <a href="{{route('roles.destroy',['id'=>$role->id])}}">
                        <button type="button" class="btn btn-outline-danger"
                                @if(count($role->users)==0)
                                onclick="return confirm('do you want delete {{$role->name}}')"
                                @else
                                onclick="return confirm('exits books in category, do you still want delete {{$role->name}}')"
                                @endif
                        >DELETE</button>
                    </a>
                    <a href="{{route('roles.edit',['id'=>$role->id])}}">
                        <button type="button" class="btn btn-outline-primary" >UPDATE</button>
                    </a>
                </td>
                </td>
            </tr>
            </tbody>
            @endforeach
@endif
        </table>
    </div>
@endsection