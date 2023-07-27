<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $bannerModel;
    public function __construct(Banner $banner)
    {
        $this->bannerModel = $banner;
    }
    public function index()
    {
        $banners = $this->bannerModel->all();
        return view('admin.banner.list_banner', ['banners'=>$banners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.add_banner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $banners = new Banner();
        $banners->detail = $request->detail;
        if ($request->file('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = public_path('uploads/' . $fileName);
            $file->move(public_path('uploads'), $fileName);
            $url = asset('uploads/' . $fileName);
            $banners->img_banner = $url;
        }
        $banners->save();
        return redirect()->route('banners.index');
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
        $editbanner = Banner::find($id);
        if($editbanner == null){
            return redirect('/thông báo');
        }
        return view('admin.banner.edit_banner', ['editbanner'=>$editbanner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $upbanner = Banner::find($id);
        if($upbanner == null){
            return redirect('/thông báo');
        }
        $upbanner->detail = $request->detail;
        if ($request->file('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = public_path('uploads/' . $fileName);
            $file->move(public_path('uploads'), $fileName);
            $url = asset('uploads/' . $fileName);
            $upbanner->img_banner = $url;
        }
        $upbanner->save();
        return redirect()->route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dlbanners = Banner::find($id);
        $dlbanners->delete();
        return redirect()->route('banners.index');
    }
}
