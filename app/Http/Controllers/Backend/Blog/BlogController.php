<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Models\Blog\Blog;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 


class BlogController extends Controller
{   
    protected $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blog->orderBy('created_at','DESC')->get();
        return view('backend.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        if ($blog = $this->blog->create($request->getAllData())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $blog, 'image');
            }
            return redirect()->route('blog.index');
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
    public function edit(Blog $blog)
    {
        return view('backend.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        if ($blog->update($request->getAllData())) {
            $title =$request->title;
            $title = explode(" ",$title);
            $slug = implode('-',$title);
            $slug = strtolower($slug);
            $blog->fill([
                'slug' => $slug,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $blog, 'image');
            }
        }
        return redirect()->route('blog.index')->withSuccess(trans('blog has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = $this->blog->find($id);
        $file_path = public_path('uploads\blog\\').$blog->image;
       
        if(File::exists($file_path))
        {
            unlink($file_path);
        }
        $blog->delete();
        return redirect()->route('blog.index')->withSuccess(trans('blog has been deleted'));
    }

    function uploadFile(Request $request, $blog, $type = null)
    {
        if ($type == 'image') {
            $file = $request->file('image');
            $path = 'uploads/blog';
            $fileName = $this->uploadFromAjax($file, $path);
            if (!empty($blog->image))
                $this->__deleteImages($blog);

            $data['image'] = $fileName;
        }

        $this->updateImage($blog->id, $data);

    }

    public function __deleteImages($subCat)
    {
        try {
            if (is_file($subCat->image_path))
                unlink($subCat->image_path);

            if (is_file($subCat->thumbnail_path))
                unlink($subCat->thumbnail_path);

        } catch (\Exception $e) {

        }
    }

    public function updateImage($blogId, array $data)
    {
        try {
            $blog = BLog::find($blogId);
            $blog = $blog->update($data);
            return $blog;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
