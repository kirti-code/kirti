<?php

namespace App\Http\Controllers;

use Helper;
use Excel;
use App\Exports\InvoicesExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Category;
use App\Repositories\CategoryRepository;
use App\Http\Requests\ValidateCategory;


class CategoryController extends Controller
{
    /**
     * 
     */
    protected $categories;

    public function __construct(CategoryRepository $categoryData)
    {
        $this->middleware('auth');
        $this->categories = $categoryData;
    }

    public function dashboard()
    {
        $activArr = Helper::ActiveCatProduct();
        return view('Dashboard.dashboard', compact('activArr'));
    }

    public function index(Request $request)
    {
        /*    echo '<pre>';
        print_r($request);
        echo '</pre>'; */
        $catData = $this->categories->getCategoryData($request);
        //die(print_r($catData->toArray()));
        $statusArr = Helper::statusArr();

        if ($request->ajax()) {
            return response()->json(['data' => view('Dashboard.Category.categoryTable', compact('catData'))->render()]);
        }

        return view('Dashboard.Category.categories_listing', compact('catData', 'statusArr'));
    }


    public function create()
    {
        $status_arr = Helper::statusArr();
        return view('Dashboard.Category.addCaegory', compact('status_arr'));
    }


    public function store(ValidateCategory $request)
    {
        $data = $this->categories->storeCategory($request);
        return response()->json(['message' => $data['message'], 'redirectTo' => route('category.index')], $data['http_status']);
    }

    public function edit($id)
    {
        $category = $this->categories->getCategory($id);
        $status_arr = Helper::statusArr();
        return view('Dashboard.Category.edit', compact('status_arr', 'category'));
    }

    public function update(ValidateCategory $request, $id)
    {
        $data = $this->categories->updateCategory($request, $id);
        return response()->json(['message' => $data['message'], 'redirectTo' => route('category.index')], $data['http_status']);
    }


    public function destroy($id)
    {

        return $this->categories->deleteCategory($id);
        return response()->json(['message' => $data['message'], 'redirectTo' => route('category.index')], $data['http_status']);
    }

    public function downloadDataNew()
    {


        return Excel::download(new InvoicesExport, 'invoices.xlsx');
    }
    public function test(Request $request)
    {
        $categories = $this->categories->getCategoryData($request);

        $names = $categories->reject(function ($category) {
            return $category->status == false;
        })
            ->map(function ($category) {
                return $category->name;
            });

        echo '<pre>';
        print_r($names);
        echo '</pre>';
    }
}
