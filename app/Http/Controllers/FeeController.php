<?php

namespace App\Http\Controllers;

use App\Fee;
use App\User;
use Illuminate\Http\Request;

class FeeController extends Controller
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
        return view('admin.fees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ?fetch all students
        $students = User::all();
        
        return view('admin.fees.select-student')
                ->with('students', $students);

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
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show($fee)
    {

        return view('admin.fees.update-fees')
                    ->with('student', User::find($fee));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit(Fee $fee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fee)
    {
        $this->validate($request, [
                'fee' => 'required'
        ]);

        User::where('id', $fee)
                ->update([
                    'fee' => $request->fee
                ]);
        return redirect()->route('fee.create')->with('success', 'fees updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fee $fee)
    {
        //
    }
}
