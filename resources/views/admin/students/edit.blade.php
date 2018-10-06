@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         @include('inc.messages')
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('EDIT STUDENT') }}</div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('student.update', [$student->id]) }}">
                        @csrf
                        @method('PATCH')

                        <!-- name -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('$student->name',$student->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <!-- reg no -->
                    <div class="form-group row">
                            <label for="reg_no" class="col-md-4 col-form-label text-md-right">{{ __('Registration Number') }}</label>

                            <div class="col-md-6">
                                <input id="reg_no" type="text" class="form-control{{ $errors->has('reg_no') ? ' is-invalid' : '' }}" name="reg_no" value="{{old('$student->reg_no', $student->reg_no)}}" >

                                @if ($errors->has('reg_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reg_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <!-- school -->
                    <div class="form-group row">
                            <label for="school_id" class="col-md-4 col-form-label text-md-right">{{ __('School') }}</label>
                            <div class="col-md-6"> 
                            @if(count($schools)>0)                               
                                <select class="form-control{{ $errors->has('school_id') ? ' is-invalid' : '' }}" name="school_id" id="sel1">
                                    <option value="{{$student->school_id}}"  selected>{{$schl->get_school($student->school_id)->school_name}}</option>
                                    @foreach($schools as $school)
                                    <option value="{{$school->school_id}}">{{$school->school_name}}</option>
                                    @endforeach
                                </select>
                                @else
                                    <span class="alert alert-info">NO SCHOOL</span>
                                @endif
                                @if ($errors->has('school_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('school_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <!-- department -->
                    <div class="form-group row">
                            <label for="department_id" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
                            <div class="col-md-6"> 
                            @if(count($departments)>0)                               
                                <select class="form-control{{ $errors->has('department_id') ? ' is-invalid' : '' }}" name="department_id" id="sel1">
                                    <option value="{{$student->department_id}}" selected >{{$dept->get_department($student->department_id)->department_name}}</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                                    @endforeach
                                </select>
                                @else
                                <span class="alert alert-info">NO DEPARTMENTS</span>
                                @endif
                                @if ($errors->has('department_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <!-- course id -->
                    <div class="form-group row">
                            <label for="course_id" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>
                            <div class="col-md-6">  
                            @if(count($courses)>0)                              
                                <select class="form-control{{ $errors->has('course_id') ? ' is-invalid' : '' }}" name="course_id" id="sel1">
                                    <option  value="{{$student->course_id}}" selected >{{$dept->get_course($student->course_id)->course_name}}</option>
                                   @foreach($courses as $course)
                                    <option value="{{$course->course_id}}">{{$course->course_name}}</option>
                                    @endforeach
                                </select>
                                @else
                                <span class="alert alert-info">NO COURSE</span>
                                @endif
                                @if ($errors->has('course_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <!-- email -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('$student->email',$student->email) }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   <span class="glyphicon glyphicon-refresh"></span> {{ __('UPDATE STUDENT') }}
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