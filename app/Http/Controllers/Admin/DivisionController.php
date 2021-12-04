<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Ship_Division;
use App\Http\Controllers\Controller;

class DivisionController extends Controller
{
    //  index
    public function index()
    {
        $divisions = Ship_Division::latest()->get();
        return view('admin.division.index', compact('divisions'));
    }

    //  Stote
    public function store(Request $request)
    {
        $request->validate([
            'division_name_en' => 'required',
            'division_name_bn' => 'required',
        ], [
            'division_name_en.required' => 'Division name english field is required',
            'division_name_bn.required' => 'Division name bangla field is required',
        ]);
        Ship_Division::insert([
            'division_name_en' => $request->division_name_en,
            'division_name_bn' => $request->division_name_bn,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Store Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Published
    public function published($id)
    {
        Ship_Division::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Division Published Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Unpublished
    public function unpublished($id)
    {
        Ship_Division::findOrFail($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Division Unpublished Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Delete
    public function delete($id)
    {
        $division = Ship_Division::findOrFail($id);
        $division->delete();
        $notification = array(
            'message' => 'Division Delete Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Edit
    public function edit($id)
    {
        $division = Ship_Division::findOrFail($id);
        return view('admin.division.edit', compact('division'));
    }
    //  Update
    public function update(Request $request)
    {
        $request->validate([
            'division_name_en' => 'required',
            'division_name_bn' => 'required',
        ], [
            'division_name_en.required' => 'Division name english field is required',
            'division_name_bn.required' => 'Division name bangla field is required',
        ]);
        $division_id = $request->id;
        Ship_Division::findOrFail($division_id)->update([
            'division_name_en' => $request->division_name_en,
            'division_name_bn' => $request->division_name_bn,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Update Success',
            'alert-type' => 'success',
        );
        return redirect()->route('division.index')->with($notification);
    }
}