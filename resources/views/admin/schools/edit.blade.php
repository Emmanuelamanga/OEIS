@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @include('inc.messages')
            <div class="panel panel-default">
                <div class="panel-heading h2 text-center text-uppercase">Edit school</div>

                <div class="panel-body">
                <form method="POST" action="{{ route('school.update', [$school->id]) }}">
                        @csrf
                        @method('PATCH')

                    <!-- schoo id-->
                        <div class="form-group row">
                            <label for="school_id" class="col-md-4 col-form-label text-md-right">{{ __('School ID') }}</label>
                            <div class="col-md-6">
                                <input id="school_id" type="text" class="form-control{{ $errors->has('school_id') ? ' is-invalid' : '' }}" name="school_id" value="{{ old('$school->school_id',$school->school_id) }}"  autofocus>
                                @if ($errors->has('school_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('school_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <!-- school name -->
                    <div class="form-group row">
                            <label for="school_name" class="col-md-4 col-form-label text-md-right">{{ __('School Name') }}</label>

                            <div class="col-md-6">
                                <input id="school_name" type="text" class="form-control{{ $errors->has('school_name') ? ' is-invalid' : '' }}" name="school_name" value="{{ old('$school->school_name',$school->school_name) }}">

                                @if ($errors->has('school_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('school_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-refresh"></span> {{ __('UPDATE SCHOOL') }}
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