@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Books</div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <form method="POST" action="{{isset($book)?route('books.update',$book->id):route('books.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($book))
                                        @method('put')
                                    @endif
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{isset($book)?$book->name:''}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Summary</label>
                                        <textarea type="text" name="summary" class="form-control" >{{isset($book)?$book->summary:''}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">ISBN</label>
                                        <input type="number" name="isbn" class="form-control" value="{{isset($book)?$book->isbn:''}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pages</label>
                                        <input type="text" name="pages" class="form-control" value="{{isset($book)?$book->pages:''}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Cover image</label>
                                        <input type="file" name="img" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select name="category_id" class="form-select">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{isset($book) && ($category->id==$book->category_id)?'selected':''}}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                <button type="submit" class="btn btn-outline-success">{{ isset($book)?'Edit':'Add new' }}</button>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

