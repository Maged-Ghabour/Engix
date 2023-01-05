<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jops = Job::paginate(4);
        return view('Front.jobs.index', compact('jops'));
    }
    public function show($id)
    {
        $jop = Job::findOrFail($id);
        return view('Front.jobs.show', compact('jop'));
    }
}