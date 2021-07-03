<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use const http\Client\Curl\PROXY_HTTP;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $primaryKey = "category_id"; // neu cot la id thi ko can khai bao
//   protected $keyType = "int"; // neu la int thi ko can khai bao
    protected $fillable = [
      "category_name"
    ];


//    public $timestamps = true; // mac dinh la true, tu dong cap nhap thoi gian vao hai cot created at va updated_at

    public function Products() {
        return $this->hasMany(Product::class, "category_id", "category_id");
    }

}
