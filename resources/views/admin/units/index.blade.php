@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2"> 
            @include('inc.messages')
            <div class="panel panel-default">
                <div class="panel-heading"> <span class="h2">ALL UNITS</span> <span class="pull-right">{{count($units)}}:unit(s)</span> </div>

                <div class="panel-body">
                @if(count($units)>0)
                    <table class="table table-bordered table-hover table-sm ">
                    <th>#</th>
                        <th>School Name</th>
                        <th>Department Name</th>
                        <th>Course Name</th>
                        <th>Unit Name</th>
                        <th>created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                    @foreach($units as $key => $unit)
                        <tr>
                        <td>{{$key+1}}</td>
                            <td>{{$school->get_school($unit->school_id)->school_name}}</td>
                            <td> {{$department->get_department($unit->department_id)->department_name}} </td>
                            <td>{{$department->get_course($unit->course_id)->course_name}}</td>
                            <td>{{$unit->unit_name}}</td>
                            <td>{{$unit->created_at}}</td>
                            <td>{{$unit->updated_at}}</td>
                            <td><a href="{{route('unit.edit', [$unit->id])}}" class="btn btn-info"> <span class="glyphicon glyphicon-edit"></span> EDIT</a></td>
                        </tr>
                    @endforeach
                    </table>
                @else
                        <span class="alert alert-info">
                            NO REgistered units
                        </span>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection