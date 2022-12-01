@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Books</div>

                    <div class="card-body">
                        @can('admin')
                            <a href="{{route('books.create')}}" class="btn btn btn-outline-success">Add new</a>
                        <hr>
                        @endcan
                        <h5>Search books</h5>
                        <form method="post" action="{{route('books.find')}}">
                            @csrf
                            <div class="mb-3">
                                <label>Search</label>
                                <input name="name" type="text" value="" class="form-control" value="{{$findBook}}" enctype="multipart/form-data" >
                            </div>
                            <button class="btn btn-outline-warning">Search</button>
                        </form>
                        <hr>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Cover</th>
                                <th>Name</th>
                                <th>Summary</th>
                                <th>ISBN</th>
                                <th>Pages</th>
                                <th>Category</th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>
                                        @if($book->img!=null)
                                            <img src="{{asset('storage/books/' . $book->img)}}" style="width: 150px;">
                                        @endif
                                    </td>
                                    <td>{{$book->name}}</td>
                                    <td>{{$book->summary}}</td>
                                    <td>{{$book->isbn}}</td>
                                    <td>{{$book->pages}}</td>
                                    <td>{{$book->category->name}}</td>
                                    @can('user')
                                        <td><button class="btn btn-outline-warning">Like</button></td>
                                        <td><button class="btn btn-outline-success">Reserve</button></td>
                                    @endcan

                                @can('admin')
                                    <td>
                                        <a href="{{route('books.edit',$book->id)}}" class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('books.destroy',$book->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button value="" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    @endcan
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

