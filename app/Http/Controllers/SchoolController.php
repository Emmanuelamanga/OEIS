<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App;
use DB;


class SchoolController extends Controller
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

        return view('admin/schools/index')
                ->with('schools', App\School::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/schools/create');
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
            'school_name' => 'required|string',
        ]);
        
        $school = new School;

        $school->school_id = $request->school_id;
        $school->school_name = $request->school_name;

        $school->save();

        return redirect()->route('school.index')->with('success','School Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the school from db
        $school = School::findOrFail($id);

        return view('admin/schools/edit')
                    ->with('school', $school);


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
            'school_id' => 'required|numeric',
            'school_name' => 'required|string',
        ]);
        
        DB::table('schools')->where('id',$id)->update([
            'school_id' => $request->school_id,
            'school_name' => $request->school_name
        ]);

        return redirect()
                ->route('school.index')
                ->with('success','School Updated');
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
