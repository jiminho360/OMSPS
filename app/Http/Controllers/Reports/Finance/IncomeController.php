<?php

namespace App\Http\Controllers\Reports\Finance;

use App\Models\Finance\Carriages;
use App\Models\Finance\expenses;
use App\Models\Finance\indirect_income;
use App\Models\Finance\inventories;
use App\Models\Finance\Purchase;
use App\Models\Finance\sales;
use App\Models\Year;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncomeController extends Controller
{
    public function index()
    {
        return view('Reports.Financial.IncomeStatement.index');
    }


    public function downloadPdf()
    {
        $total_sales = sales::sumSales();

        $total_returns = sales::sumReturns();

        $year_id = Year::where('status', 1)->first()->id;

        $opening_inventory = inventories::where('year_id', $year_id)->first()->opening_value;

        $purchases = Purchase::getPurchase($year_id);

        $purchaseReturn = Purchase::getReturnValue($year_id);

        $inward_value = Carriages::getInward($year_id);

        $ending_inventory = inventories::where('year_id', $year_id)->first()->closing_value;

        $indirect = indirect_income::getValue($year_id);

        $expenses = expenses::all();

        $expenses_sum = expenses::all()->sum('Value');

        $params['total_sales'] = $total_sales;
        $params['total_returns'] = $total_returns;
        $params['opening_inventory'] = $opening_inventory;
        $params['purchases'] = $purchases;
        $params['purchaseReturn'] = $purchaseReturn;
        $params['inward_value'] = $inward_value;
        $params['ending_inventory'] = $ending_inventory;
        $params['indirect'] = $indirect;
        $params['expenses'] = $expenses;

        PDF::setOptions(
            [
                'defaultPaperSize' => 'a4',
                'dpi' => 150,
                'defaultFont' => 'sans-serif',
                'isHtml5ParserEnabled' => true
            ]);

        $varDet = "Income Statement Report";

        $pdf = PDF::loadView('Reports.Financial.IncomeStatement.report', $params);
        return $pdf->download($varDet . '.pdf');
    }
}
