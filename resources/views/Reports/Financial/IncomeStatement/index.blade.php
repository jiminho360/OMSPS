@extends('layouts.app')


@section('title','Income Statement Report')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Income Statement Report</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <a href="{{url('IncomeStatement/download_p')}}" class="btn btn-info btn-sm" ><i class="fa fa-plus-circle"></i> Print
                    </a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

            </div>
        </div>
    </div>
@stop