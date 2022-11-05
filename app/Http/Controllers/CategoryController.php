<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use DebugBar\RequestIdGenerator;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $categories = Category::all();
            $progress_bar_color = 'bg-success';

            $progress_bar_color = $this->getProgressBarColor($categories);

            return view('categories.index', compact(['categories'], ['progress_bar_color']));
        }catch (\Exception $exception){
            echo $exception->getMessage();
            echo $exception->getLine();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        try {

            Category::create($request->validated());

            return redirect()->back();

        }catch (\Exception $exception){
            echo $exception->getMessage();
            echo $exception->getLine();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {

            dd($category);

            $category->delete();

            return redirect()->back();

        }catch (\Exception $exception){
            echo $exception->getMessage();
            echo $exception->getLine();
        }
    }

    private function getProgressBarColor(): string{
        try {


            //osmisliti logiku za ovo !




        }catch (Exception $exception){
            echo $exception->getMessage();
            echo $exception->getLine();
        }
    }
}
