<?php

namespace App\Http\Controllers;

use App\Department;
use App\School;
use Illuminate\Http\Request;
use DB;

class DepartmentController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
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

        return view('admin/department/index')
                    ->with('departments', Department::all())
                    ->with('school', $school);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/department/create')
                ->with('schools', School::all());
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
            'department_name' => 'required|string',
        ]);
        
        $department = new Department;

        $department->school_id = $request->school_id;
        $department->department_id = $request->department_id;
        $department->department_name = $request->department_name;

        $department->save();

        return redirect()->route('department.index')->with('success','Department Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($department)
    {
     $department = Department::findOrFail($department);

     return view('admin/department/edit')
                ->with('department', $department)
                ->with('schools', School::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$department)
    {
        $this->validate($request, [

            'school_id' => 'required|numeric',
            'department_id' => 'required',
            'department_name' => 'required|string',
        ]);
        DB::table('departments')->where('id',$department)->update([

            'school_id' => $request->school_id,
            'department_id' => $request->department_id,
            'department_name' => $request->department_name
        ]);
        

        return redirect()->route('department.index')
                        ->with('success','Department Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
