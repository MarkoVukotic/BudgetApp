@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-center">

                <div class="col-md-7">


                    @foreach($categories as $category)

                        <div class="bg-white border p-3 mb-3 text-secondary rounded-4">
                            <div class="row justify-content-center align-items-top">
                                <div class="col-md-10">
                                    <h6>{{$category->name}}</h6>
                                    <label for="spent">Spent: </label>
                                    <div class="progress" style="width: 100%">
                                        <div class="progress-bar {{$progress_bar_color}}" role="progressbar" style="width: 25%"
                                             aria-valuenow="{{$category->spent}}"
                                             aria-valuemin="0"
                                             aria-valuemax="{{$category->planned}}"></div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <form class="d-inline"
                                          action="{{route('category.destroy', ['category' => $category->id])}}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="X" class="btn btn-sm btn-danger">
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endforeach


                    <div class="mt-5">
                        <form method="POST" action="{{route('category.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category name</label>
                                <input type="text" class="form-control mb-2" name="name" id="name" placeholder="Food, Personal...">

                                <label for="planned">Planned expences</label>
                                <input type="text" class="form-control" name="planned" id="planned" placeholder="200">
                            </div>
                            <button type="submit" class="btn btn-success mt-2">Create category</button>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
