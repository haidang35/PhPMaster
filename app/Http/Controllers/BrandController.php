<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    public function all_brand() {
        $brands = Brand::all();
        $brands = Brand::paginate(20);
        return view("brand.all_brand", [
            "brands" => $brands
        ]);
    }

    public function add_brand() {
        return view("brand.add_brand");
    }

    public function save_brand(Request $request) {
        $request->validate([
            "brand_name" => "required",
        ]);
        $now = Carbon::now();
        try {
            Brand::create([
                "brand_name" => $request->get("brand_name"),
                "brand_desc" => $request->get("brand_desc"),
                "created_at" => $now
            ]);
            Session::put("message", "Add new brand successful");
            return Redirect::to("/brand");
        }catch (\Exception $e) {
            abort(404);
        }

    }

    public function edit_brand($brand_id) {
       $brand = Brand::findOrFail($brand_id);
       return view("brand.edit_brand", [
           "brand" => $brand
       ]);
    }

    public function update_brand($brand_id, Request $request) {
        $brand = Brand::findOrFail($brand_id);
        try {
             $brand->update([
                 "brand_name" => $request->get("brand_name"),
                 "brand_desc" => $request->get("brand_desc"),
             ]);
             Session::put("message", "Update brand successful");
             return Redirect::to("/brand");
        }catch (\Exception $e) {
            abort(404);
        }
    }

    public function delete_brand($brand_id) {
        $brand = Brand::findOrFail($brand_id);
        try {
            $brand->delete();
            Session::put("message", "Delete brand successful");
            return Redirect::to("/brand");
        }catch (\Exception $e) {
            abort(404);
        }
    }
}
