<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CateBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CateBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $cateblogModel;
    public function __construct(CateBlog $cateBlog)
    {
        $this->cateblogModel = $cateBlog;
    }
    public function index()
    {
        $catenew = $this->cateblogModel->all();
        return view('admin.cateblog.listblog', compact('catenew'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cateblog.addblog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cateblog = new CateBlog();
        $cateblog->name = $request->name_cateblog;
        $cateblog->save();
        return redirect()->route('cateblogs.index');
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
        $editcateblog = CateBlog::find($id);
        if ($editcateblog == null){
            return redirect('/thông báo');
        }
        return view('admin.cateblog.editblog', compact('editcateblog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $upcateblog = CateBlog::find($id);
        $upcateblog->name = $request->name_cateblog;
        if($upcateblog == null){
            return redirect('/thông báo');
        }
        $upcateblog->save();
        return redirect()->route('cateblogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cateblog = CateBlog::find($id);
        $cateblog->delete();
        return redirect()->route('cateblogs.index');
    }
}
