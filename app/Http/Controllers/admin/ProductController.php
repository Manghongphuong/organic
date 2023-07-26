<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $productModel;
    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

    public function index()
    {
        $listproduct = $this->productModel->leftJoin('category', 'product.id_cate', '=', 'category.id')
        ->select('product.*', 'category.name')
        ->orderBy('id', 'desc');
        $perPage = 10; // Số lượng mục hiển thị trên mỗi trang
        $listproduct = Product::paginate($perPage);
        return view('admin.product.listpro', ['listproduct'=>$listproduct]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catepr = Category::all();
        return view('admin.product.addpro', compact('catepr'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->id_cate = $request->id_catepro;
        $product->name_pr = $request->name_pr;
        $product->number = $request->number;
        $product->price = $request->price;
        $product->promotional_price = $request->promotional_price;
        $product->description = $request->description;
        $product->hot = $request->hot;
        $product->view = $request->views;
        $product->slug = $request->slug;
        if ($request->file('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = public_path('uploads/' . $fileName);
            $file->move(public_path('uploads'), $fileName);
            $url = asset('uploads/' . $fileName);
            $product->img = $url;
        }
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $catepr = Category::all();
        $editpro = Product::find($id);
        if($editpro == null){
            return redirect('/thông báo');
        };
        return view('admin.product.editpro', compact(['editpro', 'catepr']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $upproduct = Product::find($id);
        if($upproduct == null){
            return redirect('/thông báo');
        };
        $upproduct->id_cate = $request->id_catepro;
        $upproduct->name_pr = $request->name_pr;
        $upproduct->number = $request->number;
        $upproduct->price = $request->price;
        $upproduct->promotional_price = $request->promotional_price;
        $upproduct->description = $request->description;
        $upproduct->hot = $request->hot;
        $upproduct->view = $request->views;
        $upproduct->slug = $request->slug;
        if ($request->file('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = public_path('uploads/' . $fileName);
            $file->move(public_path('uploads'), $fileName);
            $url = asset('uploads/' . $fileName);
            $upproduct->img = $url;
        }
        $upproduct->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletpro = Product::find($id);
        $deletpro->delete();
        return redirect()->route('products.index');
    }
}
