@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="bg-white border p-3 mb-3 text-secondary rounded-4">
                        <div class="row justify-content-center align-items-top">
                            <div class="col-md-10">

                                <h6 align="center" class="mb-3"><b><a
                                            href="{{route('category.show', $category->id)}}">{{$category->name}}</a></b>
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

                    <div class="mt-5">
                        <form method="POST" action="{{route('expenses.store')}}">
                            @csrf
                            <span class="badge bg-success mb-1">{{$category->name}}</span>
                            <div class="form-group">
                                <input type="hidden" name="category_id" id="category_id" value="{{$category->id}}">
                                <label for="name">Name of the expense</label>
                                <input type="text" class="form-control mb-3" name="name" id="name"
                                       placeholder="Supermarket, Gym...">

                                <label for="amount">Amount</label>
                                <input type="number" class="form-control mb-3" name="amount" id="amount"
                                       placeholder="200&euro;">

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" type="text" id="description" rows="3"></textarea>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Add expense</button>
                        </form>
                    </div>


                </div>


            </div>
        </div>
    </div>
@endsection
