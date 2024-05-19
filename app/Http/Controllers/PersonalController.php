<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email:dns',
            'linkedin' => 'required',
            'website' => 'nullable',
            'address' => 'nullable',
            'description' => 'required',
            'c_v_id' => 'required',
        ]);

        $validatedData['c_v_id'] = (int) $validatedData['c_v_id'];
        $validatedData['user_id'] = auth()->user()->id;

        Personal::create($validatedData);

        return redirect('/cv/' . $validatedData['c_v_id'] . '#professional')->with('success', 'Your personal information saved!');
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email:dns',
            'linkedin' => 'required',
            'website' => 'nullable',
            'address' => 'nullable',
            'description' => 'required',
            'c_v_id' => 'required',
        ]);

        $validatedData['c_v_id'] = (int) $validatedData['c_v_id'];
        $validatedData['user_id'] = auth()->user()->id;

        Personal::where('id', $id)->update($validatedData);

        return redirect('/cv/' . $validatedData['c_v_id'] . '#professional')->with('success', 'Your personal information saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
