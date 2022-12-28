<?php

namespace App\Http\Controllers\Backend\Album;

use App\Models\Album\Album;
use App\Models\Category\SubCategory;
use App\Http\Requests\AlbumRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlbumController extends Controller
{   
    public function __construct(Album $album)
    {
        $this->album = $album;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = $this->album->orderBy('created_at','DESC')->get();
        return view('backend.album.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
        $album = $this->album->create($request->getAllData());
        return redirect()->route('albums.index')->with('success','Album has been created successfully');
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
    public function edit(Album $album)
    {   
        return view('backend.album.edit',compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumRequest $request, Album $album)
    {
        if ($album->update($request->getAllData())) {
            $title =$request->name;
            $title = explode(" ",$title);
            $slug = implode('-',$title);
            $slug = strtolower($slug);
            $album->fill([
                'slug' => $slug,
            ])->save();
        }
        return redirect()->route('albums.index')->withSuccess(trans('album has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = $this->album->find($id);
        $album->delete();
        return redirect()->route('albums.index')->withSuccess(trans('album has been deleted'));
    }

    public function getSubCategory(Request $request)
    {
        $category_id = $request->category_id;
        $sub_categories = SubCategory::where('category_id',$category_id)->where('is_published',1)->get();
        return response()->json(['message'=>$sub_categories]);
    }
}
