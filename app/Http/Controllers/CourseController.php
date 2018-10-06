<?php

namespace App\Http\Controllers;

use App\Course;
use App\School;
use App\Department;
use Illuminate\Http\Request;
use Auth;
use DB;
use App;

class CourseController extends Controller
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
        $department = new Course;

        return view('admin/courses/index')
                    ->with('departments', Department::all())
                    ->with('courses', Course::all())
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
        return view('admin/courses/create')
                ->with('schools', School::all())
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
            'course_name' => 'required|string',
        ]);
        DB::table('courses')->insert([
            'school_id' => $request->school_id,
            'department_id' => $request->department_id,
            'course_id' => $request->course_id,
            'course_name' => $request->course_name
        ]);
        

        return redirect()->route('course.index')
                        ->with('success','Course created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit( $course)
    {
         $course = Course::findOrFail($course);

     return view('admin/courses/edit')
                ->with('course', $course)
                ->with('departments', Department::all())
                ->with('schools', School::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course)
    {
        $this->validate($request, [
            'school_id' => 'required|numeric',
            'department_id' => 'required',
            'course_id' => 'required|string',
            'course_name' => 'required|string',
        ]);
        DB::table('courses')->where('id',$course)->update([

            'school_id' => $request->school_id,
            'department_id' => $request->department_id,
            'course_id' => $request->course_id,
            'course_name' => $request->course_name
        ]);
        

        return redirect()->route('course.index')
                        ->with('success','Course Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
