<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Manufacturer;

class ProductController extends Controller
{
    public function show(Request $request) {

      // dd($request->id);

      // SELECT * FROM products WHERE id = $id WORKS ONLY WITH ID
      $product = Product :: findOrFail($request->id);

      return view('Product/show', ['product' => $product]);
      // echo 'show';

    }

    public function create(Request $request) {

     $categories = Category::all();
     $manufacturers = Manufacturer::all();
     return view('Product/create', [
                    'categories' => $categories,
                    'manufacturers' => $manufacturers
                  ]);
    }


// store
    public function store(Request $request) {


      $this->validation($request);

      $product = new Product();
      $product->title = $request->title;
      $product->price = $request->price;
      $product->description = $request->description;
      $product->quantity = $request->quantity;
      $product->category = $request->category;
      $product->manufacturer = $request->manufacturer;
      $product->save();

      // dd($product->id);

      return redirect()->route('products.show', $product->id);
    }

    public function edit(Request $request) {

      $categories = Category::all();
      $manufacturers = Manufacturer::all();
      $product = Product::find($request->id);

      return view('Product/edit', ['categories' => $categories,
                                  'manufacturers' => $manufacturers,
                                  'product' => $product
                                ]);

    }

    public function update(Request $request) {

      $this->validation($request);

      // edited product
      $product = Product::find($request->id);
      // edited product data
      $product->title = $request->title;
      $product->price = $request->price;
      $product->description = $request->description;
      $product->quantity = $request->quantity;
      $product->category = $request->category;
      $product->manufacturer = $request->manufacturer;
      $product->save();


      return redirect()->route('home');

    }

  private function validation(Request $request) {

      $request->validate([
       'title' => 'required|max:300',
       'price' => 'required|numeric',
       'quantity' => 'required|integer|digits_between:0,10',
       'category' => 'nullable',
       'manufacturer' => 'required|numeric',
       'description' => 'required'
], [
       'required' => ':attribute is required!.'
]);
    }

    public function destroy(Request $request) {
      $product = Product::find($request->id);
      $product->delete();
      return redirect()->route('home');
    }
}
