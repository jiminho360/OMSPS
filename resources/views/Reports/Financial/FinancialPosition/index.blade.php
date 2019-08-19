@extends('layouts.app')


@section('title','Financial Position Report')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Financial Position Report</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <a href="{{url('FinancialPosition/download_p')}}" class="btn btn-info btn-sm" ><i class="fa fa-plus-circle"></i> Print
                    </a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    <style>
                        td {
                            padding: 4px;
                        }

                        #1 {
                            color: black;
                            width: 50%;
                            margin:0 1% 0 50%;
                        }

                        #2 {
                            color: red;
                            width: 100%;
                            margin:0 0 0 0;
                        }
                        /*
                                  #3 {
                                      color: black;
                                      width: 9%;
                                      position: absolute;
                                      top: 71.5%;
                                      left: 90%;
                                  }

                                  #4 {
                                      color: black;
                                      width: 9%;
                                      position: absolute;
                                      top: 81.5%;
                                      left: 90%;
                                  }

                                  #5 {
                                      color: black;
                                      width: 9%;
                                      position: absolute;
                                      top: 88%;
                                      left: 90%;
                                  }

                                  #6 {
                                      color: black;
                                      width: 9%;
                                      position: absolute;
                                      top: 90.5%;
                                      left: 90%;
                                  }*/
                        #date {
                            margin-top: 70%;
                        }
                    </style>
                <img src="{{asset('asset/images/new.png')}}" style="margin-left: 21.5%; margin-top:0"><br>
                <center><h1 style="margin: 0;padding: 0">Financial Position Report</h1></center>
                <hr id="2">
                <span id="date"><b style="color:black">Statement of Financial Position as at: <span style="color: red">31 June {{date('Y')}}</span></b></span>

                <table style="width: 100%;border-collapse: collapse; margin-top:0.2%">
                    <tr>
                        <td><b style="color:black">Assets:</b></td>
                    </tr>
                    <tr>
                        <td><b style="color:red">Non Current Assets:</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                        <tr>
                            <td>Non Current Asset Name</td>
                            <td></td>
                            <td align="right"><b style="color: red">Non Current Asset Value</b></td>
                            <td></td>
                            <td align="right"><b
                                        style="color: red">Sum of Non Current Assets</b>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b style="color:red">Current Assets:</b></td>
                            <td></td>
                            <td></td>
                        </tr>
                            <tr>
                                <td>Current_Asset Name</td>
                                <td></td>
                                <td align="right"><b style="color: red">Current_Asset value</b></td>
                                <td></td>
                                {{--<td align="right"><b style="color: red">{{$Current_Assets_sum." /="}}</b></td>--}}
                            </tr>
                            <tr>
                                <td width="30%">Ending Inventory</td>
                                <td colspan="1"></td>
                                <td align="right"><b style="color: red">..............</b></td>
                                <td></td>
                                <td align="right"><b
                                            style="color: red">..............</b></td>
                            </tr>
                            {{--<tr>--}}
                                {{--<td colspan="4"></td>--}}
                                {{--<td>--}}
                                    {{--<hr id="1">--}}
                                {{--</td>--}}
                            {{--</tr>--}}

                            <tr>
                                <td width="30%"><b>Total Assets</b></td>
                                <td colspan="1"></td>
                                <td></td>
                                <td></td>
                                <td align="right"><b style="color: red">..............</b></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b style="color:black">Liabilities:</b></td>
                            </tr>
                            <tr>
                                <td><b style="color:red">Current Liabilities:</b></td>
                                <td></td>
                                <td></td>
                            </tr>
                                <tr>
                                    <td>$Current_Liability Name</td>
                                    <td></td>
                                    <td align="right"><b style="color: red">Current_Liability Value</b></td>
                                    <td></td>
                                        <td align="right"><b style="color: red">Current_Liabilities_sum</b></td>
                                </tr>
                            {{--<tr>--}}
                                {{--<td colspan="4"></td>--}}
                                {{--<td>--}}
                                    {{--<hr id="1">--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            <tr>
                                <td width="30%"><b>Net Assets</b></td>
                                <td colspan="1"></td>
                                <td></td>
                                <td></td>
                                <td align="right"><b style="color: red">..............</b></td>
                                {{--<hr id="3">--}}
                            </tr>
                            {{--<tr>--}}
                                {{--<td colspan="4"></td>--}}
                                {{--<td>--}}
                                    {{--<hr id="1">--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td></td>--}}
                            {{--</tr>--}}
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b style="color:black">Financed By:</b></td>
                            </tr>
                            <tr>
                                <td width="30%">Capital</td>
                                <td colspan="1"></td>
                                <td></td>
                                <td></td>
                                <td align="right"><b style="color: red">..............</b></td>
                            </tr>
                            <tr>
                                <td width="30%">Profit/Net Income</td>
                                <td colspan="1"></td>
                                <td></td>
                                <td></td>
                                <td align="right"><b style="color: red">..............</b></td>
                            </tr>
                            {{--<tr>--}}
                                {{--<td colspan="4"></td>--}}
                                {{--<td>--}}
                                    {{--<hr id="1">--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--{{$new =21858}}--}}
                            <tr>
                                <td width="30%"></td>
                                <td colspan="1"></td>
                                <td></td>
                                <td></td>
                                <td align="right"><b style="color: red">..............</b></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="30%">Drawings</td>
                                <td colspan="1"></td>
                                <td></td>
                                <td></td>
                                <td align="right"><b style="color: red">..............</b></td>
                            </tr>
                            {{--<tr>--}}
                                {{--<td colspan="4"></td>--}}
                                {{--<td>--}}
                                    {{--<hr id="1">--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            <tr>
                                <td width="30%"><b>Net Owners Equity</b></td>
                                <td colspan="1"></td>
                                <td></td>
                                <td></td>
                                <td align="right"><b style="color: red">..............</b></td>
                            </tr>
                            {{--<tr>--}}
                                {{--<td colspan="4"></td>--}}
                                {{--<td>--}}
                                    {{--<hr id="1">--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                </table>

            </div>
        </div>
    </div>
@stop