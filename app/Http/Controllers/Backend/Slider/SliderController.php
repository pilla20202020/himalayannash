<?php

namespace App\Http\Controllers\Backend\Slider;

use App\Models\Album\Album;
use App\Models\Slider\Slider;
use App\Http\Requests\Slider\SliderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 


class SliderController extends Controller
{   
    protected $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->slider->orderBy('created_at','DESC')->get();
        return view('backend.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::where('is_published',1)->get();

        return view('backend.slider.create',compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        if ($slider = $this->slider->create($request->getAllData())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $slider, 'image');
            }
            return redirect()->route('slider.index');
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
        $slider = $this->slider->findOrFail($id);
        $albums = Album::where('is_published',1)->get();
        return view('backend.slider.edit',compact('slider','albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {   
        $slider = $this->slider->findOrFail($id);
        if ($slider->update($request->getAllData())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $slider, 'image');
            }
        }
        return redirect()->route('slider.index')->withSuccess(trans('slider has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = $this->slider->find($id);
        $file_path = public_path('uploads\slider\\').$slider->image;
        if(File::exists($file_path))
        {
            unlink($file_path);
        }
        $slider->delete();
        return redirect()->route('slider.index')->withSuccess(trans('slider has been deleted'));
    }


    function uploadFile(Request $request, $slider, $type = null)
    {
        if ($type == 'image') {
            $file = $request->file('image');
            $path = 'uploads/slider';
            $fileName = $this->uploadFromAjax($file, $path);
            if (!empty($slider->image))
                $this->__deleteImages($slider);

            $data['image'] = $fileName;
        }

        $this->updateImage($slider->id, $data);

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

    public function updateImage($sliderId, array $data)
    {
        try {
            $slider = Slider::find($sliderId);
            $slider = $slider->update($data);
            return $slider;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
