@extends('layouts.app')


@section('title','Income Statement Report')

@section('content')
    <style>
        td {
            padding: 4px;
        }
    </style>
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
                <br><br>
                <img src="{{asset('asset/images/new.png')}}" style="margin-left: 21.5%; margin-top: -3%"><br>
                <center><h1 style="margin: 0;padding: 0">Income Statement Report</h1></center>
                <hr style="border: 1px solid black">
                <span id="date"><b style="color:black">Income Statement for the Year Ended as at: <span style="color: red">31 June {{date('Y')}}</span></b></span>

                {{--<hr id="1" style="position: absolute;width: 9%;top: 35%;left: 91%;color: black;">--}}
                {{--<hr id="2" style="position: absolute;width: 9%;top: 55%;left: 71%;color: black;">--}}
                {{--<hr id="3" style="position: absolute;width: 9%;top: 60%;left: 90%;color: black;">--}}
                {{--<hr id="4" style="position: absolute;width: 9%;top: 66%;left: 90%;color: black;">--}}
                {{--<hr id="5" style="position: absolute;width: 9%;top: 49%;left: 71%;color: black;">--}}

                <table style="width: 100%;border-collapse: collapse">
                    <tr>
                        <td><b>Revenue/Sales</b></td>
                        <td colspan="3">
                        </td>
                        <td align="right"><b style="color: red">..............</b></td>
                    </tr>
                    <tr>
                        <td><b>Sales Returns</b></td>
                        <td colspan="3">
                        </td>
                        <td align="right"><b style="color: red">..............</b></td>
                    </tr>
                    <tr>
                        <td>
                            <b>Net Sales</b>
                        </td>
                        <td colspan="3"></td>
                        <td align="right"><b style="color: red">..............</b></td>

                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5"><b>Cost of Sales:</b></td>
                    </tr>
                    <tr>
                        <td width="30%"><b>Opening Inventory</b></td>
                        <td colspan="2"></td>
                        <td align="right"><b style="color: red">..............</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Purchases</b></td>
                        <td></td>
                        <td align="right"><b style="color: red">..............</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Purchases Returns</b></td>
                        <td></td>
                        <td align="right"><b style="color: red">..............</b></td>
                        <td  align="right"><b style="color: red">..............</b></td>
                        <td></td>
                    </tr>
                    <tr>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td  align="right"><b style="color: red">..............</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Carriage Inward</b></td>
                        <td></td>
                        <td></td>
                        <td align="right"><b style="color: red">..............</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Goods available for Sales</b></td>
                        <td></td>
                        <td></td>
                        <td align="right"><b style="color: red">..............</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Ending Inventory</b></td>
                        <td></td>
                        <td></td>
                        <td align="right"><b style="color: red">..............</b></td>
                        <td align="right"><b style="color: red">..............</b></td>
                    </tr>
                    <tr>
                        <td><b>Gross Profit</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="right"><b style="color: red">..............</b></td>
                    </tr>
                    <tr>
                        <td><b>Indirect Income</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="right"><b style="color: red">..............</b></td>
                    </tr>
                    <tr>
                        <td><b>Total Revenue</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="right"><b style="color: red">..............</b></td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>Expenses:</b></td>
                    </tr>
                    {{--@foreach($expenses as $expense)--}}
                        <tr>
                            <td><b>Expense Name</b></td>
                            <td></td>
                            <td align="right"><b style="color: red">Expense Values</b></td>
                            <td></td>{{--@endforeach--}}
                            <td align="right"><b style="color: red">Expense Sum</b></td>
                        </tr>

                        <tr>
                            <td><b>Net Income/Profit</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td align="right"><b style="color: red">..............</b></td>
                        </tr>
                </table>

            </div>
        </div>
    </div>
@stop