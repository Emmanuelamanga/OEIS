<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Course;
use App\School;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
       public function __construct(){
        
                $this -> middleware('auth:admin');
            }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school = new Department;
        $department = new Course;

        return view('admin/units/index')
                    ->with('departments', Department::all())
                    ->with('units', Unit::all())
                    ->with('school', $school)
                    ->with('department', $department);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/units/create')
                ->with('schools', School::all())
                ->with('courses', Course::all())
                 ->with('departments', Department::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'school_id' => 'required|numeric',
            'department_id' => 'required',
            'course_id' => 'required|string',
            'unit_id' => 'required|string',
            'unit_name' => 'required|string',

        ]);
        DB::table('units')->insert([
            'school_id' => $request->school_id,
            'department_id' => $request->department_id,
            'course_id' => $request->course_id,
            'unit_id' => $request->unit_id,
            'unit_name' => $request->unit_name,
        ]);
        

        return redirect()->route('unit.index')
                        ->with('success','Unit created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($unit)
    {
         $school = new Department;
        $department = new Course;
    $unit = Unit::findOrFail($unit);

     return view('admin/units/edit')
                ->with('unit', $unit)
                ->with('courses', Course::all())
                ->with('departments', Department::all())
                ->with('schools', School::all())
                ->with('school', $school)
                ->with('dept', $department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $unit)
    {
         $this->validate($request, [
            'school_id' => 'required|numeric',
            'department_id' => 'required',
            'course_id' => 'required|string',
            'unit_id' => 'required|string',
            'unit_name' => 'required|string',

        ]);
        DB::table('units')->where('id',$unit)->update([

             'school_id' => $request->school_id,
            'department_id' => $request->department_id,
            'course_id' => $request->course_id,
            'unit_id' => $request->unit_id,
            'unit_name' => $request->unit_name,
        ]);
        

        return redirect()->route('unit.index')
                        ->with('success','Unit Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
