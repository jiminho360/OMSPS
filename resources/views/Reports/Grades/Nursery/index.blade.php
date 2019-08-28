@extends('layouts.app')


@section('title','Nursery Report')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Nursery Report</h2>
                <ul class="nav navbar-right panel_toolbox">
                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('academic_teacher')
                    || \Illuminate\Support\Facades\Auth::user()->hasRole('manager')
                    || \Illuminate\Support\Facades\Auth::user()->hasRole('admin')
                    || \Illuminate\Support\Facades\Auth::user()->hasRole('head_teacher')
                    )
                    <form action="{{url('nursery/download_p')}}" method="post">
                        @csrf
                        <div class="row" style="width: 100%">
                            <div class="col-md-8">
                                <label for="student_id" class="control-label">Pupil Name:</label>
                                <select class="form-control" id="student_id" name="student_id" required
                                        style="width: 100%">
                                    <option value="">Choose the name here! </option>
                                    @foreach($students as $student)
                                        <option
                                            value="{{$student->id}}">{{$student->first_name." ".$student->last_name." ".$student->surname}}</option>
                                    @endforeach
                                </select>


                            </div>
                            <div class="col-md-4" style="margin-top:8%">
                                <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-plus-circle" ></i> Print
                                </button>
                            </div>
                        </div>
                    </form>
                        @endif
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <style>
                    td {
                        padding: 4px;
                    }
                    .centered{
                        text-align: center;
                    }
                </style>

                <img src="{{asset('asset/images/new.png')}}" style="margin-left: 22%; margin-top: 10px">

                <table style="width: 100%;border-collapse: collapse" border="1">
                    <tr>
                        <td>Type of Examination: <span style="color: red; font-weight: bolder">MID TERM EXAMINATION</span></td>
                        <td>Month & Year: <span style="color: red; font-weight: bolder">{{date('M Y')}}</span></td>
                    </tr>
                    <tr>
                        <td>Pupils Full Name: <span>.................</span></td>
                        <td>Admission Year: .......................</td>                    </tr>
                    <tr>
                        <td>Class: <span style="color: red; font-weight: bolder">Nursery</span></td>
                        <td>Number of Pupils in a class: <span>............</span></td>
                    </tr>
                    <tr>
                        <td>Closing Day (if applicable): .......................</td>
                        <td>Opening Day (if applicable): .......................</td>
                    </tr>

                </table
                ><br><br>

                <table style="width:99.8%; border-collapse:collapse; margin-top:-5%" border="1" id="table">
                    <tr>
                        <th>S/N</th>
                        <th>ITEM</th>
                        <th>Mathematics</th>
                        <th>Reading&Writing</th>
                        <th>English</th>
                        <th>Art&Craft</th>
                        <th>AGGREGATE</th>
                        <th>AVERAGE</th>
                    </tr>
                    <tr>
                        <td><b>1</b></td>
                        <td><b>Subject top score %</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>2</b></td>
                        <td><b>Class average</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>3</b></td>
                        <td><b>Pupil's score</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <br/><br/>
                    <tr>
                        <td><b>4</b></td>
                        <td colspan="7"><strong>Pupil's class position (Nafasi aliyoshika darasani): </strong><span>...........</span><strong>Class
                                roster (Wanafunzi darasani):  <span>............</span></strong>
                        </td>

                    </tr>
                    <tr>
                        <td><b>5</b></td>
                        <td colspan="7"><strong>Class teacher's comments (Maelezo ya mwalimu wa darasa):</strong>
                            ................................................................................................................................................................................
                            ................................................................................................................................................................................

                            <br>
                            <b>Name:</b> .....................................................<b>Signature:</b>
                            .............................................. <b>Date:</b> ..................................
                        </td>

                    </tr>
                    <tr>
                        <td><b>6</b></td>
                        <td colspan="7"><strong>Headteacher's comments (Maelezo ya Mwalimu Mkuu):</strong>
                            ................................................................................................................................................................................
                            ................................................................................................................................................................................
                            <br>
                            <b>Name:</b> .....................................................<b>Signature:</b>
                            .............................................. <b>Date:</b> ..................................
                        </td>

                    </tr>
                    <tr>
                        <td><b>7</b></td>
                        <td colspan="7"><strong>Parent's acknowledgement and comments (Maelezo ya mzazi):</strong>
                            ................................................................................................................................................................................
                            ................................................................................................................................................................................
                            <br>
                            <b>Name:</b> .....................................................<b>Signature:</b>
                            .............................................. <b>Date:</b> ..................................
                        </td>

                    </tr>


                </table>

            </div>
        </div>
    </div>
@stop
