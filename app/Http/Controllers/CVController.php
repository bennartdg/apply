<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Http\Requests\StoreCVRequest;
use App\Http\Requests\UpdateCVRequest;
use App\Models\Education;
use App\Models\Other;
use App\Models\Personal;
use App\Models\Professional;
use Barryvdh\DomPDF\Facade\Pdf;
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

        $validateData['professional_section_name'] = 'Work Experiences';
        $validateData['education_section_name'] = 'Education Level';
        $validateData['organisation_section_name'] = 'Organisational Experiences';
        $validateData['other_section_name'] = 'Skills, Achievements & Other Experience';
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
     * @param  \App\Models\CV  $cv
     * @return \Illuminate\Http\Response
     */
    public function destroy(CV $cv)
    {
        if ($cv->personal) {
            Personal::destroy($cv->personal->id);
        }
        if ($cv->professional->count() > 0) {
            foreach ($cv->professional as $professional) {
                Professional::destroy($professional->id);
            }
        }
        if ($cv->education->count() > 0) {
            foreach ($cv->education as $education) {
                Education::destroy($education->id);
            }
        }
        if ($cv->other->count() > 0) {
            foreach ($cv->other as $other) {
                Other::destroy($other->id);
            }
        }

        CV::destroy($cv->id);

        return redirect('/home')->with('success', 'Your CV has been removed!');
    }

    public function home()
    {
        return view('content.home', [
            'cvs' => CV::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function export($id)
    {
        $cv = CV::find($id);
        
        $update['export_count'] = $cv->export_count + 1;
        
        CV::where('id', $cv->id)->update($update);

        $pdf = Pdf::loadView('content.show', compact('cv'));

        return $pdf->download(auth()->user()->username . "-" . $cv->cv_name . ".pdf");
    }
    
    public function share($id)
    {
        $cv = CV::find($id);

        $pdf = Pdf::loadView('content.show', compact('cv'));
        return $pdf->stream();

        return view('content.shared', ['cv' => $cv]);
    }
}
