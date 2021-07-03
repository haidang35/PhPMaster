<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home() {
        return view("home");
    }

    public function aboutUs() {
        return view("aboutUs");
    }

    public function category() {
        return view("listcategory");
    }

    public function products() {
        return view("products");
    }

    public function newCategory() {
        return view("newCategory");
    }

    public function newProduct() {
        return view("newProduct");
    }

    public function editCategory() {
        return view("edit-category");
    }

    public function editProduct() {
        return view("edit-product");
    }

    public function cart() {
        return view("cart");
    }

}
