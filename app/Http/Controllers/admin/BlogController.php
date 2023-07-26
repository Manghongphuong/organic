<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CateBlog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $blogModel;
    public function __construct(Blog $blog)
    {
        $this->blogModel = $blog;
    }
    public function index()
    {
        $listblog = $this->blogModel->leftJoin('cateblog', 'blog.id_blog', '=', 'cateblog.id')->select('blog.*', 'cateblog.name')
        ->orderBy('id', 'desc')
        ->paginate(5);
        return view('admin.blog.listblog', ['listblog'=>$listblog]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cateblog = CateBlog::all();
        return view('admin.blog.addblog', compact('cateblog'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $validated = $request->validated();
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->id_blog = $request->id_blog;
        $blog->summary = $request->summary;
        $blog->content = $request->content;
        $blog->views = $request->views;
        if ($request->file('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = public_path('uploads/' . $fileName);
            $file->move(public_path('uploads'), $fileName);
            $url = asset('uploads/' . $fileName);
            $blog->img = $url;
        }
        $blog->save();
        return redirect()->route('blogposts.index');
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
        $cateblog = CateBlog::all();
        $editblog = Blog::find($id);
        if ($editblog == null) {
            return redirect('/thông báo');
        }
        return view('admin.blog.editblog', ['editblog' => $editblog, 'cateblog' => $cateblog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateblog = Blog::find($id);
        if($updateblog == null){
            return redirect('/thông báo');
        }
        $updateblog->title = $request->title;
        $updateblog->id_blog = $request->id_blog;
        $updateblog->summary = $request->summary;
        $updateblog->content = $request->content;
        $updateblog->views = $request->views;
        if ($request->file('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = public_path('uploads/' . $fileName);
            $file->move(public_path('uploads'), $fileName);
            $url = asset('uploads/' . $fileName);
            $updateblog->img = $url;
        }
        $updateblog->save();
        return redirect()->route('blogposts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteblog = Blog::find($id);
        $deleteblog->delete();
        return redirect()->route('blogposts.index');
    }
}
