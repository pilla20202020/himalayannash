<?php

namespace App\Http\Controllers\Backend\Category;

use App\Models\Category\Category;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 


class CategoryController extends Controller
{   
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->orderBy('created_at','DESC')->get();
        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if($category = $this->category->create($request->getAllData())){
            
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $category, 'image');
            }
        };
        return redirect()->route('categories.index');
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
    public function edit($id)
    {
        $category = $this->category->find($id);
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->category->find($id);
        if($category->update($request->getAllData())){
            $title =$request->name;
            $title = explode(" ",$title);
            $slug = implode('-',$title);
            $slug = strtolower($slug);
            $category->fill([
                'slug' => $slug,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $category, 'image');
            }
        };
        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category->find($id);
        $file_path = public_path('uploads\category\\').$category->image;
       
        if(File::exists($file_path))
        {
            unlink($file_path);
        }
        $category->delete();
        return redirect()->route('categories.index');

    }

    function uploadFile(Request $request, $category, $type = null)
    {
        if ($type == 'image') {
            $file = $request->file('image');
            $path = 'uploads/category';
            $fileName = $this->uploadFromAjax($file, $path);
            if (!empty($category->image))
                $this->__deleteImages($category);

            $data['image'] = $fileName;
        }

        $this->updateImage($category->id, $data);

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

    public function updateImage($categoryId, array $data)
    {
        try {
            $category = Category::find($categoryId);
            $category = $category->update($data);
            return $category;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
