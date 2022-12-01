@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">
                        @can('admin')
                        <a href="{{route('categories.create')}}" class="btn btn btn-outline-success">Add new</a>
                        @endcan
                            <table class="table">
                            <thead>
                            <tr>
                                <th colspan="3">Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>

                                @can('admin')
                                    <td>
                                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('categories.destroy',$category->id)}}">
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

