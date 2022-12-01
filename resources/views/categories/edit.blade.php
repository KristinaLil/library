@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categories</div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <form method="POST" action="{{isset($category)?route('categories.update',$category->id):route('categories.store')}}">
                                    @csrf
                                    @if (isset($category))
                                        @method('put')
                                    @endif
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{isset($category)?$category->name:''}}">
                                    </div>
                                    <button type="submit" class="btn btn-outline-success">{{ isset($category)?'Edit':'Add new' }}</button>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

