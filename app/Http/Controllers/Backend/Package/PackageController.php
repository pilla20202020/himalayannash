<?php

namespace App\Http\Controllers\Backend\Package;

use App\Models\Image\Image;
use App\Models\Package\Package;
use App\Models\Category\Category;
use App\Models\Category\SubCategory;
use App\Models\Package\Itinerary;
use App\Http\Requests\PackageRequest;
use App\Http\Controllers\Controller;
use App\Models\Customer\PackageEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PackageController extends Controller
{
    public function __construct(Package $package)
    {
        $this->package = $package;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = $this->package->orderBy('created_at', 'DESC')->get();
        return view('backend.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('is_published', 1)->get();
        $sub_categories = SubCategory::where('is_published', 1)->get();
        return view('backend.package.create', compact('categories', 'sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {
        if($package = $this->package->create($request->getAllData())){
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $package, 'image');
            }
        }   

        $itineraries = $request->description;
        if (!empty($itineraries)) {
            foreach ($itineraries as $key => $value) {
                $iti = [
                    'package_id' => $package->id,
                    'title' => $request->title[$key],
                    'day' => $request->day[$key],
                    'description' => $request->description[$key]
                ];

                Itinerary::create($iti);
            }
        }

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $image_path = 'uploads/package/slider';
                $image_name = $image->getClientOriginalName();

                $image->move($image_path, $image_name);
                $new_image = Image::create([
                    'image_path' => $image_path,
                    'imageable_type' => Package::class,
                    'imageable_id' => $package->id,
                    'image_name' => $image_name
                ]);
                // dd($new_image);
            }
        }


        return redirect()->route('package.index')->with('success', 'Package has been added successfully');
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
    public function edit(Package $package)
    {
        $categories = Category::where('is_published', 1)->get();
        $sub_category = SubCategory::where('id', $package->sub_category_id)->get();
        $sub_categories = SubCategory::where('is_published', 1)->get();
        $itineraries = Itinerary::where('package_id', $package->id)->get();
        $images = Image::where('imageable_type', Package::class)->where('imageable_id', $package->id)->get();
        return view('backend.package.edit', compact('package', 'categories', 'sub_category', 'sub_categories', 'itineraries', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PackageRequest $request, Package $package)
    {
        if ($package->update($request->getAllData())) {
            $title = $request->name;
            $title = explode(" ", $title);
            $slug = implode('-', $title);
            $slug = strtolower($slug);
            $package->fill([
                'slug' => $slug,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $package, 'image');
            }

            $images = [];

            if ($request->hasFile('images')) {
                $existing_image = Image::where('imageable_type', Package::class)->where('imageable_id', $package->id)->firstOrFail();
                if($existing_image)
                {
                    $image_path = [];
                    foreach($request->file('images') as $key => $image){
                        $existing_image_path = 'uploads/package/slider'.$existing_image->image_name;
                        if(File::exists($existing_image_path)){
                            unlink($existing_image_path);
                        }
                        $existing_image->image_path = $existing_image_path;
                        $existing_image->image_name =  $image->getClientOriginalName();
                        $existing_image->save();
                    }
                } else {
                    $image_path = [];
                    if ($request->hasFile('images')) {
                        foreach ($request->file('images') as $image) {
                            $image_path = 'uploads/package/slider';
                            $image_name = $image->getClientOriginalName();
            
                            $image->move($image_path, $image_name);
                            $new_image = Image::create([
                                'image_path' => $image_path,
                                'imageable_type' => Package::class,
                                'imageable_id' => $package->id,
                                'image_name' => $image_name
                            ]);
                            // dd($new_image);
                        }
                    }
                }
            }
        }
        return redirect()->route('package.index')->with('success', 'Package has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = $this->package->find($id);
        $file_path = public_path('uploads\package\\').$package->image;
        if($package->image)
        {
            unlink($file_path);
        }
        $package->delete();
        return redirect()->route('package.index')->with('success', 'Package has been deleted successfully!');
    }

    function uploadFile(Request $request, $package, $type = null)
    {
        if ($type == 'image') {
            $file = $request->file('image');
            $path = 'uploads/package';
            $fileName = $this->uploadFromAjax($file, $path);
            if (!empty($package->image))
                $this->__deleteImages($package);

            $data['image'] = $fileName;
        }

        $this->updateImage($package->id, $data);

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

    public function updateImage($packageId, array $data)
    {
        try {
            $package = package::find($packageId);
            $package = $package->update($data);
            return $package;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }


}
