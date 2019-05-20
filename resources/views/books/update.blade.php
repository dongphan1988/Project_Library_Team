@extends('master')
@section('title','Create books')
@section('namepage','Add New books')
@section('content')

    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{route('books.update',['id'=>$book->id])}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$book->id}}">
                    <div class="form-group">
                        <label class="form-group">name</label>
                        <input type="text" class="form-control" name="name" value="{{$book->name}}" required >
                        @if($errors->has('name'))
                            <p class="alert-danger">
                                {{$errors->first('name')}}
                            </p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-group">description</label>
                        <input type="text" class="form-control" name="description" value="{{$book->description}}"  required>
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
                                <option value="{{$category->id}}"
                                @if($category->id == $book->category->id)
                                    selected
                                        @endif
                                >{{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-group">qty</label>
                        <input type="number" class="form-control" name="qty" value="{{$book->qty}}" min="1" max="200" required>
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
                        <button type="submit" class="btn-outline-success">UPDATE BOOK</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection