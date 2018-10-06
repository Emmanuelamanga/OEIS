@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @include('inc.messages')
            <div class="panel panel-default">
                <div class="panel-heading"> <span class="h2">ALL SCHOOLS</span> <span class="pull-right">{{count($schools)}}:schools</span> </div>

                <div class="panel-body">
                @if(count($schools)>0)
                    <table class="table table-bordered table-hover table-sm ">
                    <th>#</th>
                        <th>School Ref</th>
                        <th>School Name</th>
                        <th>created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                    @foreach($schools as $key => $school)
                        <tr>
                        <td>{{$key+1}}</td>
                            <td>{{$school->school_id}}</td>
                            <td>{{$school->school_name}}</td>
                            <td>{{$school->created_at}}</td>
                            <td>{{$school->updated_at}}</td>
                            <td><a href="{{route('school.edit', [$school->id])}}" class="btn btn-info"> <span class="glyphicon glyphicon-edit"></span> EDIT</a></td>
                        </tr>
                    @endforeach
                    </table>
                @else
                        <span class="alert alert-info">
                            NO REgistered Schools
                        </span>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection