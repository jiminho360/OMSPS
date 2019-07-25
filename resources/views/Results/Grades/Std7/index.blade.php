@extends('layouts.app')


@section('title','Standard 7 Results')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Standard 7 Results</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Student Name</th>
                        <th>Mathematics</th>
                        <th>English</th>
                        <th>Kiswahili</th>
                        <th>Science</th>
                        <th>ICT</th>
                        <th>PDS</th>
                        <th>History</th>
                        <th>Geography</th>
                        <th>Civics</th>
                        <th>Vocational_Skills</th>
                        <th>Average</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td class="desc_name">{{$item->student->first_name." ".$item->student->last_name}}</td>
                            <td>{{$item->Mathematics}}</td>
                            <td>{{$item->English}}</td>
                            <td>{{$item->Kiswahili}}</td>
                            <td>{{$item->Science}}</td>
                            <td>{{$item->ICT}}</td>
                            <td>{{$item->PDS}}</td>
                            <td>{{$item->History}}</td>
                            <td>{{$item->Geography}}</td>
                            <td>{{$item->Civics}}</td>
                            <td>{{$item->Vocational_Skills}}</td>
                            <td>{{$item->average}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop