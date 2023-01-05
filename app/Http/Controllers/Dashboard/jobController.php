<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class jobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jops = Job::paginate(2);
        return view('Dashboard.Jobs.index', ['jops' => $jops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->image;
        if ($image) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/Jops', $filename);
        }
        $request->validate([
            'name' => 'required|max:255',
            'joptitle' => 'required',
            'image' => 'nullable',
            'jopdescription' => 'required',
            'joprequirement' => 'required'
        ]);
        Job::create([
            'name' => $request->name,
            'joptitle' => $request->joptitle,
            'image' => $filename,
            'jopdescription' => $request->jopdescription,
            'joprequirement' => $request->joprequirement
        ]);
        return redirect()->route('dashboard.jobs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $onejop = Job::findOrFail($id);
        $job = new Job();
        return view('Dashboard.Jobs.show', compact('onejop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $myjop = Job::findOrFail($id);
        $job = new Job();
        return view('Dashboard.Jobs.update', compact("myjop"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jops = Job::find($id);
        $name = $jops->image;
        if ($request->file("image")) {

            if ($name !== null) {
                unlink(public_path("uploads/Jops/") . $name);
            }

            $image = $request->file("image");
            $ext = $image->getClientOriginalExtension();
            $name = time() . ".$ext";
            $image->move(public_path("uploads/Jops/"), $name);
        }


        $request->validate([
            'name' => 'required|max:255',
            'joptitle' => 'required',
            'image' => 'nullable',
            'jopdescription' => 'required',
            'joprequirement' => 'required'
        ]);

        $jops->name = $request->name;
        $jops->joptitle = $request->joptitle;
        $jops->image =  $name;
        $jops->jopdescription = $request->jopdescription;
        $jops->joprequirement = $request->joprequirement;
        $jops->save();

        return redirect()->route('dashboard.jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        if ($job->image) {
            unlink(public_path("uploads/Jops/") . $job->image);
        }

        return redirect()->route('dashboard.jobs.index')
            ->with("deleted", "✈ تم حذف الوظيفة بنجاح");
    }
}