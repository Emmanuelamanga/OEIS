@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @include('inc.messages')
            <div class="panel panel-default">
                <div class="panel-heading"> <span class="h2">ALL DEPARTMENTS</span> <span class="pull-right">{{count($departments)}}:departments</span> </div>

                <div class="panel-body">
                @if(count($departments)>0)
                    <table class="table table-bordered table-hover table-sm ">
                    <th>#</th>
                        <th>School Name</th>
                        <th>Department Name</th>
                        <th>created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                    @foreach($departments as $key => $department)
                        <tr>
                        <td>{{$key+1}}</td>
                            <td>{{$school->get_school($department->school_id)->school_name}}</td>
                            <td>{{$department->department_name}}</td>
                            <td>{{$department->created_at}}</td>
                            <td>{{$department->updated_at}}</td>
                            <td><a href="{{route('department.edit', [$department->id])}}" class="btn btn-info"> <span class="glyphicon glyphicon-edit"></span> EDIT</a></td>
                        </tr>
                    @endforeach
                    </table>
                @else
                        <span class="alert alert-info">
                            NO REgistered departments
                        </span>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection