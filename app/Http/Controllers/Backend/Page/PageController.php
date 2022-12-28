<?php

namespace App\Http\Controllers\Backend\Page;

use App\Models\Page\Page;
use App\Http\Requests\Page\StorePage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 


class PageController extends Controller
{   
    protected $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pages = $this->page->orderBy('created_at', 'desc')->get();
        return view('backend.page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePage $request)
    {
        
        if ($page = $this->page->create($request->pageFillData())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $page, 'image');
            }
            if ($request->hasFile('banner_image')) {
                $this->uploadFile($request, $page, 'banner_image');
            }
            return redirect()->route('page.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('backend.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePage $request, Page $page)
    {
        if ($page->update($request->pageFillData())) {
            $title =$request->title;
            $title = explode(" ",$title);
            $slug = implode('-',$title);
            $slug = strtolower($slug);
            $page->fill([
                'slug' => $slug,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $page, 'image');
            }
            if ($request->hasFile('banner_image')) {
                $this->uploadFile($request, $page, 'banner_image');
            }
        }
        return redirect()->route('page.index')->withSuccess(trans('Page has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = $this->page->find($id);
        $file_path = public_path('uploads\page\\').$page->image;
        if($page->image)
        {
            unlink($file_path);
        }
        $page->delete();
        return redirect()->route('page.index')->withSuccess(trans('page has been deleted'));
    }

    function uploadFile(Request $request, $page, $type = null)
    {
        if ($type == 'image') {
            $file = $request->file('image');
            $path = 'uploads/page';
            $fileName = $this->uploadFromAjax($file, $path);
            if (!empty($page->image))
                $this->__deleteImages($page);

            $data['image'] = $fileName;
        }
        if ($type == 'banner_image') {
            $file = $request->file('banner_image');
            $path = 'uploads/banner_image';
            $fileName = $this->uploadFromAjax($file, $path);
            if (!empty($page->banner_image))
                $this->__deleteImages($page);

            $data['banner_image'] = $fileName;
        }

        $this->updateImage($page->id, $data);

    }

    public function __deleteImages($subCat)
    {
        try {
            if (is_file($subCat->image_path))
                unlink($subCat->image_path);

            if (is_file($subCat->thumbnail_path))
                unlink($subCat->thumbnail_path);

            if (is_file($subCat->banner_path))
                unlink($subCat->banner_path);

        } catch (\Exception $e) {

        }
    }

    public function updateImage($pageId, array $data)
    {
        try {
            $page = Page::find($pageId);
            $page = $page->update($data);
            return $page;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
