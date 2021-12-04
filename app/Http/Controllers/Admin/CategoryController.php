<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //  index
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    //  Stote
    public function store(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
            'category_icon' => 'required',
        ], [
            'category_name_en.required' => 'category name english field is required',
            'category_name_bn.required' => 'category name bangla field is required',
            'category_icon.required' => 'category icon field is required',
        ]);

        category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_bn' => str_replace(' ', '-', $request->category_name_bn),
            'category_icon' => $request->category_icon,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Store Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Published
    public function published($id)
    {
        Category::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Category Published Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Unpublished
    public function unpublished($id)
    {
        Category::findOrFail($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Category Unpublished Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Delete
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $notification = array(
            'message' => 'Category Delete Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Edit
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    //  Update
    public function update(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
            'category_icon' => 'required',
        ], [
            'category_name_en.required' => 'category name english field is required',
            'category_name_bn.required' => 'category name bangla field is required',
            'category_icon.required' => 'category icon field is required',
        ]);
        $category_id = $request->id;
        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_bn' => str_replace(' ', '-', $request->category_name_bn),
            'category_icon' => $request->category_icon,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Update Success',
            'alert-type' => 'success',
        );
        return redirect()->route('category.index')->with($notification);
    }
}