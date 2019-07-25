@extends('layouts.app')


@section('title','Dashboard')

@section('content')

        <!-- page content -->
        <div class="" role="main">

            <div>
                <div class="row">
                        <div class="x_panel">
                            <img src="{{asset('asset/images/new.png')}}" style="margin-left: 22%; margin-top: 5px">
                            <div class="x_title">
                            </div>
                            <div class="x_content">
                                <h2 style="margin-left: 24%">Welcome to Click Pre & Primary School</h2>
                                    <br />

                                </div>


                                <div class="col-md-12">
                                    <!-- page content -->
                                    <div class="" role="main">
                                    <!-- top tiles -->
                                    <div class="row tile_count">
                                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Total Nursery</span>
                                    <div class="count">{{$nursery}}</div>
                                    <span class="count_bottom"><i class="green">{{($nursery*100)/$totalStudents."%"}} </i>Of Total Students</span>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i>Total Standard One</span>
                                    <div class="count">{{$Std1}}</div>
                                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{($Std1*100)/$totalStudents."%"}}</i>Of Total Students</span>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Total Standard Two</span>
                                    <div class="count">{{$Std2}}</div>
                                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{($Std2*100)/$totalStudents."%"}}</i>Of Total Students</span>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i> Total Standard Three</span>
                                    <div class="count">{{$Std3}}</div>
                                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{($Std3*100)/$totalStudents."%"}}</i>Of Total Students</span>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i>Total Standard Four</span>
                                    <div class="count">{{$Std4}}</div>
                                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{($Std4*100)/$totalStudents."%"}}</i>Of Total Students</span>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                                    <span class="count_top"><i class="fa fa-user"></i>Total Standard Five</span>
                                    <div class="count">{{$Std5}}</div>
                                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{($Std5*100)/$totalStudents."%"}}</i>Of Total Students</span>
                                    </div>
                                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                                            <span class="count_top"><i class="fa fa-user"></i>Total Standard Six</span>
                                            <div class="count">{{$Std6}}</div>
                                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{($Std6*100)/$totalStudents."%"}}</i>Of Total Students</span>
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                                            <span class="count_top"><i class="fa fa-user"></i>Total Standard Seven</span>
                                            <div class="count">{{$Std7}}</div>
                                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>{{($Std7*100)/$totalStudents."%"}}</i>Of Total Students</span>
                                        </div>
                                    </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
        <!-- /page content -->

@endsection