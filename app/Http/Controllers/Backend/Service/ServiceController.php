<?php

namespace App\Http\Controllers\Backend\Service;

use App\Models\Service\Service;
use App\Http\Requests\Service\ServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 


class ServiceController extends Controller
{   
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $services = $this->service->orderBy('created_at','DESC')->get();
        return view('backend.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        if ($service = $this->service->create($request->getAllData())) {
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $service, 'image');
            }
            return redirect()->route('service.index');
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
    public function edit(Service $service)
    {
        return view('backend.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        if ($service->update($request->getAllData())) {
            $title =$request->title;
            $title = explode(" ",$title);
            $slug = implode('-',$title);
            $slug = strtolower($slug);
            $service->fill([
                'slug' => $slug,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $service, 'image');
            }
        }
        return redirect()->route('service.index')->withSuccess(trans('service has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = $this->service->find($id);
        $file_path = public_path('uploads\service\\').$service->image;
        if($service->image)
        {
            unlink($file_path);
        }
        $service->delete();
        return redirect()->route('service.index')->withSuccess(trans('service has been deleted'));
    }

    function uploadFile(Request $request, $service, $type = null)
    {
        if ($type == 'image') {
            $file = $request->file('image');
            $path = 'uploads/service';
            $fileName = $this->uploadFromAjax($file, $path);
            if (!empty($service->image))
                $this->__deleteImages($service);

            $data['image'] = $fileName;
        }

        $this->updateImage($service->id, $data);

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

    public function updateImage($serviceId, array $data)
    {
        try {
            $service = service::find($serviceId);
            $service = $service->update($data);
            return $service;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
