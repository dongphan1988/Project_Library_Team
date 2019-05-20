@extends('master')
@section('title','Create books')
@section('namepage','Add New books')
@section('content')

    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route('books.store')}}" enctype="multipart/form-data">
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
                        <label class="form-group">description</label>
                        <input type="text" class="form-control" name="description" required>
                        @if($errors->has('description'))
                            <p class="alert-danger">
                                {{$errors->first('description')}}
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-group">category</label>
                        <select name="category_id">
                            @foreach($categories as $key=>$category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-group">qty</label>
                        <input type="number" class="form-control" name="qty" required>
                        @if($errors->has('qty'))
                            <p class="alert-danger">
                                {{$errors->first('qty')}}
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-group">image</label>
                        <input type="file" class="form-control" name="image" >
                    </div>

                    <div>
                        <a href="{{route('books.create')}}">
                            <button type="submit" class="btn-outline-success">ADD NEW BOOK</button>
                        </a>
                        <a href="{{route('books.index')}}">
                            <button type="button" class="btn-outline-success">BACK</button>
                        </a>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection