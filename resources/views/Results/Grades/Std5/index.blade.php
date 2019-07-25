@extends('layouts.app')


@section('title','Standard 5 Results')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Standard 5 Results</h2>
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
                        <th>Science&Technology</th>
                        <th>Civics&Moral</th>
                        <th>Social Studies</th>
                        <th>Vocational Skills</th>
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
                            <td>{{$item->Science_and_Technology}}</td>
                            <td>{{$item->Civics_and_Moral}}</td>
                            <td>{{$item->Social_Studies}}</td>
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