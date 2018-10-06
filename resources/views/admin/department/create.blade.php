@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @include('inc.messages')
            <div class="panel panel-default">
                <div class="panel-heading h2 text-center text-uppercase">Add Department</div>

                <div class="panel-body">
                <form method="POST" action="{{ route('department.store') }}">
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

                    <!-- department id-->
                        <div class="form-group row">
                            <label for="department_id" class="col-md-4 col-form-label text-md-right">{{ __('DEPARTMENT ID') }}</label>
                            <div class="col-md-6">
                                <input id="department_id" type="text" class="form-control{{ $errors->has('department_id') ? ' is-invalid' : '' }}" name="department_id" value="{{ old('department_id') }}"  autofocus>
                                @if ($errors->has('department_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <!-- department name -->
                    <div class="form-group row">
                            <label for="department_name" class="col-md-4 col-form-label text-md-right">{{ __('DEPARTMENT NAME') }}</label>

                            <div class="col-md-6">
                                <input id="department_name" type="text" class="form-control{{ $errors->has('department_name') ? ' is-invalid' : '' }}" name="department_name" value="{{ old('department_name') }}">

                                @if ($errors->has('department_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('department_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  <span class="glyphicon glyphicon-plus"></span>  {{ __('ADD DEPARTMENT') }}
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