<?php

namespace App\Repositories;

use Storage;
use App\Product;
use Illuminate\Http\Request;

class ProductRepository
{
  public function getProductData(Request $request)
  {
    return Product::with('categories')->when($request->filled('status'), function ($query) use ($request) {
      $query->where('status', 'like', '%' . $request->input('status') . '%');
    })->orderby('product_id', 'desc')
      ->paginate(5);
  }

  public function getProduct(int $id): Product
  {
    return Product::with('categories:categories.category_id,categories.name')->findorfail($id);
  }

  public function storeProduct($request): array
  {
    dd($request->all());
    $filename = "";
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $filename = 'product-image-' . time() . '.' . $file->getClientOriginalExtension();
      // $path = $file->storeAs('public/images', $filename);

      // $path = Storage::disk('s3')->put('naval/images', $file);
      // dd($path);
      /* wq */
    } else {
      $filename = $request->input('old_image');
    }
    $product = new Product();
    $product->name = $request->input('name');
    $product->sku = $request->input('sku');
    $product->desription = $request->input('desription');
    $product->status = $request->input('status');
    $product->amount = $request->input('amount');
    $product->image = $filename;
    $insert = $product->save();
    dump($request->categories_id);
    $product->categories()->attach($request->categories_id);
    if ($insert) {
      return ['message' => 'Product has been added succesfully!', 'http_status' => 200];
    }
    return ['message' => 'Error!', 'http_status' => 500];
  }
  //delete function
  public function deleteProduct($id): array
  {
    $product = $this->getProduct($id);
    $delete = $product->delete();
    if ($delete) {
      return ['message' => 'Product has been Deleted succesfully!', 'http_status' => 200];
    } else {
      return ['message' => 'Product has been Deleted succesfully!', 'http_status' => 200];
    }
  }
  //update function 
  public function updateProduct($request, $id)
  {
    $product = $this->getProduct($id);
    $filename = "";
    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $filename = 'product-image-' . time() . '.' . $file->getClientOriginalExtension();
      Storage::delete('public/images/{{$filename}}');
      $path = $file->storeAs('public/images', $filename);
      $product->image = $filename;
    }
    $product->name = $request->input('name');
    $product->sku = $request->input('sku');
    $product->desription = $request->input('desription');
    $product->status = $request->input('status');
    $product->amount = $request->input('amount');
    $data = $product->save();
    $product->categories()->sync($request->categories_id);
    if ($data) {
      return ['message' => 'Product has been Updated Successfully!', 'http_status' => 200];
    } else {
      return ['message' => 'Product has been Updated Successfully!', 'http_status' => 400];
    }
  }
}
