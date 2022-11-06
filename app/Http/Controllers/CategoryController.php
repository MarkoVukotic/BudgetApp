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
            $categories = $this->getProgressBarColorForEveryCategory($categories);
            $categories = json_decode($categories);

            return view('categories.index', compact(['categories']));
        } catch (\Exception $exception) {
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        try {

            Category::create($request->validated());

            return redirect()->back();

        } catch (\Exception $exception) {
            echo $exception->getMessage();
            echo $exception->getLine();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {

            dd($category);

            $category->delete();

            return redirect()->back();

        } catch (\Exception $exception) {
            echo $exception->getMessage();
            echo $exception->getLine();
        }
    }

    private function getProgressBarColorForEveryCategory($categories): string
    {
        try {
            $categories->each(function ($category) {
                $percentage = ($category->spent / $category->planned) * 100;

                if ($percentage <= 75) {
                    $category['progress_bar_color'] = 'bg-success';
                    return $category;
                } else if ($percentage <= 100) {
                    $category['progress_bar_color'] = 'bg-warning';
                    return $category;
                } else {
                    $category['progress_bar_color'] = 'bg-danger';
                    return $category;
                }
            });

            return $this->getProgressBarPercentage($categories);

        } catch (Exception $exception) {
            echo $exception->getMessage();
            echo $exception->getLine();
        }
    }

    private function getProgressBarPercentage($categories): string
    {
        try {
            $categories->each(function ($category) {
                $percentage = ($category->spent / $category->planned) * 100;
                return $category['percentage'] = $percentage;
            });

            return $categories;

        } catch (Exception $exception) {
            echo $exception->getMessage();
            echo $exception->getLine();
        }
    }
}
