@extends('master')
@section('title', 'List Categories')
@section('pagename', 'List Categories')
@section('content')
    <a href="{{ route('categories.create') }}"><button type="button" class=" btn btn-outline-info">ADD CATEGORY</button></a>
    <div class="col-12">
        <div class="row">
            <div class="col-12">
            </div>
            <table class="table table-striped" >
                <thead>
                <tr style="background: #4dc0b5">
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($categories) == 0)
                    <tr><td colspan="4">empty data</td></tr>
                @else
                    @foreach($categories as $key => $category)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                                <img src="{{asset('storage/'.$category->image)}}" style="width: 150px;">
                            </td>
                            <td><a href="{{ route('categories.edit', $category->id) }}">UPDATE</a></td>

                            <td><a href="{{ route('categories.destroy', $category->id) }}" class="text-danger"
                                   @if(count($category->books)==0)
                                   onclick="return confirm('do you want delete {{$category->name}}')"
                            @else
                                onclick="return confirm('exits books in category, do you still want delete {{$category->name}}')"
                                   @endif
                                >xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection