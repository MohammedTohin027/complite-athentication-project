<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    //  index
    public function index()
    {
        $categories = Category::where('status', 1)->orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('admin.subcategory.index', compact('subcategories', 'categories'));
    }

    //  Stote
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
            'category_id' => 'required',
        ], [
            'subcategory_name_en.required' => 'subcategory name english field is required',
            'subcategory_name_bn.required' => 'subcategory name bangla field is required',
            'category_id.required' => 'Category name field is required',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_bn' => str_replace(' ', '-', $request->subcategory_name_bn),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'SubCategory Store Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Published
    public function published($id)
    {
        SubCategory::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'SubCategory Published Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Unpublished
    public function unpublished($id)
    {
        SubCategory::findOrFail($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'SubCategory Unpublished Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Delete
    public function delete($id)
    {
        $SubCategory = SubCategory::findOrFail($id);
        $SubCategory->delete();
        $notification = array(
            'message' => 'SubCategory Delete Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Edit
    public function edit($id)
    {
        $categories = Category::where('status', 1)->orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }
    //  Update
    public function update(Request $request)
    {
        $request->validate([
             'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
        ], [
            'category_id.required' => 'Category name field is required',
            'subcategory_name_en.required' => 'SubCategory name english field is required',
            'subcategory_name_bn.required' => 'SubCategory name bangla field is required',
        ]);
        $SubCategory_id = $request->id;
        SubCategory::findOrFail($SubCategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->SubCategory_name_en)),
            'subcategory_slug_bn' => str_replace(' ', '-', $request->subcategory_name_bn),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'SubCategory Update Success',
            'alert-type' => 'success',
        );
        return redirect()->route('subcategory.index')->with($notification);
    }
}