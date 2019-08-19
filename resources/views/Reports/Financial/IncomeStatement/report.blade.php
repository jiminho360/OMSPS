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
            color: black;
            width: 50%;
            margin:0 1% 0 50%;
        }
        #date {
            margin-top: 70%;
            margin-left: 25%;
        }
    </style>

</head>
<body>
<img src="{{asset('asset/images/new.png')}}" style="margin-left: 10%; margin-top: -3%"><br>
<center><h1 style="margin: 0;padding: 0">Income Statement Report</h1></center>
<span id="date"><b style="color:black">Income Statement for the Year Ended as at: <span style="color: red">31 June {{date('Y')}}</span></b></span>
<hr>
<table style="width: 100%;border-collapse: collapse">
    <tr>
        <td><b>Revenue/Sales</b></td>
        <td colspan="3">
        </td>
        <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($total_sales)."/="}}</b></td>
    </tr>
    <tr>
        <td><b>Sales Returns</b></td>
        <td colspan="3">
        </td>
        <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($total_returns)."/="}}</b></td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td>
            <hr id="1">
        </td>
    </tr>
    <tr>
        <td>
            <b>Net Sales</b>
        </td>
        <td colspan="3"></td>
        <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($net_sales = $total_sales-$total_returns)."/="}}</b></td>

    </tr>
    <tr>
        <td></td>
    </tr>
    {{--</table>--}}
    {{--<table style="width: 100%;border-collapse: collapse">--}}
    <tr>
        <td colspan="5"><b>Cost of Sales:</b></td>
    </tr>
    <tr>
        <td width="30%"><b>Opening Inventory</b></td>
        <td colspan="2"></td>
        <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($opening_inventory)."/="}}</b></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Purchases</b></td>
        <td></td>
        <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($purchases)."/="}}</b></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Purchases Returns</b></td>
        <td></td>
        <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($purchaseReturn)."/="}}</b></td>
        <td  align="right"><b style="color: red">{{" ".App\Helpers\General::moneyFormat($sumReturn = $purchases-$purchaseReturn)."/="}}</b></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td>
            <hr id="2">
        </td>
    </tr>
    <tr>

        <td></td>
        <td></td>
        <td></td>
        <td  align="right"><b style="color: red">{{" ".App\Helpers\General::moneyFormat($answer=$opening_inventory + $sumReturn)."/="}}</b></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Carriage Inward</b></td>
        <td></td>
        <td></td>
        <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($inward_value)."/="}}</b></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td>
            <hr id="2">
        </td>
    </tr>
    <tr>
        <td><b>Goods available for Sales</b></td>
        <td></td>
        <td></td>
        <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($g_available = $answer + $inward_value)."/="}}</b></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Ending Inventory</b></td>
        <td></td>
        <td></td>
        <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($ending_inventory)."/="}}</b></td>
        <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat( $available_inv = $g_available - $ending_inventory)."/="}}</b></td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td>
            <hr id="1">
        </td>
    </tr>
    <tr>
        <td><b>Gross Profit</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($gross_profit = $net_sales - $available_inv)." /="}}</b></td>
    </tr>
    <tr>
        <td><b>Indirect Income</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($indirect)." /="}}</b></td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td>
            <hr id="1">
        </td>
    </tr>
    <tr>
        <td><b>Total Revenue</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($net = $gross_profit + $indirect)." /="}}</b></td>
    </tr>
    <tr>
        <td colspan="4"><b>Expenses:</b></td>
    </tr>
    @foreach($expenses as $expense)
        <tr>
            <td><b>{{$expense->Name}}</b></td>
            <td></td>
            <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($expense->Value)." /="}}</b></td>
            <td></td>@endforeach
            <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($expenses_sum)." /="}}</b></td>
            {{--$expense->sum('Value')--}}
        </tr>
        <tr>
            <td colspan="4"></td>
            <td>
                <hr id="1">
            </td>
        </tr>
        <tr>
            <td><b>Net Income/Profit</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td align="right"><b style="color: red">{{App\Helpers\General::moneyFormat($net - $expenses_sum)." /="}}</b></td>
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
