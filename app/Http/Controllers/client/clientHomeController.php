<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class clientHomeController extends Controller
{
    // protected $request;
    // protected function __construct(Request $request)
    // {
    //     $this->request = $request;
    // }

    public function clientHome(){
        $category = Category::all();
        $product = Product::inRandomOrder()->limit(12)->get()->toArray();
        $product_view = Product::orderBy('view','desc')->limit(3)->get()->toArray();
        $product_new = Product::orderBy('created_at','desc')->limit(3)->get()->toArray();
        $product_hot = Product::orderBy('hot','desc')->limit(3)->get()->toArray();
        $banner = Banner::all();
        $blogs = Blog::orderBy('views', 'desc')->limit(3)->get()->toArray();
        return view('client.clientHome', [
            'category'=>$category, 
            'product'=>$product, 
            'product_view'=>$product_view,
            'product_new'=>$product_new,
            'product_hot'=>$product_hot,
            'banner' => $banner,
            'blogs'=> $blogs
        ]);
    }

}
