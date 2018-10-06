<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App;
use App\School;
use App\Department;
use App\Course;
// use App\Student;
use App\User;

class StudentController extends Controller
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
         
        return view('admin/students/index')
                ->with('school', $school)
                ->with('department', $department)
                ->with('students', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/students/create')
                ->with('schools', School::all())
                ->with('departments', Department::all())
                ->with('courses', Course::all());
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
            'name' => 'required|string|max:255',
            'reg_no'=> 'required|unique:users',
            'course_id' => 'required',
            'school_id' => 'required',
            'department_id' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

         User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'reg_no' => $request->input('reg_no'),
                'course_id' => $request->input('course_id'),
                'school_id' => $request->input('school_id'),
                'department_id' =>$request->input('department_id'),
                'password' => bcrypt($request->input('password')),
            ]);

            return redirect()->route('student.index')->with('success','student created');
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
        $student = User::find($id);

        // instance of school
         $schl = new Department;

        // instance of course
        $dept = new Course;

        return view('admin.students.edit')
                ->with('student', $student)
                 ->with('schl', $schl)
                 ->with('dept', $dept)
               ->with('schools', School::all())
                ->with('departments', Department::all())
                ->with('courses', Course::all());
        
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'reg_no'=> 'required',
            'course_id' => 'required',
            'school_id' => 'required',
            'department_id' => 'required',
            'email' => 'required|string|email|max:255',
            // 'password' => 'required|string|min:6|confirmed',
        ]);

         User::where('id', $id)->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'reg_no' => $request->input('reg_no'),
                'course_id' => $request->input('course_id'),
                'school_id' => $request->input('school_id'),
                'department_id' =>$request->input('department_id'),
                // 'password' => bcrypt($request->input('password')),
            ]);

            return redirect()->route('student.index')->with('success','student updated');
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
