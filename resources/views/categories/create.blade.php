@extends('master')
@section('title', 'Thêm mới thể loại')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm Mới Thể Loại Sách</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Hình ảnh</label>
                        <input type="file" class="form-control" name="image" placeholder="Enter image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
@endsection
