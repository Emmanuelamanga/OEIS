<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App;
use App\School;
use App\student;
use App\user;
use App\Course;
use App\Student_unit;
use App\Unit;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')
            ->with('user', Auth::user())
            ->with('school', new School) 
            ->with('course', new Course);
    }

    public function create(){

        if((Auth::user()->fee < 20000)){
            return redirect()->back()->with('error', 'Please complete the fees to register units');
        }

        return view('units/create-units')
                ->with('units', Unit::where('course_id', Auth::user()->course_id)->get());
    }

    public function store(Request $request){

        $this->validate($request, [

            'unit'=>'required'

        ]);

        foreach ($request->unit as $key => $value) {
            student_unit::create([
                'student_id' => Auth::user()->reg_no,
                'unit_id' => $value
            ]);
        }

        User::where('reg_no',Auth::user()->reg_no)->update([
            'unit'=>1
        ]);

        return redirect()->route('home')->with('success', 'units registered');
    }
}
