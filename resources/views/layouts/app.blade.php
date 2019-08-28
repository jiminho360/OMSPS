<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title> OMSPS | @yield('title')</title>


    <!-- Bootstrap -->
    <link href="{{asset('asset/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('asset/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- DataTable -->
    <link href="{{asset('asset/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('asset/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <!-- Site Theme Style -->
    <link href="{{asset('asset/build/css/site.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('asset/build/css/custom.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('asset/build/css/datepicker.css')}}" type="text/css">
    <!-- Sweet Alert CSS -->
    <link href="{{asset('asset/sweetAlert/sweetalert.css')}}" rel="stylesheet">
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{asset('asset/vendors/select2/dist/css/select2.css')}}">
    <!-- Page Specific CSS -->
    @yield('Styles')

</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{url('Dashboard')}}" class="site_title"><i class="fa fa-graduation-cap"></i>
                        <span>OMSPS</span></a>
                </div>
                <div class="clearfix"></div>
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{asset('asset/images/user.png')}}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{Auth::user()->first_name." ".Auth::user()->surname}}</h2>
                        <span>{{" ".Auth::user()->usertype->name}}</span>

                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br/>
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="{{url('Dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin')
                                || \Illuminate\Support\Facades\Auth::user()->hasRole('manager'))
                                <li><a><i class="fa fa-group"></i>Employees<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{url('RegEmployee')}}">Register Employee</a></li>
                                    </ul>
                                </li>
                            @endif
                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('head_teacher')
                            || \Illuminate\Support\Facades\Auth::user()->hasRole('admin')
                            || \Illuminate\Support\Facades\Auth::user()->hasRole('manager')
                            || \Illuminate\Support\Facades\Auth::user()->hasRole('academic_teacher')
                            || \Illuminate\Support\Facades\Auth::user()->hasRole('cashier'))
                                <li><a><i class="fa fa-graduation-cap"></i> Pupils <span
                                                class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{url('Students')}}">Register Pupils</a></li>
                                        <li><a href="{{url('Payment')}}">Pupils Payment Records</a></li>
                                    </ul>
                                </li>
                            @endif
                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('head_teacher')
                           || \Illuminate\Support\Facades\Auth::user()->hasRole('admin')
                           || \Illuminate\Support\Facades\Auth::user()->hasRole('manager')
                            || \Illuminate\Support\Facades\Auth::user()->hasRole('academic_teacher')

                           )
                                <li><a><i class="fa fa-star"></i>Pupils Marks<span
                                                class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{url('Nursery')}}">Nursery</a></li>
                                        <li><a href="{{url('Std1')}}">Standard 1</a></li>
                                        <li><a href="{{url('Std2')}}">Standard 2</a></li>
                                        <li><a href="{{url('Std3')}}">Standard 3</a></li>
                                        <li><a href="{{url('Std4')}}">Standard 4</a></li>
                                        <li><a href="{{url('Std5')}}">Standard 5</a></li>
                                        <li><a href="{{url('Std6')}}">Standard 6</a></li>
                                        <li><a href="{{url('Std7')}}">Standard 7</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-folder-open"></i> Results <span
                                                class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{url('rslt-nursery')}}">Nursery</a></li>
                                        <li><a href="{{url('rslt-std_one')}}">Standard I</a></li>
                                        <li><a href="{{url('rslt-std_two')}}">Standard II</a></li>
                                        <li><a href="{{url('rslt-std_three')}}">Standard III</a></li>
                                        <li><a href="{{url('rslt-std_four')}}">Standard IV</a></li>
                                        <li><a href="{{url('rslt-std_five')}}">Standard V</a></li>
                                        <li><a href="{{url('rslt-std_six')}}">Standard VI</a></li>
                                        <li><a href="{{url('rslt-std_seven')}}">Standard VII</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-file-archive-o"></i>Academic Reports<span
                                                class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{url('rpt-nursery')}}">Nursery</a></li>
                                        <li><a href="{{url('rpt-std_one')}}">Standard I</a></li>
                                        <li><a href="{{url('rpt-std_two')}}">Standard II</a></li>
                                        <li><a href="{{url('rpt-std_three')}}">Standard III</a></li>
                                        <li><a href="{{url('rpt-std_four')}}">Standard IV</a></li>
                                        <li><a href="{{url('rpt-std_five')}}">Standard V</a></li>
                                        <li><a href="{{url('rpt-std_six')}}">Standard VI</a></li>
                                        <li><a href="{{url('rpt-std_seven')}}">Standard VII</a></li>
                                    </ul>
                                </li>
                            @endif

                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('cashier')
                            || \Illuminate\Support\Facades\Auth::user()->hasRole('admin')
                            || \Illuminate\Support\Facades\Auth::user()->hasRole('manager')

                            )
                                <li><a><i class="fa fa-money"></i> Finance <span
                                                class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{url('Capital')}}">Capitals</a></li>
                                        <li><a href="{{url('Carriages')}}">Carriages</a></li>
                                        <li><a href="{{url('CurrentAssets')}}">Current Assets</a></li>
                                        <li><a href="{{url('CurrentLiabilities')}}">Current Liabilities</a></li>
                                        <li><a href="{{url('Drawings')}}">Drawings</a></li>
                                        <li><a href="{{url('Equity')}}">Equity</a></li>
                                        <li><a href="{{url('Expenses')}}">Expenses</a></li>
                                        <li><a href="{{url('IndirectIncome')}}">Indirect Income</a></li>
                                        <li><a href="{{url('Inventories')}}">Inventories</a></li>
                                        <li><a href="{{url('NoncurrentAssets')}}">NonCurrent Assets</a></li>
                                        <li><a href="{{url('NoncurrentLiabilities')}}">NonCurrent Liabilities</a></li>
                                        <li><a href="{{url('Purchases')}}">Purchases</a></li>
                                        <li><a href="{{url('Sales')}}">Sales</a></li>
                                        <li><a href="{{url('Fees')}}">Fees</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-file-archive-o"></i>Financial Reports<span
                                                class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{url('IncomeStatement')}}">Income Statement Report</a></li>
                                        <li><a href="{{url('FinancialPosition')}}">Financial Position Report</a></li>
                                    </ul>
                                </li>
                            @endif

                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                <div class="menu_section">
                                    <h3>General Settings</h3>
                                    <ul class="nav side-menu">
                                        <li><a><i class="fa fa-cog"></i> Settings <span
                                                        class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{url('users')}}">Users</a></li>
                                                <li><a href="{{url('years')}}">Years</a></li>
                                                <li><a href="{{url('Religions')}}">Religions</a></li>
                                                <li><a href="{{url('nationalities')}}">Nationalities</a></li>
                                                <li><a href="{{url('UserTypes')}}">User Types</a></li>
                                                {{--<li><a href="{{url('UserRole')}}">User Roles</a></li>--}}
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->
                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    {{--<a data-toggle="tooltip" data-placement="top" title="Settings">--}}
                        {{--<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                    {{--<a data-toggle="tooltip" data-placement="top" title="FullScreen">--}}
                        {{--<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                    {{--<a data-toggle="tooltip" data-placement="top" title="Lock">--}}
                        {{--<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{url('logout')}}">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle" style="color: white"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-left">
                        <span class="pull-left" style="color: white;margin-top: 2.0vh; font-size: 20px">Online Management System For Pre&Primary Schools(OMSPS)</span>
                    </ul>
                    <ul class="nav navbar-nav navbar-left pull-right">
                        <li class=" ">
                            <a style="color: white !important;" href="javascript:;" class="user-profile dropdown-toggle"
                               data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="{{asset('asset/images/user.png')}}"
                                     alt="">{{Auth::user()->first_name." ".Auth::user()->surname}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                {{--<li><a href="javascript:;"> Profile</a></li>--}}
                                {{--<li>--}}
                                {{--<a href="javascript:;">--}}
                                {{--<span class="badge bg-red pull-right">50%</span>--}}
                                {{--<span>Settings</span>--}}
                                {{--</a>--}}
                                {{--</li>--}}
                                <li><a href="{{url('ChangePassword')}}"><i class="fa fa-sign-out pull-right"></i>Change Password</a></li>
                                <li><a href="{{url('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">

            @include('layouts.errors')
            @include('layouts.success')

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @yield('content')
                </div>
            </div>
            <br/>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="{{asset('asset/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('asset/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('asset/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('asset/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('asset/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('asset/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('asset/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('asset/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('asset/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('asset/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('asset/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('asset/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('asset/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('asset/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('asset/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('asset/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('asset/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

<!-- Sweet Alert JS -->
<script src="{{asset('asset/sweetAlert/sweetalert2.min.js')}}"></script>
<!-- Site Theme Scripts -->
<script src="{{asset('asset/build/js/site.min.js')}}"></script>
<!--  Select 2   -->
<script src="{{asset('asset/vendors/select2/dist/js/select2.full.js')}}"></script>
<!-- Date Picker -->
<script src="{{asset('asset/build/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('asset/build/js/custom.js')}}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function clearMsg() {
        $('.msg').hide();
    }

    $(window).load(function () {
        setTimeout(clearMsg, 3000);
    });
</script>


@yield('Scripts')
{{--<!-- footer content --><br><br>--}}
{{--<footer>--}}
{{--<div class="pull-right">--}}
{{--Online School Management System Created by <a href="{{url('Dashboard')}}">OMSPS Project Team</a>--}}
{{--</div>--}}
{{--<div class="clearfix"></div>--}}
{{--</footer>--}}
{{--<!-- /footer content -->--}}
</body>
</html>
