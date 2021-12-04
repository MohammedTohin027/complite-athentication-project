<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Ship_Division;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    //  index
    public function index()
    {
        $divisions = Ship_Division::where('status', 1)->orderBy('division_name_en', 'ASC')->get();
        $districts = District::latest()->get();
        return view('admin.district.index', compact('districts', 'divisions'));
    }

    //  Stote
    public function store(Request $request)
    {
        $request->validate([
            'district_name_en' => 'required',
            'district_name_bn' => 'required',
            'division_id' => 'required',
        ], [
            'district_name_en.required' => 'district name english field is required',
            'district_name_bn.required' => 'district name bangla field is required',
            'division_id.required' => 'division name field is required',
        ]);

        District::insert([
            'division_id' => $request->division_id,
            'district_name_en' => $request->district_name_en,
            'district_name_bn' => $request->district_name_bn,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Store Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Published
    public function published($id)
    {
        District::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'District Published Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Unpublished
    public function unpublished($id)
    {
        District::findOrFail($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'District Unpublished Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Delete
    public function delete($id)
    {
        $district = District::findOrFail($id);
        $district->delete();
        $notification = array(
            'message' => 'District Delete Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Edit
    public function edit($id)
    {
        $divisions = Ship_Division::where('status', 1)->orderBy('division_name_en', 'ASC')->get();
        $district = district::findOrFail($id);
        return view('admin.district.edit', compact('district', 'divisions'));
    }

    //  Update
    public function update(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_name_en' => 'required',
            'district_name_bn' => 'required',
        ], [
            'division_id.required' => 'division name field is required',
            'district_name_en.required' => 'district name english field is required',
            'district_name_bn.required' => 'district name bangla field is required',
        ]);
        $district_id = $request->id;
        District::findOrFail($district_id)->update([
            'division_id' => $request->division_id,
            'district_name_en' => $request->district_name_en,
            'district_name_bn' => $request->district_name_bn,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Update Success',
            'alert-type' => 'success',
        );
        return redirect()->route('district.index')->with($notification);
    }
}
