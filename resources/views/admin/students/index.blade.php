@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
     @include('inc.messages')
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Students</div>

                <div class="panel-body">
                    @if(count($students)>0)
                    <table class="table table-bordered table-hover table-sm ">
                    <th>#</th>
                        <!-- <th>School Name</th> -->
                        <th>student Name</th>
                        <th>School Name</th>
                        <th>Department Name</th>
                        <th>course</th>
                        <th>created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                    @foreach($students as $key => $student)
                        <tr>
                        <td>{{$key+1}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$school->get_school($student->school_id)->school_name}}</td>
                            <td> {{$department->get_department($student->department_id)->department_name}} </td>
                            <td>{{$department->get_course($student->course_id)->course_name}}</td>
                            <!-- <td></td> -->
                            <td>{{$student->created_at}}</td>
                            <td>{{$student->updated_at}}</td>
                            <td><a href="{{route('student.edit', [$student->id])}}" class="btn btn-info"> <span class="glyphicon glyphicon-edit"></span> EDIT</a></td>
                        </tr>
                    @endforeach
                    </table>
                @else
                        <span class="alert alert-info">
                            NO REgistered students
                        </span>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection