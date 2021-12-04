<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    //  index
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index', compact('brands'));
    }

    //  Stote
    public function store(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
            'brand_image' => 'required',
        ], [
            'brand_name_en.required' => 'Brand name english field is required',
            'brand_name_bn.required' => 'Brand name bangla field is required',
            'brand_image.required' => 'Brand image field is required',
        ]);
        $image = $request->file('brand_image');
        $image_name = dechex(uniqid()) . octdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'uploads/brands/' . $image_name;
        Image::make($image)->resize(166, 166)->save($save_url);
        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_bn' => $request->brand_name_bn,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_bn' => str_replace(' ', '-', $request->brand_name_bn),
            'brand_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Brand Store Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Published
    public function published($id)
    {
        Brand::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Brand Published Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Unpublished
    public function unpublished($id)
    {
        Brand::findOrFail($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Brand Unpublished Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Unpublished
    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        unlink($brand->brand_image);
        $brand->delete();
        $notification = array(
            'message' => 'Brand Delete Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Index
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }
    //  Update
    public function update(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
        ], [
            'brand_name_en.required' => 'Brand name english field is required',
            'brand_name_bn.required' => 'Brand name bangla field is required',
        ]);
        $brand_id = $request->id;
        $old_image = $request->old_image;
        $image = $request->file('brand_image');
        if ($image) {
            unlink($old_image);
            $image_name = dechex(uniqid()) . octdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'uploads/brands/' . $image_name;
            Image::make($image)->resize(166, 166)->save($save_url);
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_bn' => str_replace(' ', '-', $request->brand_name_bn),
                'brand_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
        }
        else{
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_bn' => str_replace(' ', '-', $request->brand_name_bn),
                'brand_image' => $old_image,
                'updated_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Brand Update Success',
            'alert-type' => 'success',
        );
        return redirect()->route('brand.index')->with($notification);
    }
}