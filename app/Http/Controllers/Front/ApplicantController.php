<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function store(Request $request)
    {

        $val = $request->validate([
            'name' => 'required|max:255',
            'CV' => 'required|mimes:pdf|max:1024'
        ]);

        $CV = $request->CV;

        // Validation
        $val = $request->validate([
            'name' => 'required|max:255',
            'CV' => 'required|mimes:pdf|max:1024'
        ]);
        if ($CV) {
            $file = $request->file('CV');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/CV', $filename);
        }

        // $val['CV'] = $request->CV;
        // $val['job_id'] = $request->id;

        Applicant::create([
            'name' => $request->name,
            'CV' => $filename,
            'job_id' => $request->id
        ]);
        // Applicant::create($val);
        return redirect()->route('show', $request->id);
    }
}
