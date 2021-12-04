<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ship_Division;
use App\Models\State;

class StateController extends Controller
{
    //  index
    public function index()
    {
        $divisions = Ship_Division::where('status', 1)->orderBy('division_name_en', 'ASC')->get();
        $states = State::latest()->get();
        return view('admin.state.index', compact('states', 'divisions'));
    }


    //  Stote
    public function store(Request $request)
    {
        $request->validate([
            'state_name_en' => 'required',
            'state_name_bn' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
        ], [
            'state_name_en.required' => 'state name english field is required',
            'state_name_bn.required' => 'state name bangla field is required',
            'division_id.required' => 'division name field is required',
            'district_id.required' => 'district name field is required',
        ]);

        State::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name_en' => $request->state_name_en,
            'state_name_bn' => $request->state_name_bn,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'State Store Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Published
    public function published($id)
    {
        State::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'State Published Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Unpublished
    public function unpublished($id)
    {
        State::findOrFail($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'State Unpublished Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Delete
    public function delete($id)
    {
        $state = State::findOrFail($id);
        $state->delete();
        $notification = array(
            'message' => 'State Delete Success',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //  Edit
    public function edit($id)
    {
        $divisions = Ship_Division::where('status', 1)->orderBy('division_name_en', 'ASC')->get();
        $state = State::findOrFail($id);
        return view('admin.state.edit', compact('state', 'divisions'));
    }
    //  Update
    public function update(Request $request)
    {
        $request->validate([
            'state_name_en' => 'required',
            'state_name_bn' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
        ], [
            'state_name_en.required' => 'state name english field is required',
            'state_name_bn.required' => 'state name bangla field is required',
            'division_id.required' => 'division name field is required',
            'district_id.required' => 'district name field is required',
        ]);
        $state_id = $request->id;
        State::findOrFail($state_id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name_en' => $request->state_name_en,
            'state_name_bn' => $request->state_name_bn,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'State Update Success',
            'alert-type' => 'success',
        );
        return redirect()->route('state.index')->with($notification);
    }
}