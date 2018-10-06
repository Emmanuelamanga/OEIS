@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading h2 text-center text-uppercase">Add COURSE</div>

                <div class="panel-body">
                <form method="POST" action="{{ route('course.store') }}">
                        @csrf

            <!-- school name submit(schoo_id)-->
                    <div class="form-group row">
                            <label for="school_id" class="col-md-4 col-form-label text-md-right">{{ __('SCHOOL') }}</label>
                            <div class="col-md-6">                                
                                <select class="form-control{{ $errors->has('school_id') ? ' is-invalid' : '' }}" name="school_id" id="sel1">
                                    @if(count($schools)>0)
                                    <option selected disabled>select school</option>
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
                            <div class="col-md-6">                                
                                <select class="form-control{{ $errors->has('department_id') ? ' is-invalid' : '' }}" name="department_id" id="sel1">
                                    @if(count($departments)>0)
                                    <option selected disabled>select department</option>
                                        @foreach($departments as $department)
                                        <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                                        @endforeach
                                    @else
                                        <option disabled>NO departments</option>
                                    @endif
                                    
                                </select>
                                @if ($errors->has('department_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <!-- course id -->
                    <div class="form-group row">
                            <label for="course_id" class="col-md-4 col-form-label text-md-right">{{ __('COURSE ID') }}</label>

                            <div class="col-md-6">
                                <input id="course_id" type="text" class="form-control{{ $errors->has('course_id') ? ' is-invalid' : '' }}" name="course_id" value="{{ old('course_id') }}">

                                @if ($errors->has('course_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!-- course name -->
                    <div class="form-group row">
                            <label for="department_name" class="col-md-4 col-form-label text-md-right">{{ __('COURSE NAME') }}</label>

                            <div class="col-md-6">
                                <input id="course_name" type="text" class="form-control{{ $errors->has('course_name') ? ' is-invalid' : '' }}" name="course_name" value="{{ old('course_name') }}">

                                @if ($errors->has('course_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  <span class="glyphicon glyphicon-plus"></span>  {{ __('ADD COURSE') }}
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