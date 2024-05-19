<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Http\Requests\StoreCVRequest;
use App\Http\Requests\UpdateCVRequest;
use Illuminate\Http\Request;

class CVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCVRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'cv_name' => 'required|max:255'
        ]);

        $validateData['user_id'] = auth()->user()->id;

        CV::create($validateData);
        return redirect('/home')->with('success', 'New CV has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CV  $cv
     * @return \Illuminate\Http\Response
     */
    public function show(CV $cv)
    {
        if (auth()->user()->id == $cv->user_id) {
            return view('content.editor', ['cv' => $cv]);
        }

        return redirect('/home')->with('success', 'CV not found!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CV  $cV
     * @return \Illuminate\Http\Response
     */
    public function edit(CV $cV)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCVRequest  $request
     * @param  \App\Models\CV  $cV
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'professional_section_name' => 'required',
        ]);

        CV::where('id', $id)->update($validateData);

        return redirect('/cv/' . $id . '#professional')->with('success', 'Section name changed!');
    }
    public function updateEducation(Request $request, $id)
    {
        $validateData = $request->validate([
            'education_section_name' => 'required',
        ]);

        CV::where('id', $id)->update($validateData);

        return redirect('/cv/' . $id . '#education')->with('success', 'Section name changed!');
    }
    public function updateOrganisation(Request $request, $id)
    {
        $validateData = $request->validate([
            'organisation_section_name' => 'required',
        ]);

        CV::where('id', $id)->update($validateData);

        return redirect('/cv/' . $id . '#organisation')->with('success', 'Section name changed!');
    }
    public function updateOther(Request $request, $id)
    {
        $validateData = $request->validate([
            'other_section_name' => 'required',
        ]);

        CV::where('id', $id)->update($validateData);

        return redirect('/cv/' . $id . '#other')->with('success', 'Section name changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CV  $cV
     * @return \Illuminate\Http\Response
     */
    public function destroy(CV $cV)
    {
        //
    }

    public function home()
    {
        return view('content.home', [
            'cvs' => CV::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get()
        ]);
    }
}
