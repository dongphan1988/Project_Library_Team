@extends('master')
@section('title', 'edit category')
@section('namepage', 'edit category')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('categories.update',['category'=>$category->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$category->id}}">
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input type="text" class="form-control" name="name"  value="{{$category->name}}" required>
                        @if($errors->has('name'))
                            <p class="alert-danger">{{$errors->first('name')}}</p>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="">Hình ảnh</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
@endsection
