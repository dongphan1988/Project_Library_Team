@extends('master')
@section('title','List Books')
@section('namepage','List Books')
@section('content')
    <a href="{{route('books.create')}}" class="btn-outline-primary">CREATE BOOKS</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">description</th>
            <th scope="col">category</th>
            <th scope="col">qty</th>
            <th scope="col">image</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @if(count($books) == 0)
            <tr>
                <th>no data</th>
            </tr>
        @else
            @foreach($books as $key=>$book)
                <tr>
                    <th>{{++$key}}</th>
                    <th>{{$book->name}}</th>
                    <th>{{$book->description}}</th>
                    <th>{{$book->category->name}}</th>
                    <th>{{$book->qty}}</th>
                    <th><img src="{{asset('storage/' .$book->image)}}" style="width: 50px"></th>
                    <th>
                        <a href="{{route('books.edit',['id'=>$book->id])}}" class="btn-outline-primary">
                            <button type="button" class="btn-outline-primary">UPDATE</button>
                        </a>
                        <a href="{{route('carts.add',['id'=>$book->id])}}" class="btn-outline-primary">
                            <button type="button" class="btn-outline-primary">ADD CART</button>
                        </a>
                        <a href="{{route('books.destroy',['id'=>$book->id])}}" class="btn-outline-danger"
                           onclick="return confirm('do you want delete {{$book->name}}')">DELETE</a>
                    </th>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection