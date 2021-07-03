<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use MongoDB\Driver\Exception\ExecutionTimeoutException;

class CategoryController extends Controller
{
    public function all() {
//        $categories = Category::all();
        $categories = Category::withCount("Products")->get();
        $categories = Category::paginate(20);
//        dd($categories);
        return view("category.list", [
            "categories"=>$categories
        ]);
    }

    public function newCategory() {
        return view("category.form");
    }

    public function save(Request $request){
        $category_name = $request->get("category_name");
        $now = Carbon::now();
        Category::query()->insert([
            "category_name"=>$category_name,
            "created_at"=>$now,
            "updated_at"=>$now,
        ]);
        return redirect()->to("/category");
    }

    public function edit_category($category_id) {
        $category = Category::findOrFail($category_id);
        return view("category.edit", [
            "category" => $category
        ]);
    }

    public function update_category($category_id,Request $request) {
        $category = Category::findOrFail($category_id);
        $request->validate([
           "category_name" => "required"
        ], [
            "category_name.required" => "Vui lòng không để trống tên danh mục sản phẩm"
        ]);
        try {
            $category->update([
                "category_name" => $request->get("category_name")
            ]);
            Session::put("message", "Update infomation of category successful");
            return Redirect::to("/category");
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function delete_category($category_id) {
        $category = Category::findOrFail($category_id);
        try {
            $category->delete();
            Session::put("message", "Delete category successful");
            return Redirect::to("/category");
        }catch (\Exception $e) {
            abort(404);
        }
    }

}
