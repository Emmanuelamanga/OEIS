@extends('admin.fees.layout.master')

@section('left-section')
 @include('inc.messages')
    @if(count($students))
        <table class="table table-bordered table-sm table-condensed">
           <tr><th colspan="5" class="text-center">Select student</th></tr> 
           <tr>
            <th>Admission Number</th>
                <th>Name</th>
                <th>fee</th>
                <th>Balance</th>
                <th>update</th>
           </tr> 
            <tbody>
            @foreach($students as $student)
                    <tr>
                        <td>{{$student->reg_no}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->fee}}</td>
                        <td>
                        @if(($student->fee > 20000))
                        {{__(20000 - $student->fee )}} 
                            <span class="text-success"><i>overpayment</i></span>
                        @elseif((20000 > $student->fee))
                            {{"Ksh ".__(20000 - $student->fee )}} 
                            <span class="text-danger"><i>underpayment</i></span>
                                
                        @endif 
                        </td>
                        <td><a href="{{route('fee.show', [$student->id])}}" class="btn btn-info">update</a> </td>
                    </tr>
            @endforeach       
            </tbody>
        </table>
    @else
    <span class="alert alert-info">NO Students</span>
    @endif
@endsection