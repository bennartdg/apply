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
        return view('content.home', [
            'cvs' => CV::where('user_id', auth()->user()->id)->get()
        ]);
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

        $validateData ['user_id'] = auth()->user()->id;
        
        CV::create($validateData);
        return redirect('/cv')->with('success', 'New CV has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CV  $cv
     * @return \Illuminate\Http\Response
     */
    public function show(CV $cv)
    {
        return['cv' => $cv];
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
    public function update(UpdateCVRequest $request, CV $cV)
    {
        //
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
}
