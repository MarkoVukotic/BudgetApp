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

                                    <h6 align="center" class="mb-3"><b>
                                            <a href="{{route('category.show', $category->id)}}">{{$category->name}}</a>
                                        </b>
                                    </h6>

                                    <div class="d-flex justify-content-between ">
                                        <div>
                                            <label for="spent">Planned: </label>
                                            <p>{{$category->planned}}&euro;</p>
                                        </div>
                                        <div align="right">
                                            <label for="spent">Spent: </label>
                                            <p>{{$category->spent}}&euro;</p>
                                        </div>
                                    </div>
                                    <div class="progress" style="width: 100%; height: 2px">
                                        <div class="progress-bar {{$category->progress_bar_color}}"
                                             role="progressbar" style="width: {{$category->percentage}}%"
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
                                        <input type="submit" value="x" class="btn btn-sm btn-danger">
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
                                <input type="text" class="form-control mb-2" name="name" id="name"
                                       placeholder="Food, Personal...">

                                <label for="planned">Planned expences</label>
                                <input type="number" class="form-control" name="planned" id="planned" placeholder="200&euro;">
                            </div>
                            <button type="submit" class="btn btn-success mt-2">Create category</button>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
