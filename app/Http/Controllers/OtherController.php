<?php

namespace App\Http\Controllers;

use App\Models\Other;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'activity_name' => 'required|max:255',
            'activity_year' => 'required|max:4',
            'activity_elaboration' => 'required|max:255',
            'c_v_id' => 'required',
        ]);

        $validateData['c_v_id'] = (int) $validateData['c_v_id'];
        $validateData['user_id'] = auth()->user()->id;

        Other::create($validateData);

        return redirect('/cv/' . $validateData['c_v_id'] . "#other")->with('success', 'Other section has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validateData = $request->validate([
            'activity_name' => 'required|max:255',
            'activity_year' => 'required|max:4',
            'activity_elaboration' => 'required|max:255',
            'c_v_id' => 'required',
        ]);

        $validateData['c_v_id'] = (int) $validateData['c_v_id'];
       
        Other::where('id', $id)->update($validateData);

        return redirect('/cv/' . $validateData['c_v_id'] . "#other")->with('success', 'Other section has been saved!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Other  $other
     * @return \Illuminate\Http\Response
     */
    public function destroy(Other $other)
    {
        $cv_id = $other->c_v_id;

        Other::destroy($other->id);

        return redirect('/cv/' . $cv_id . '#other')->with('success', 'Your other experience has been removed!');

    }
}
