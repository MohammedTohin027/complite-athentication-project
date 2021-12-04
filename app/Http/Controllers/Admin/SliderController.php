<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    //  index
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    //  Stote
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ], [
            'image.required' => 'slider image field is required',
        ]);
        $image = $request->file('image');
        $image_name = dechex(uniqid()) . octdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'uploads/sliders/' . $image_name;
        Image::make($image)->resize(650, 280)->save($save_url);
        slider::insert([
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'description_en' => $request->description_en,
            'description_bn' => $request->description_bn,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Slider Store Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Published
    public function published($id)
    {
        Slider::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Slider Published Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Unpublished
    public function unpublished($id)
    {
        Slider::findOrFail($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Slider Unpublished Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Delete
    public function delete($id)
    {
        $slider = Slider::findOrFail($id);
        unlink($slider->image);
        $slider->delete();
        $notification = array(
            'message' => 'Slider Delete Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Edit
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }
    //  Update
    public function update(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ], [
            'image.required' => 'slider image field is required',
        ]);

        $slider_id = $request->id;
        $old_image = $request->old_image;
        $image = $request->file('image');
        if ($image) {
            unlink($old_image);
            $image_name = dechex(uniqid()) . octdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'uploads/sliders/' . $image_name;
            Image::make($image)->resize(650, 280)->save($save_url);
            Slider::findOrFail($slider_id)->update([
                'title_en' => $request->title_en,
                'title_bn' => $request->title_bn,
                'description_en' => $request->description_en,
                'description_bn' => $request->description_bn,
                'image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            Slider::findOrFail($slider_id)->update([
                'title_en' => $request->title_en,
                'title_bn' => $request->title_bn,
                'description_en' => $request->description_en,
                'description_bn' => $request->description_bn,
                'image' => $old_image,
                'updated_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Slider Update Success',
            'alert-type' => 'success',
        );
        return redirect()->route('slider.index')->with($notification);
    }
}
