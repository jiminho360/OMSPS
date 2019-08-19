<html>
<head>
    <title></title>
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

</head>
<body>
<img src="{{asset('asset/images/logo.png')}}" style="margin-left: 22.5%; margin-top:-5%"><br>
<center><h1 style="margin: 0;padding: 0">Financial Position Report</h1></center>
<span id="date"><b style="color:black">Statement of Financial Position as at: <span style="color: red">31 June {{date('Y')}}</span></b></span>
<hr>
<table style="width: 100%;border-collapse: collapse; margin-top:0.2%">
    <tr>
        <td><b style="color:black">ASSETS:</b></td>
    </tr>
    <tr>
        <td><b style="color:red">Non Current Assets:</b></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    @foreach($Non_Current_Assets as $Non_Current_Asset)
        <tr>
            <td>{{$Non_Current_Asset->name}}</td>
            <td></td>
            <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($Non_Current_Asset->cost)." /="}}</b></td>
            <td></td>@endforeach
            <td align="right"><b
                        style="color: red">{{App\Helpers\General::moneyFormat($sum_Non = $Non_Current_Assets_sum - $total_depreciation_value)." /="}}</b>
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

        @foreach($Current_Assets as $Current_Asset)
            <tr>
                <td>{{$Current_Asset->name}}</td>
                <td></td>
                <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($Current_Asset->value)." /="}}</b></td>
                <td></td>@endforeach
                {{--<td align="right"><b style="color: red">{{$Current_Assets_sum." /="}}</b></td>--}}
            </tr>
            <tr>
                <td width="30%">Ending Inventory</td>
                <td colspan="1"></td>
                <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($ending_inventory)." /="}}</b></td>
                <td></td>
                <td align="right"><b
                            style="color: red">{{App\Helpers\General::moneyFormat($sum_Cur = $Current_Assets_sum + $ending_inventory)." /="}}</b></td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td>
                    <hr id="1">
                </td>
            </tr>

            <tr>
                <td width="30%"><b>Total Assets</b></td>
                <td colspan="1"></td>
                <td></td>
                <td></td>
                <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($Total_Asset = $sum_Non + $sum_Cur )." /="}}</b></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td><b style="color:black">LIABILITIES:</b></td>
            </tr>
            <tr>
                <td><b style="color:red">Current Liabilities:</b></td>
                <td></td>
                <td></td>
            </tr>
            @php $countLiability = count($Current_Liabilities)  @endphp
            @foreach($Current_Liabilities as $key=>$Current_Liability)
                <tr>
                    <td>{{$Current_Liability->name}}</td>
                    <td></td>
                    <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($Current_Liability->value)." /="}}</b></td>
                    <td></td>
                    @if(($countLiability - $key)==1)
                        <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($Current_Liabilities_sum)." /="}}</b></td>
                    @endif
                </tr>
            @endforeach
            <tr>
                <td colspan="4"></td>
                <td>
                    <hr id="1">
                </td>
            </tr>
            <tr>
                <td width="30%"><b>Net Assets</b></td>
                <td colspan="1"></td>
                <td></td>
                <td></td>
                <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($Total_Asset - $Current_Liabilities_sum)." /="}}</b></td>
                {{--<hr id="3">--}}
            </tr>
            <tr>
                <td colspan="4"></td>
                <td>
                    <hr id="1">
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td><b style="color:black">FINANCED BY:</b></td>
            </tr>
            <tr>
                <td width="30%">Capital</td>
                <td colspan="1"></td>
                <td></td>
                <td></td>
                <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($Capital)." /="}}</b></td>
            </tr>
            <tr>
                <td width="30%">Profit/Net Income</td>
                <td colspan="1"></td>
                <td></td>
                <td></td>
                <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($net_income)." /="}}</b></td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td>
                    <hr id="1">
                </td>
            </tr>
            {{--{{$new =21858}}--}}
            <tr>
                <td width="30%"></td>
                <td colspan="1"></td>
                <td></td>
                <td></td>
                <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($Capital + $net_income)." /="}}</b></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td width="30%">Drawings</td>
                <td colspan="1"></td>
                <td></td>
                <td></td>
                <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($Drawings)." /="}}</b></td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td>
                    <hr id="1">
                </td>
            </tr>
            <tr>
                <td width="30%"><b>Net Owners Equity</b></td>
                <td colspan="1"></td>
                <td></td>
                <td></td>
                <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($Total_Asset - $Current_Liabilities_sum)." /="}}</b></td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td>
                    <hr id="1">
                </td>
            </tr>
</table>

</body>

</html>
