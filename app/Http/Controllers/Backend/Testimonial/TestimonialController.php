<?php

namespace App\Http\Controllers\Backend\Testimonial;

use App\Models\Testimonial\Testimonial;
use App\Http\Requests\Testimonial\TestimonialRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 


class TestimonialController extends Controller
{   
    protected $testimonial;

    public function __construct(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = $this->testimonial->orderBy('created_at','DESC')->get();
        return view('backend.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        if ($testimonial = $this->testimonial->create($request->getAllData())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $testimonial, 'image');
            }
            return redirect()->route('testimonials.index');
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
    public function edit($id)
    {
        $testimonial = $this->testimonial->find($id);
        return view('backend.testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, $id)
    {   
        $testimonial = $this->testimonial->find($id);
        if ($testimonial->update($request->getAllData())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $testimonial, 'image');
            }
        }
        return redirect()->route('testimonials.index')->withSuccess(trans('test$testimonial has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = $this->testimonial->find($id);
        $file_path = public_path('uploads\testimonial\\').$testimonial->image;
        if($testimonial->image)
        {
            unlink($file_path);
        }
        $testimonial->delete();
        return redirect()->route('testimonials.index')->withSuccess(trans('testimonial has been deleted'));
    }

    function uploadFile(Request $request, $testimonial, $type = null)
    {
        if ($type == 'image') {
            $file = $request->file('image');
            $path = 'uploads/testimonial';
            $fileName = $this->uploadFromAjax($file, $path);
            if (!empty($testimonial->image))
                $this->__deleteImages($testimonial);

            $data['image'] = $fileName;
        }

        $this->updateImage($testimonial->id, $data);

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

    public function updateImage($testimonialId, array $data)
    {
        try {
            $testimonial = Testimonial::find($testimonialId);
            $testimonial = $testimonial->update($data);
            return $testimonial;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
