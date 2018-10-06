@extends('admin.fees.layout.master')

@section('left-section')
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @include('inc.messages')
            <div class="panel panel-default">
                <div class="panel-heading h2 text-center text-uppercase">Update Fee For <i><b>{{$student->name}}</b> </i></div>

                <div class="panel-body">
                <form method="POST" action="{{ route('fee.update', [$student->id])}}">
                        @csrf
                        @method('PATCH')

                    <!-- schoo id-->
                        <div class="form-group row">
                            <!-- <label for="fee" class="col-md-4 col-form-label text-md-right">{{ __('School ID') }}</label> -->
                            <div class="col-md-2"></div>
                            <div class="col-md-6">
                                <input id="fee" type="text" class="form-control{{ $errors->has('fee') ? ' is-invalid' : '' }}" name="fee" value="{{ old('$student->fee',$student->fee) }}"  autofocus >
                                @if ($errors->has('fee'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fee') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                
                        <div class="form-group row mb-0">
                        <div class="col-md-2"></div>
                            <div class="col-md-8 offset-md-8">
                                <button type="submit" class="btn btn-primary">
                                  <span class="glyphicon glyphicon-refresh"></span>  {{ __('UPDATE FEE') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection