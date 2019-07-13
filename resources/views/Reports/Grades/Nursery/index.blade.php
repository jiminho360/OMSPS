@extends('layouts.app')


@section('title','Nursery Report')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Nursery Report</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <form action="{{url('nursery/download_p')}}" method="post">
                        @csrf
                        <div class="row" style="width: 100%">
                            <div class="col-md-8">
                                <label for="student_id" class="control-label">Student</label>
                                <select class="form-control" id="student_id" name="student_id" required
                                        style="width: 100%">
                                    <option value="">----</option>
                                    @foreach($students as $student)
                                        <option
                                            value="{{$student->id}}">{{$student->first_name." ".$student->last_name." ".$student->surname}}</option>
                                    @endforeach
                                </select>
                            </div> <div class="col-md-4">
                                <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-plus-circle"></i> Print
                                </button>
                            </div>
                        </div>
                    </form>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

            </div>
        </div>
    </div>
@stop
