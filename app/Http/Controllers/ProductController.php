<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller {
  protected function validator(array $data) {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'desc' => ['required', 'string', 'max:255'],
      'product_category_id' =>   ['required'],
      'SKU' => ['required', 'string', 'max:255'],
      'price' => ['required', 'numeric'],
      'stock' => ['required', 'numeric', 'min:0'],
    ]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, $category = null) {
    $product_categories = ProductCategory::all();
    if ($request->has('category')) {
      $category = explode(',', $request->category);
      $products = Product::whereIn('product_category_id', $category)->paginate(10);
    } else {
      $products = Product::paginate(10);
    }
    return view('products.index', ['products' => $products, 'product_categories' => $product_categories]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $product_categories = ProductCategory::all();
    return view('products.create', ['product_categories' => $product_categories]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $this->validator($request->all())->validate();
    $product_category = ProductCategory::findOrFail($request->product_category_id);
    $product_category->products()->save(new Product($request->all()));
    $request->session()->flash('admin-action-success', 'Product Added');
    return redirect('admin/products');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $product = Product::find($id);
    return view("front.product-detail", ['product' => $product]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $product = Product::find($id);
    $product_categories = ProductCategory::all();
    return view("products.edit", ['product' => $product, 'product_categories' => $product_categories]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    $this->validator($request->all())->validate();
    $product = Product::findOrFail($id);
    $product_category = ProductCategory::findOrFail($request->product_category_id);
    $product->product_category()->associate($product_category);
    $product->update($request->all());
    $request->session()->flash('admin-action-success', 'Product Updated');
    return redirect('admin/products');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id) {
    Product::findOrFail($id)->delete();
    $request->session()->flash('admin-action-success', 'Product Deleted');
    return redirect('admin/products');
  }
}
