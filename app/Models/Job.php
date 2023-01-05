<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'joptitle', 'image', 'jopdescription', 'joprequirement'];
    public function Applicant()
    {
        return $this->hasMany(Applicant::class);
    }
}