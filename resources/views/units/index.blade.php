@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
    
        <div class="col-md-2"></div>
            <div class="col-md-8">
             @include('inc.messages')
                <div class="panel panel-default">
                    <div class="panel-heading text-center h3">UNITS DASHBOARD</div>
                    <div class="panel-body">
                        @if($user->unit != 0)
                        <table class="table tabel-bordered table-sm table-striped">                                    
                           @foreach($myUnits as $unit)
                                
                                {{$unit->unit_id}} <br>
                               
                           @endforeach 
                           </table>
                        @else
                        <h4>No Registered Units !!</h4>
                           <a href="{{route('createUnit')}}"><span class="btn btn-info"> <i class="glyphicon glyphicon-pencil"></i> Register Units</span></a> 
                        @endif
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
