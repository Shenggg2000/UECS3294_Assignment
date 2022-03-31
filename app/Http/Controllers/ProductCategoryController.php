<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller {
  protected function validator(array $data) {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
    ]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $product_categories = ProductCategory::paginate(10);
    return view('product_categories.index', ['product_categories' => $product_categories]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view('product_categories.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $this->validator($request->all())->validate();
    ProductCategory::create($request->all());
    return redirect('admin/product_categories');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $product_category = ProductCategory::find($id);
    return view("product_categories.show", ['product_category' => $product_category]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $product_category = ProductCategory::find($id);
    return view("product_categories.edit", ['product_category' => $product_category]);
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
    $product_category = ProductCategory::findOrFail($id);
    $product_category->update($request->all());
    return redirect('admin/product_categories');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    ProductCategory::findOrFail($id)->delete();
    return redirect('admin/product_categories');
  }
}
