<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Manufacturer;
use Illuminate\Http\Request;

class CategoryController extends Controller
{



    public function __construct() {
      $this->middleware('auth')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::orderBy('id','desc')->get();

      return view('Category/index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $category = new Category();
        $category->title = $request->title;
        $category->save();
        return redirect()->route('categories.index', $category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('Category/show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
      $category = Category::find($category->id);

      return view('Category/edit', ['category' => $category,
                                  // 'manufacturers' => $manufacturers,
                                  // 'product' => $product
                                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validation($request);
        // data
        $category->title = $request->title;
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }

    private function validation(Request $request) {

    $request->validate(['title' => 'required|max:300'],
                      ['required' => ':attribute is required!.']
                         );
      }

}
