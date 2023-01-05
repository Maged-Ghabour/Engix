<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index($id)
    {
        $AllCV = Job::find($id)->Applicant;
        return view('Dashboard.Applicant.index', compact('AllCV'));
    }
    public function show($id)
    {
        $CV = Applicant::find($id);
        return view('Dashboard.Applicant.CV', compact('CV'));
    }
    public function destroy($id)
    {
        $CV = Applicant::find($id);
        $CV->delete();
        if ($CV->CV) {
            unlink(public_path("uploads/CV/") . $CV->CV);
        }
        return redirect()->back();
    }
}