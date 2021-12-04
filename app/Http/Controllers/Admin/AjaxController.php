<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getSubCategory($id){
        $subcategories = SubCategory::where('status', 1)->where('category_id', $id)->orderBy('subcategory_name_en', 'ASC')->get();
        return response()->json($subcategories);
    }
    public function getSubSubCategory($id){
        $subsubcategories = SubSubCategory::where('status', 1)->where('subcategory_id', $id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return response()->json($subsubcategories);
    }
    public function getDistrict($id){
        $districts = District::where('status', 1)->where('division_id', $id)->orderBy('district_name_en', 'ASC')->get();
        return response()->json($districts);
    }
}