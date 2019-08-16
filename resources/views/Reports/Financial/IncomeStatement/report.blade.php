<html>
<head>
    <title></title>
    <style>
        td {
            padding: 4px;
        }
        #1{
            position: absolute;
            width: 9%;
            top: 35%;
            left: 91%;
            color: black;
        }
        #2{
            position: absolute;
            width: 9%;
            top: 55%;
            left: 71%;
            color: black;
        }
        #3{
            position: absolute;
            width: 9%;
            top: 60%;
            left: 90%;
            color: black;
        }
        #4{
            position: absolute;
            width: 9%;
            top: 66%;
            left: 90%;
            color: black;
        }
        #5{
            position: absolute;
            width: 9%;
            top: 49%;
            left: 71%;
            color: black;
        }
    </style>

</head>
<body>
<img src="{{asset('asset/images/new.png')}}" style="margin-left: 10%; margin-top: -3%"><br>
<center><h1 style="margin: 0;padding: 0">Income Statement Report</h1></center>
<hr>
<hr id="1">
<hr id="2">
<hr id="3">
<hr id="4">
<hr id="5">

<table style="width: 100%;border-collapse: collapse">
    <tr>
        <td><b>Revenue/Sales</b></td>
        <td colspan="3">
        </td>
        <td align="right"><b style="color: red">{{$total_sales."/="}}</b></td>
    </tr>
    <tr>
        <td><b>Sales Returns</b></td>
        <td colspan="3">
        </td>
        <td align="right"><b style="color: red">{{$total_returns."/="}}</b></td>
    </tr>
    <tr>
        <td>
            <b>Net Sales</b>
        </td>
        <td colspan="3"></td>
        <td align="right"><b style="color: red">{{($net_sales = $total_sales-$total_returns)."/="}}</b></td>

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
        <td align="right"><b style="color: red">{{$opening_inventory."/="}}</b></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Purchases</b></td>
        <td></td>
        <td align="right"><b style="color: red">{{$purchases."/="}}</b></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Purchases Returns</b></td>
        <td></td>
        <td align="right"><b style="color: red">{{$purchaseReturn."/="}}</b></td>
        <td  align="right"><b style="color: red">{{" ".($sumReturn = $purchases-$purchaseReturn)."/="}}</b></td>
        <td></td>
    </tr>
    <tr>

        <td></td>
        <td></td>
        <td></td>
        <td  align="right"><b style="color: red">{{" ".($answer=$opening_inventory + $sumReturn)."/="}}</b></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Carriage Inward</b></td>
        <td></td>
        <td></td>
        <td align="right"><b style="color: red">{{$inward_value."/="}}</b></td>
        <td></td>
    </tr><hr style="width: 9%; margin-left: 90%; margin-bottom: -3%">
    <tr>
        <td><b>Goods available for Sales</b></td>
        <td></td>
        <td></td>
        <td align="right"><b style="color: red">{{($g_available = $answer + $inward_value)."/="}}</b></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Ending Inventory</b></td>
        <td></td>
        <td></td>
        <td align="right"><b style="color: red">{{$ending_inventory."/="}}</b></td>
        <td align="right"><b style="color: red">{{( $available_inv = $g_available - $ending_inventory)."/="}}</b></td>
    </tr>
    <tr>
        <td><b>Gross Profit</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td align="right"><b style="color: red">{{($gross_profit = $net_sales - $available_inv)." /="}}</b></td>
    </tr>
    <tr>
        <td><b>Indirect Income</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td align="right"><b style="color: red">{{$indirect." /="}}</b></td>
    </tr>
    <tr>
        <td><b>Total Revenue</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td align="right"><b style="color: red">{{($net = $gross_profit + $indirect)." /="}}</b></td>
    </tr>
    <tr>
        <td colspan="4"><b>Expenses:</b></td>
    </tr>
    @foreach($expenses as $expense)
        <tr>
            <td><b>{{$expense->Name}}</b></td>
            <td></td>
            <td align="right"><b style="color: red">{{$expense->Value." /="}}</b></td>
            <td></td>@endforeach
            <td align="right"><b style="color: red">{{$expenses_sum." /="}}</b></td>
            {{--$expense->sum('Value')--}}
        </tr>

        <tr>
            <td><b>Net Income/Profit</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td align="right"><b style="color: red">{{$net + $expenses_sum." /="}}</b></td>
        </tr>
</table>

</body>

</html>
