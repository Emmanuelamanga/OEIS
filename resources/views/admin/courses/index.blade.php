@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
     @include('inc.messages')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <span class="h2">ALL COURSES</span> <span class="pull-right">{{count($courses)}}:course(s)</span> </div>

                <div class="panel-body">
                @if(count($courses)>0)
                    <table class="table table-bordered table-hover table-sm ">
                    <th>#</th>
                        <th>School Name</th>
                        <th>Department Name</th>
                        <th>Course Name</th>
                        <th>created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                    @foreach($courses as $key => $course)
                        <tr>
                        <td>{{$key+1}}</td>
                            <td>{{$school->get_school($course->school_id)->school_name}}</td>
                            <td> {{$department->get_department($course->department_id)->department_name}} </td>
                            <td>{{$course->course_name}}</td>
                            <td>{{$course->created_at}}</td>
                            <td>{{$course->updated_at}}</td>
                            <td><a href="{{route('course.edit', [$course->id])}}" class="btn btn-info"> <span class="glyphicon glyphicon-edit"></span> EDIT</a></td>
                        </tr>
                    @endforeach
                    </table>
                @else
                        <span class="alert alert-info">
                            NO REgistered courses
                        </span>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection