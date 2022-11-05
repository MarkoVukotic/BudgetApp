@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <form method="POST" action="{{route('category.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter category name">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Create new category</button>
                </form>


            </div>
        </div>
    </div>
@endsection
