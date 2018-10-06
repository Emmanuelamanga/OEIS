@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading text-center h3">REGISTER UNTS</div>
                    <div class="panel-body">
                    @include('inc.messages')
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <h3>Select Units To register</h3>
                            <form method="POST" action="{{ route('storeUnit') }}">
                                @csrf

                                @foreach($units as $unit)
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="unit[]" value="{{$unit->unit_id}}">{{$unit->unit_name}}</label><br>
                                        @if ($errors->has('unit'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('unit') }}</strong>
                                            </span>
                                         @endif
                                    </div>
                                @endforeach

                                <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register Units') }}
                                    </button>
                                </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-1"></div>
                    </div>

                  
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
