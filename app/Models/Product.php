<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "category_id", "image", "description", "slug", "price", "compare_price"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }



    public static function rules($id = 0)
    {
        return [




        "name"      => "required|string|min:3|max:100|unique:products,name,$id",
        // "parent_id" => "nullable|int|exists:categories,id",
        "description" =>"required",
        "price" => "required|numeric|min:0|max:100000",
        "compare_price" =>"nullable|numeric|min:0|max:100000",
        "image" => "required|image|mimes:jpg,png,JPG,PNG,web,jpeg"




        ];
    }


    // Local scope for Filter (Search)

    public function scopeFilter(Builder $builder, $filters)
    {



        if ($filters["name"] ?? false) {
            $builder->where("name", "like", "%{$filters["name"]}%");
        }
    }
}
