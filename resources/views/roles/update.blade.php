@extends('master')
@section('title','CREATE ROLE')
@section('pagename','CREATE ROLE')
@section('content')

    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">

                <form method="post" action="{{route('roles.update',['id'=>$role->id])}}" enctype="multipart/form-data" >
                    @csrf
                    <input type="hidden" class="form-control" name="id" value="{{$role->id}}">

                    <div class="form-group">
                        <label class="form-group">name</label>
                        <input type="text" class="form-control" name="name" value="{{$role->name}}" required>
                        @if($errors->has('name'))
                            <p class="alert-danger">{{$errors->first('name')}}</p>
                            @endif
                    </div>

                    <div class="form-group">
                        <label class="form-group" >image</label>
                        <input type="file" class="form-control" name="image" >
                    </div>

                    <div>
                        <button type="submit" class="btn-outline-success">UPDATE</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection