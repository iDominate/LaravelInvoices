<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('sections.section', compact('sections'));
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
        $input = $request->all();

        $existing_section = Section::where('section_name', $input['section_name'])->first();
        if($existing_section){
            $request->session()->put('Error', "هذا القسم موجود");
            return redirect();
        }else {
            Section::create([
                'section_name' => $input['section_name'],
                'description' => $input['description'],
                'created_by' => Auth::user()->name
            ]);
            $request->session()->put('Success', 'تم اضافة القسم بنجاح');
        }

        return redirect('/sections');

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $validatedRequest = $request->validate([
            'id' => '',
            'section_name' => 'required|unique:sections,section_name',
            'description' => ''
        ], [
            'section_name.required' => 'ادخل اسم القسم',
        ]);
        
        $existingSection = Section::find($validatedRequest['id'])->first();

        $existingSection->update($request->all());

        session()->flash('Success', 'تم التعديل بنجاح');

        return redirect('/sections');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $section = section::find($request->id);
        $section->delete();

        session()->flash('Success', 'تم الحذف بنجاح');

        return redirect('/sections');
    }
}
