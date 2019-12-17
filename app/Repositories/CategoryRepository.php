<?php

namespace App\Repositories;

use Helper;
use App\Category;
use Illuminate\Http\Request;

class CategoryRepository
{
    //function to store student data
    public function storeCategory(Request $request): array
    {
        $category =  Category::create([
            'name' => $request->name,
            'desription' => $request->desription,
            'status' => $request->status,
        ]);
        if ($category) {
            return ['message' => 'Category has been added successfully!', 'http_status' => 200];
        }
        return ['message' => 'Error!', 'http_status' => 500];
    }
    //function to get student data
    public function getCategoryData(Request $request)
    {
        return Category::when($request->filled('serach'), function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->input('serach') . '%');
        })
            ->when($request->filled('status'), function ($q) use ($request) {
                $q->where('status', $request->input('status'));
            })
            ->orderby('category_id', 'desc')
            ->paginate(5);
    }
    public function getCategory(int $id): Category
    {
        return Category::findorfail($id);
    }

    //delete function
    public function deleteCategory($id)
    {
        $category = $this->getCategory($id);
        $delete = $category->delete();
        if ($delete) {
            return ['message' => 'Category has been Deleted succesfully!', 'http_status' => 200];
        } else {
            return ['message' => 'Category has been Deleted succesfully!', 'http_status' => 200];
        }
    }
    public function updateCategory($req, $id)
    {
        if (Category::where('category_id', $id)->update($req->only('name', 'desription', 'status'))) {
            return ['message' => 'Category has been Updated Succesfully!', 'http_status' => 200];
        }
        return ['message' => 'Category has been Updated Succesfully!', 'http_status' => 400];
    }
}
