@extends('master')
@section('title', 'Add category')
@section('namepage', 'Add category')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>name</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name" required>
                        @if($errors->has('name'))
                            <p class="alert-danger">{{$errors->first('name')}}</p>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="">image</label>
                        <input type="file" class="form-control" name="image" placeholder="Enter image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">ADD CATEGORY</button>
                    <button type="button" class="btn btn-primary" onclick="window.history.back(-1)">BACK</button>
                </form>
            </div>
        </div>
    </div>
@endsection
