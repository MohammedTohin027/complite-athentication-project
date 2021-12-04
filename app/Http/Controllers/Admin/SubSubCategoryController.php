<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;

class SubSubCategoryController extends Controller
{
    //  index
    public function index()
    {
        $categories = Category::where('status', 1)->orderBy('category_name_en', 'ASC')->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('admin.subsubcategory.index', compact('subsubcategories', 'categories'));
    }


    //  Stote
    public function store(Request $request)
    {
        $request->validate([
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_bn' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ], [
            'subsubcategory_name_en.required' => 'SubSubCategory name english field is required',
            'subsubcategory_name_bn.required' => 'SubSubCategory name bangla field is required',
            'category_id.required' => 'Category name field is required',
            'subcategory_id.required' => 'SubCategory name field is required',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_bn' => str_replace(' ', '-', $request->subsubcategory_name_bn),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Store Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Published
    public function published($id)
    {
        SubSubCategory::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'SubSubCategory Published Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Unpublished
    public function unpublished($id)
    {
        SubSubCategory::findOrFail($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'SubSubCategory Unpublished Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Delete
    public function delete($id)
    {
        $subsubcategory = SubSubCategory::findOrFail($id);
        $subsubcategory->delete();
        $notification = array(
            'message' => 'SubSubCategory Delete Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Edit
    public function edit($id)
    {
        $categories = Category::where('status', 1)->orderBy('category_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('admin.subsubcategory.edit', compact('subsubcategory', 'categories'));
    }
    //  Update
    public function update(Request $request)
    {
        $request->validate([
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_bn' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ], [
            'subsubcategory_name_en.required' => 'SubSubCategory name english field is required',
            'subsubcategory_name_bn.required' => 'SubSubCategory name bangla field is required',
            'category_id.required' => 'Category name field is required',
            'subcategory_id.required' => 'SubCategory name field is required',
        ]);
        $subsubcategory_id = $request->id;
        SubSubCategory::findOrFail($subsubcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_bn' => str_replace(' ', '-', $request->subsubcategory_name_bn),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Update Success',
            'alert-type' => 'success',
        );
        return redirect()->route('subsubcategory.index')->with($notification);
    }
}
