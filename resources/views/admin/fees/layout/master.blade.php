@extends('admin.layout.auth')

@section('content')
<div class="container">
        <div class="row">
        <div class="col-sm-2">
        @include('admin.fees.inc.left-nav')
        </div>
        <div class="col-sm-8">
                @yield('left-section')
        </div>
        </div>
</div>
@endsection