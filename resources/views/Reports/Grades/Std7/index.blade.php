@extends('layouts.app')


@section('title','Standard 7 Report')

@section('content')


    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Standard 7 Report</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <a href="{{url('Std7/download_p')}}" class="btn btn-info btn-sm" ><i class="fa fa-plus-circle"></i> Print
                    </a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

            </div>
        </div>
    </div>
@stop