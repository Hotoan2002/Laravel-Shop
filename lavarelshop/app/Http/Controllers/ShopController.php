<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // Lấy danh sách sản phẩm và danh mục từ model hoặc bất kỳ nguồn dữ liệu nào khác
        $productList = \App\Models\Product::all();
        $categoryList = \App\Models\Category::all();

        // Trả về view 'shop.index' và truyền danh sách sản phẩm và danh mục cho view
        return view('shop', compact('productList', 'categoryList'));
    }
}
