<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function all(Request $request) {
//        $products = Product::query()
//        ->join("categories", "categories.id", "=", "products.category_id")
//        ->join("brands", "brands.brand_id", "=", "products.brand_id")
//        ->orderBy("product_id", "asc")->get();

//        $products = Product::leftjoin("categories", "categories.id", "=", "products.category_id")->get();

        // su dung relation ship
        $category_id = $request->get("category_id");
        $search_value = $request->get("search_value");
        $brand_id = $request->get("brand_id");
//        if($category_id) {
//            $products = Product::with("Category")->where("category_id", $category_id)->paginate(20);
//        } else {
//            $products = Product::with("Category")->paginate(20);
//        }

        $products = Product::with("Category")->search($search_value)->brand($brand_id)->category($category_id)->paginate(20);
        $categories = Category::all();
        $brands = Brand::all();
        return view("product.list", [
            "products"=>$products,
            "categories" => $categories,
            "brands" => $brands
        ]);
    }

    public function addNewProduct() {
        $categories = Category::all();
        $brands = Brand::all();
        return view("product.addnewproduct", [
            "categories" => $categories,
            "brands" => $brands
        ]);
    }

    public function saveNewProduct( Request $request) {
        $request->validate([
            "product_name" => "required",
            "product_quantity" => "required",
            "product_price" => "required",
            "category_id" => "required",
            "brand_id" => "required",
        ], [
            "product_name.required" => "Vui lòng điền tên sản phẩm",
            "product_quantity.required" => "Vui lòng điền số lượng sản phẩm",
            "product_quantity.min" => "Số lượng sản phẩm ít nhất là 1",
            "product_price.required" => "Vui lòng điền giá của sản phẩm",
            "category_id.required" => "Vui lòng chọn danh mục hàng hóa",
        ]);
        try {
            $get_image = $request->file("product_image");
            if($get_image) {
                $get_image_name = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_image_name));
                $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move("upload/products", $new_image);
                $now = Carbon::now();
                Product::query()->insert([
                    "product_name" => $request->get("product_name"),
                    "product_image" => $new_image,
                    "product_quantity" => $request->get("product_quantity"),
                    "product_price" => $request->get("product_price"),
                    "category_id" => $request->get("category_id"),
                    "brand_id" => $request->get("brand_id"),
                    "product_desc" => $request->get("product_desc"),
                    "created_at" => $now,
                    "updated_at" => $now
                ]);
                Session::put("message", "Add new product successful !");
                return redirect()->to("/product");
            }
        }catch (\Exception $e) {
            abort(404);
        }



    }

    public function edit_product($product_id) {
        $product_edit = Product::query()->where("product_id", $product_id)->get();
        $categories = Category::all();
        $brands = Brand::all();
        return view("product.edit_product", [
            "product_edit" => $product_edit,
            "categories" => $categories,
            "brands" => $brands
        ]);
    }

    public function update_product($product_id, Request $request) {

        try {
            $get_image = $request->file("product_image");
            if($get_image) {
                $get_image_name = $get_image->getClientOriginalName();
                $name_image = current(explode(".", $get_image_name));
                $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move("upload/products", $new_image);
                $now = Carbon::now();
                Product::query()->where("product_id", $product_id)->update([
                    "product_name" => $request->get("product_name"),
                    "product_image" => $new_image,
                    "product_quantity" => $request->get("product_quantity"),
                    "category_id" => $request->get("category_id"),
                    "brand_id" => $request->get("brand_id"),
                    "product_price" => $request->get("product_price"),
                    "product_desc" => $request->get("product_desc"),
                    "updated_at" => $now
                ]);
                Session::put("message", "Cập nhập thông tin sản phẩm thành công");
            } else {
                Session::put("message", "Cập nhập thông tin sản phẩm thất bại");
            }
            return Redirect::to("/product/edit/".$product_id);
        }catch (\Exception $e) {
            abort(404);
        }



    }

    public function delete_product($product_id) {
        Product::query()->where("product_id", $product_id)->delete();
        Session::put("message", "Xóa sản phẩm thành công");
        return Redirect::to("/product");
    }

    //Auth: user -> tra ve 1 User BObject chinh la user dang login
    //Auth: id -> tra ve id cua user dang login
    //Auth:check() -> tra ve true/false trang thai dang nhap hay chuaa

}
