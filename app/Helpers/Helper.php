<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Category;
use App\Product;

class Helper
{
    public static function statusArr()
    {
        $statusArr = array('1' => 'Active', '0' => 'Inactive');
        return $statusArr;
    }
    public static function ActiveCatProduct()
    {
        $data['activeCat'] = Category::orderBy('created_at')->count();
        // $data['activeCat'] = Category::active()->orderBy('created_at')->count();
        $data['activePro'] = Product::orderBy('created_at')->count();

        return $data;
    }
}
