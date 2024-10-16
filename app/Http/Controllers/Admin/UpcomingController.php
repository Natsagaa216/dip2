<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\SubCategory;
use App\Models\Upcoming;
use App\Models\UpcomingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UpcomingController extends Controller
{
    public function index()
    {
        $upcomings = Upcoming::orderBy('created_at','DESC')->get();
        return view('admin.upcoming.index', compact('upcomings'));
    }

    public function create()
    {
        $subcategories  = SubCategory::all();
        $brands = Brand::all();

        return view('admin.upcoming.create', compact('subcategories','brands'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subcategory' => 'required|exists:sub_categories,id',
            'brand' => 'required|exists:brands,id',
            'show_name' => 'required|string|max:255|unique:upcomings',
            'show_date' => 'required|string|max:255|unique:upcomings',
            'show_time' => 'required|integer',
            'venue' => 'required|string|max:255|unique:upcomings',
            'slug' => 'required|string|max:255|unique:upcomings',
            'price' => 'required|integer',
            'sale' => 'required|integer|min:0|max:100',
            'quantity' => 'required|integer|min:0',
            'description' => 'required|string',
            'image' => 'required|image',
            'status' => 'nullable',
            'trending' => 'nullable',
            'picture.*' => 'nullable|image',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/upcoming/',$filename);
            $validatedData['image'] = 'uploads/upcoming/'.$filename;
        }

        $validatedData['status'] = $request->status == true ? '1':'0';
        $validatedData['trending'] = $request->status == true ? '1':'0';

        $upcoming = Upcoming::create([
            'sub_category_id' => $validatedData['subcategory'],
            'brand_id' => $validatedData['brand'],
            'show_name' => $validatedData['show_name'],
            'show_date' => $validatedData['show_date'],
            'show_time' => $validatedData['show_time'],
            'venue' => $validatedData['venue'],
            'slug' => $validatedData['slug'],
            'price' => $validatedData['price'],
            'sale_percent' => $validatedData['sale'],
            'quantity' => $validatedData['quantity'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
            'trending' => $validatedData['trending']
        ]);


        if($request->hasFile('picture')){
            $uploadPath = 'uploads/upcoming/picture/';

            $i = 1;
            foreach($request->file('picture') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $upcoming->upcomingImages()->create([
                    'product_id' => $upcoming->id,
                    'image' => $finalImagePathName
                ]);
            }
        }

        return redirect('admin/upcoming')->with('message', 'Show Added Successfully!');
    }

    public function edit($id)
    {
        $upcoming = Upcoming::findOrFail($id);
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.upcoming.edit', compact('upcoming','subcategories','brands'));
    }

    public function update(Request $request, $id)
    {
        $upcoming = Upcoming::findOrFail($id);

        $validatedData = $request->validate([
            'sub_category_id' => 'required|exists:sub_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'show_name' => 'required|string|max:255|unique:upcomings,show_name,' . $id,
            'show_date' => 'required|string|max:255|unique:upcomings,show_date,',
            'show_time' => 'required|integer',
            'venue' => 'required|string|max:255|unique:upcomings,venue,',
            'slug' => 'required|string|max:255|unique:products,slug,',
            'price' => 'required|integer',
            'sale_percent' => 'required|integer|min:0|max:100',
            'quantity' => 'required|integer|min:0',
            'description' => 'required|string',
            'image' => 'sometimes|image',
        ]);

        if ($request->hasFile('image')) {

            if(File::exists($upcoming->image)) {
                File::delete($upcoming->image);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/upcoming/', $filename);
            $validatedData['image'] = 'uploads/upcoming/' . $filename;
        }

        $validatedData['status'] = $request->status == true ? '1' : '0';
        $validatedData['trending'] = $request->trending == true ? '1' : '0';

        $upcoming->update($validatedData);

        return redirect('admin/upcoming')->with('message', 'Show Updated Successfully!');
    }

    public function destroy($id)
    {
        $upcoming = Upcoming::findOrFail($id);

        if($upcoming){
            $destination = $upcoming->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $upcoming->delete();
            return redirect('admin/upcoming')->with('message', 'Shows Deleted Successfully!');
        }
        return redirect('admin/upcoming')->with('message', 'Something went wrong!');
    }


    public function showImage($id)
    {
        $upcoming = Upcoming::findOrFail($id);

        return view('admin.upcoming.image', compact('upcoming'));
    }

    public function postImage(Request $request, $id)
    {
        $upcoming = Upcoming::findOrFail($id);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/upcoming/picture/';

            $i = 1;
            foreach($request->file('image') as $file){
                $extension = $file->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $file->move($uploadPath,$filename);
                $finalPathName = $uploadPath.$filename;

                $upcoming->productImages()->create([
                    'upcoming_id' => $upcoming->id,
                    'image' => $finalPathName
                ]);
            }
        }
        return redirect()->back()->with('message','Data амжилттай хуулагдлаа');
    }

    public function removeImage($id)
    {
        $upcomingImage = UpcomingImage::findOrFail($id);

        if(File::exists($upcomingImage->file)){
            File::delete($upcomingImage->file);
        }
        $upcomingImage->delete();
        return redirect()->back()->with('message','Data амжилттай устлаа');

    }



}
