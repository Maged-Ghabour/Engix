<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'CV', 'job_id'];


    public function Job()
    {
        return $this->belongsTo(Job::class);
    }
}