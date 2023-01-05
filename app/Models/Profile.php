<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;


    protected $primarykey = "user_id";

    protected $fillable = [
        "user_id" ,"firstName" , "lastName" , "birthday" ,"city" , "country" , "state",
        "gender" , "street_address" ,  "state" , "postal_code" , "local" , "phone"
    ];

    public function user(){
        return $this->belongsTo(User::class,"user_id" , "id");
    }
}
