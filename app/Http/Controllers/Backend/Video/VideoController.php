<?php

namespace App\Http\Controllers\Backend\Video;

use App\Models\Video\Video;
use App\Http\Requests\Video\VideoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 


class VideoController extends Controller
{   
    protected $video;

    public function __construct(Video $video)
    {
        $this->video = $video;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $videos = $this->video->orderBy('created_at','DESC')->get();
        return view('backend.video.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        if ($video = $this->video->create($request->getAllData())) {
            if ($request->hasFile('video')) {
                $this->uploadFile($request, $video, 'video');
            }
            return redirect()->route('videos.index');
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
        $video = $this->video->find($id);
        return view('backend.video.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, $id)
    {
        $video = $this->video->find($id);
        if ($video->update($request->getAllData())) {
            if ($request->hasFile('video')) {
                $this->uploadFile($request, $video, 'video');
            }
        }
        return redirect()->route('videos.index')->withSuccess(trans('video has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = $this->video->find($id);
        $file_path = public_path('uploads\video\\').$video->video;
        if($video->video)
        {
            unlink($file_path);
        }
        $video->delete();
        return redirect()->route('videos.index');
    }

    function uploadFile(Request $request, $video, $type = null)
    {
        if ($type == 'video') {
            $file = $request->file('video');
            $path = 'uploads/video';
            $fileName = $this->uploadFromAjax($file, $path);
            if (!empty($video->video))
                $this->__deletevideos($video);

            $data['video'] = $fileName;
        }

        $this->updatevideo($video->id, $data);

    }

    public function __deletevideos($subCat)
    {
        try {
            if (is_file($subCat->video_path))
                unlink($subCat->video_path);

            if (is_file($subCat->thumbnail_path))
                unlink($subCat->thumbnail_path);

        } catch (\Exception $e) {

        }
    }

    public function updatevideo($videoId, array $data)
    {
        try {
            $video = video::find($videoId);
            $video = $video->update($data);
            return $video;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }
}
