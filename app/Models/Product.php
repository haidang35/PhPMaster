<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\isEmpty;

class Product extends Model
{
    use HasFactory;
    protected $table  = "products";
    protected $primaryKey = "product_id";

    protected $fillable = [
        "product_name",
        "product_image",
        "product_price",
        "product_quantity",
        "category_id",
        "brand_id",
        "product_desc"
    ];

    public function Category() {
        return $this->belongsTo(Category::class, "category_id","category_id");
    }

    public function Brand() {
        return $this->belongsTo(Brand::class, "brand_id", "brand_id");
    }

    public function scopeSearch($query, $search) {
        if($search == "" || $search == null) {
            return $query;
        }
        return $query->where("product_name", "LIKE", "% $search %");
    }

    public function scopeCategory($query, $category_id) {
        if($category_id == 0 || $category_id == null) {
            return $query;
        }
        return $query->where("category_id", $category_id);
    }

    public function scopeBrand($query, $brand_id) {
        if($brand_id == 0 || $brand_id == null) {
            return $query;
        }
        return $query->where("brand_id", $brand_id);
    }
    public function getImage() {
        if($this->product_image) {
            return asset($this->product_image);
        }
        return null;
    }

}
