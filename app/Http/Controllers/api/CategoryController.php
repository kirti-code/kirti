<?php

namespace App\Http\Controllers\api;

use Helper;
use App\Repositories\CategoryRepository;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $categories;

    public function __construct(CategoryRepository $categoryData)
    {
        // $this->middleware('auth');
        $this->categories = $categoryData;
    }


    public function storeData(Request $request)
    {
        //dd($request->all());
        $data = $this->categories->storeCategory($request);
        return response()->json(['message' => $data['message']], $data['http_status']);
    }
    public function deleteData($id)
    {
        return $this->categories->deleteCategory($id);
        return response()->json(['message' => $data['message'], 'redirectTo' => route('category.index')], $data['http_status']);
    }
    public function updateData(Request $request, $id)
    {
        /*  echo '<pre>';
        echo ($id);
        echo '</pre>';
        die; */
        $data = $this->categories->updateCategory($request, $id);
        return response()->json(['message' => $data['message'], 'redirectTo' => route('category.index')], $data['http_status']);
    }
    public function showData(Request $request)
    {
        // dd($request);
        $catData = $this->categories->getCategoryData($request);
        return response(['message' => 'success', 'catData' => $catData], 200);


        // dd($catData);
    }
}
