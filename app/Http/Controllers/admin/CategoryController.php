<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $categoryModel;
    public function __construct(Category $category)
    {
        $this->categoryModel = $category;
    }
    public function index()
    {
        $category = $this->categoryModel->all();
        return view('admin.category.listcate',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.addcate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cate = new Category();
        $cate->name = $request->name_cate;
        $cate->save();
        return redirect()->route('categories.index');
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
        $editcate = Category::find($id);
        if ($editcate == null){
            return redirect('/thông báo');
        }
        return view('admin.category.editcate', compact('editcate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $upcate = Category::find($id);
        $upcate->name = $request->name_cate;
        if($upcate == null){
            return redirect('/thông báo');
        }
        $upcate->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
