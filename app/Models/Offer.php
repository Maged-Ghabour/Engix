<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        "title" ,  "image" , "description" , "expire_date" , "features"
    ];



    // Local scope for Filter (Search)

    public function scopeFilter(Builder $builder , $filters){



        if($filters["name"] ?? false){
            $builder->where("title" , "like" , "%{$filters["name"]}%");
        }

    }




    public static function rules($id=0){
        return [
        "title"      => "required|string|min:3|max:100|unique:offers,title,$id",
        "description" =>"required|min:3",
        "features" => "required|min:3",
        "expire_date" => "required|date" ,
        "image" => "required|image|mimes:jpg,png,JPG,PNG,web,jpeg"
        ];
    }


}
