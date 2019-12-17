<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Product;
use Illuminate\Http\Request;
use Helper;
use App\Http\Requests\ValidateProduct;
use Illuminate\Support\Arr;


class ProductController extends Controller
{
    protected $product_repository, $Category_repository;
    public function __construct(ProductRepository $product_Repository, CategoryRepository $Category_repository)
    {
        $this->middleware('auth');
        $this->product_repository = $product_Repository;
        $this->Category_repository = $Category_repository;
    }

    public function index(Request $request)
    {

        $productData = $this->product_repository->getProductData($request);
        $statusArr = Helper::statusArr();
        if ($request->ajax()) {
            return response()->json(['data' => view('Dashboard.Product.ProTable', compact('productData'))->render()]);
        }
        return view('Dashboard.Product.product_listing', compact('statusArr', 'productData'));
    }


    public function create(Request $request)
    {
        $status_arr = Helper::statusArr();

        $catNames = [];
        $categories = $this->Category_repository->getCategoryData($request);

        // $categories = $categories->pluck('name', 'category_id')->toArray();
        // dd($categories);


        return view('Dashboard.Product.addProduct', compact('status_arr', 'categories'));
    }


    public function store(ValidateProduct $request)
    {
        $data = $this->product_repository->storeProduct($request);
        return response()->json(['message' => $data['message'], 'redirectTo' => route('product.index')], $data['http_status']);
    }
    public function edit(Request $request, $id)
    {
        $product = $this->product_repository->getProduct($id);

        $catNames = $product->categories->pluck('category_id')->toArray();


        $categories = $this->Category_repository->getCategoryData($request);
        $status_arr = Helper::statusArr();
        return view('Dashboard.Product.edit', compact('status_arr', 'product', 'categories', 'catNames'));
    }
    public function update(ValidateProduct $request, $id)
    {
        $data = $this->product_repository->updateProduct($request, $id);
        return response()->json(['message' => $data['message'], 'redirectTo' => route('product.index')], $data['http_status']);
    }


    public function destroy($id)
    {
        $data = $this->product_repository->deleteProduct($id);
        return response()->json(['message' => $data['message'], 'redirectTo' => route('product.index')], $data['http_status']);
    }
    public function show($id)
    { }
}
