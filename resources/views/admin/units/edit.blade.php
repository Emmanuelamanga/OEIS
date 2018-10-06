@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
   
        <div class="col-md-8 col-md-offset-2"> 
        @include('inc.messages')
            <div class="panel panel-default">
                <div class="panel-heading h2 text-center text-uppercase">EDIT UNIT</div>

                <div class="panel-body">
                <form method="POST" action="{{ route('unit.update',[$unit->id]) }}">
                        @csrf
                         @method('PATCH')

            <!-- school name submit(schoo_id)-->
                    <div class="form-group row">
                            <label for="school_id" class="col-md-4 col-form-label text-md-right">{{ __('SCHOOL') }}</label>
                            <div class="col-md-6">                                
                                <select class="form-control{{ $errors->has('school_id') ? ' is-invalid' : '' }}" name="school_id" id="sel1">
                                    @if(count($schools)>0)
                                    <option value="{{$unit->school_id}}" selected>{{$school->get_school($unit->school_id)->school_name}}</option>
                                        @foreach($schools as $school)
                                        <option value="{{$school->school_id}}">{{$school->school_name}}</option>
                                        @endforeach
                                    @else
                                        <option disabled>NO SCHOOLS</option>
                                    @endif
                                    
                                </select>
                                @if ($errors->has('school_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('school_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

              <!-- department name submit(department_id)-->
                    <div class="form-group row">
                            <label for="department_id" class="col-md-4 col-form-label text-md-right">{{ __('DEPARTMENT') }}</label>
                             <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
                            <div class="col-md-6">                                
                                <select class="form-control{{$errors->has('department_id') ? ' is-invalid' : '' }}" name="department_id" id="sel1">
                                    @if(count($departments)>0)
                                    <option value="{{$unit->department_id}}" selected> {{$dept->get_department($unit->department_id)->department_name}}</option>
                                        @foreach($departments as $department)
                                        <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                                        @endforeach
                                    @else
                                        <option disabled>NO departments</option>
                                    @endif
                                    
                                </select>
                                @if ($errors->has('department_id'))
                                    <span class="help-block" role="alert">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                        </div>
                    <!-- course name submit(course_id)-->
                    <div class="form-group row">
                            <label for="course_id" class="col-md-4 col-form-label text-md-right">{{ __('COURSE') }}</label>
                            <div class="col-md-6">                                
                                <select class="form-control{{ $errors->has('course_id') ? ' is-invalid' : '' }}" name="course_id" id="sel1">
                                    @if(count($courses)>0)
                                    <option value="{{$unit->course_id}}" selected>{{$dept->get_course($unit->course_id)->course_name}}</option>
                                        @foreach($courses as $course)
                                        <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                                        @endforeach
                                    @else
                                        <option disabled>NO courses</option>
                                    @endif
                                    
                                </select>
                                @if ($errors->has('course_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <!-- unit id -->
                    <div class="form-group row">
                            <label for="unit_id" class="col-md-4 col-form-label text-md-right">{{ __('UNIT ID') }}</label>

                            <div class="col-md-6">
                                <input id="unit_id" type="text" class="form-control{{ $errors->has('unit_id') ? ' is-invalid' : '' }}" name="unit_id" value="{{ old('$unit->unit_id',$unit->unit_id) }}">

                                @if ($errors->has('unit_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('unit_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!-- Unit name -->
                    <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('UNIT NAME') }}</label>

                            <div class="col-md-6">
                                <input id="unit_name" type="text" class="form-control{{ $errors->has('unit_name') ? ' is-invalid' : '' }}" name="unit_name" value="{{ old('$unit->unit_name',$unit->unit_name) }}">

                                @if ($errors->has('unit_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('unit_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  <span class="glyphicon glyphicon-refresh"></span>  {{ __('UPDATE UNIT') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection