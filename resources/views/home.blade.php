@extends('layouts.app')

@section('styles')
<style>

</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading text-center h3">Student     Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-center">
                        <img src="{{asset('storage/icons/student_icon.jpg')}}" alt="" class="img-circle" height="100" width="100">
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <div class="well">
                                <table class="table table-bordered table-sm table-striped table-condensed">
                                    <tr>
                                        <th>Admission No.</th>
                                        <td class="text-center">{{$user->reg_no ?? "No Registration Number"}}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td class="text-center">{{strtoupper($user->name) ?? 'no name'}}</td>
                                    </tr>
                                    <tr>
                                        <th>School</th>
                                        <td class="text-center">{{$school->get_school($user->school_id)->school_name ?? "no school"}}</td>
                                    </tr>
                                      <tr>
                                        <th>Department</th>
                                        <td class="text-center">{{$course->get_department($user->department_id)->department_name ?? "no department"}}</td>
                                    </tr>
                                    <tr>
                                        <th>Course</th>
                                        <td class="text-center">{{$course->get_course($user->course_id)->course_name ?? " no course"}}</td>
                                    </tr>
                                    <tr>
                                        <th>Fee Status</th>
                                        <td class="text-center">{{"Ksh ".$user->fee ?? "no fee"}}
                                            <br>
                                            
                                            <br>
                                            @if(($user->fee > 20000))
                                            {{__(20000 - $user->fee )}} 
                                                <span class="text-success"><i>overpayment</i></span>
                                            @elseif((20000 > $user->fee))
                                               {{"Ksh ".__(20000 - $user->fee )}} 
                                                <span class="text-danger"><i>underpayment</i></span>
                                                  
                                            @endif
                        
                                        </td>
                                    </tr>
                                </table>
                        </div>
                        </div>
                        <div class="col-sm-2">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{route('registerUnits.index')}}" class="btn btn-default">Units</a></li>                            
                            </ul>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
