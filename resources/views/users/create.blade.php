@extends('master')
@section('title','Create user')
@section('pagename','Add New User')
@section('content')
    @if(Session::has('success'))
        <p class="alert-danger">
            {{Session::get('success')}}
        </p>
        @endif
    @if(count($roles) ==0)
        <p class="alert-danger">Role empty, please create role before create user</p>
        @else
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-group">name</label>
                        <input type="text" class="form-control" name="name" required >
                        @if($errors->has('name'))
                            <p class="alert-danger">
                                {{$errors->first('name')}}
                            </p>
                            @endif
                    </div>

                    <div class="form-group">
                        <label class="form-group">email</label>
                        <input type="email" class="form-control" name="email" required>
                        @if($errors->has('email'))
                            <p class="alert-danger">
                                {{$errors->first('email')}}
                            </p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-group">password</label>
                        <input type="password" class="form-control" name="password" required>
                        @if($errors->has('password'))
                            <p class="alert-danger">
                                {{$errors->first('password')}}
                            </p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-group">phone</label>
                        <input type="number" class="form-control" name="phone" required>
                        @if($errors->has('phone'))
                            <p class="alert-danger">
                                {{$errors->first('phone')}}
                            </p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-group">address</label>
                        <input type="text" class="form-control" name="address" required>
                        @if($errors->has('address'))
                            <p class="alert-danger">
                                {{$errors->first('address')}}
                            </p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-group">role</label>
                        <select name="role_id">
                            @foreach($roles as $key=>$role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-group">image</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>

                    <div>
                        <button type="submit" class="btn-outline-success">ADD NEW USER</button>
                    </div>
                    <div>
                        <a href="{{route('users.index')}}">
                        <button type="button" class="btn-outline-success" onclick="window.history.go(-1)">BACK</button>
                        </a>
                    </div>
                </form>
            </div>

        </div>

    </div>
    @endif
@endsection