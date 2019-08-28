@extends('layouts.app')


@section('title','Nursery Results')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Nursery Results</h2>
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
                        <th>Reading&Writing</th>
                        <th>English</th>
                        <th>Art&Craft</th>
                        <th>Average</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $key=>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td class="desc_name">{{$item->student->first_name." ".$item->student->last_name}}</td>
                            <td>{{$item->mathematics}}</td>
                            <td>{{$item->reading_and_writing}}</td>
                            <td>{{$item->english}}</td>
                            <td>{{$item->art_and_craft}}</td>
                            <td style="color: red">{{round($item->average)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
