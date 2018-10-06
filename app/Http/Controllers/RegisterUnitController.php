<?php

namespace App\Http\Controllers;

use App\RegisterUnit;
use Illuminate\Http\Request;
use Auth;
use App\Unit;
use App\Student_unit;

class RegisterUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('units.index')
        ->with('myUnits', Student_unit::where('student_id', Auth::user()->reg_no)->get())
        ->with('units', Unit::all())
        ->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RegisterUnit  $registerUnit
     * @return \Illuminate\Http\Response
     */
    public function show(RegisterUnit $registerUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RegisterUnit  $registerUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(RegisterUnit $registerUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RegisterUnit  $registerUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegisterUnit $registerUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RegisterUnit  $registerUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegisterUnit $registerUnit)
    {
        //
    }
}
