<?php

namespace App\Http\Controllers\Backend\Category;

use App\Models\Category\Category;
use App\Models\Category\SubCategory;
use App\Http\Requests\Category\SubCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{   
    protected $subcategory;

    public function __construct(SubCategory $subcategory)
    {
        $this->subcategory = $subcategory;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = $this->subcategory->orderBy('created_at','DESC')->get();
        return view('backend.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::where('is_published',1)->get();
        return view('backend.subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $subcategory = $this->subcategory->create($request->getAllData());
        return redirect()->route('subcategories.index');
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
        $subcategory = $this->subcategory->findOrFail($id);
        $categories = Category::where('is_published',1)->get();
        return view('backend.subcategory.edit',compact('categories','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryRequest $request, $id)
    {
        $subcategory = $this->subcategory->find($id);
        $subcategory->update($request->getAllData());
        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = $this->subcategory->find($id);
        $subcategory->delete();
        return redirect()->route('subcategories.index');

    }
}
