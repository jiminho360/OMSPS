<?php

namespace App\Http\Controllers\Reports\Finance;

use App\Models\Finance\capital;
use App\Models\Finance\Carriages;
use App\Models\Finance\current_assets;
use App\Models\Finance\current_liabilities;
use App\Models\Finance\drawing;
use App\Models\Finance\expenses;
use App\Models\Finance\indirect_income;
use App\Models\Finance\inventories;
use App\Models\Finance\non_current_assets;
use App\Models\Finance\Purchase;
use App\Models\Finance\sales;
use App\Models\Year;
use Barryvdh\DomPDF\facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinancialPositionController extends Controller
{
    public function index()
    {
//        $items = Nursery::getReport();
//        $current_year = date('Y');
//        $students = Student::getStudents($current_year);

        return view('Reports.Financial.FinancialPosition.index');
    }

    public function calculateNetSales()
    {
        //calculating net sales
        $year_id = Year::where('status', 1)->first()->id;
        $total_sales = sales::sumSales();
        $total_returns = sales::sumReturns();

        $net_sales = $total_sales - $total_returns;

        $opening_inventory = inventories::where('year_id', $year_id)->first()->opening_value;
        $purchases = Purchase::getPurchase($year_id);
        $purchaseReturn = Purchase::getReturnValue($year_id);

        $sumReturn = $purchases-$purchaseReturn;
        $answer=$opening_inventory + $sumReturn;

        $inward_value = Carriages::getInward($year_id);

        $g_available = $answer + $inward_value;

        $ending_inventory = inventories::where('year_id', $year_id)->first()->closing_value;

        $available_inv = $g_available - $ending_inventory;

        $gross_profit = $net_sales - $available_inv;
        $indirect = indirect_income::getValue($year_id);

        $net = $gross_profit + $indirect;

        $expenses_sum = expenses::all()->sum('Value');

        $net_income = $net - $expenses_sum;

        return $net_income;
    }


    public function downloadPdf()
    {
//        $Non_Current_Assets = non_current_assets::sumAssets();
        $Non_Current_Assets = non_current_assets::all();
        $Non_Current_Assets_sum = non_current_assets::all()->sum('cost');

        $Current_Assets = current_assets::all();
        $Current_Assets_sum = current_assets::all()->sum('value');

        $total_depreciation_value = non_current_assets::sumDepreciation();

        $year_id = Year::where('status', 1)->first()->id;

        $ending_inventory = inventories::where('year_id', $year_id)->first()->closing_value;

        $Current_Liabilities = current_liabilities::all();
        $Current_Liabilities_sum = current_liabilities::all()->sum('value');
        $Capital = capital::where('year_id', $year_id)->sum('value');
        $Drawings = drawing::all()->sum('value');



        $params['Drawings'] = $Drawings;
        $params['Capital'] = $Capital;
        $params['Non_Current_Assets'] = $Non_Current_Assets;
        $params['Non_Current_Assets_sum'] = $Non_Current_Assets_sum;
        $params['Current_Assets'] = $Current_Assets;
        $params['Current_Assets_sum'] = $Current_Assets_sum;
        $params['ending_inventory'] = $ending_inventory;
        $params['Current_Liabilities'] = $Current_Liabilities;
        $params['Current_Liabilities_sum'] = $Current_Liabilities_sum;
        $params['total_depreciation_value'] = $total_depreciation_value;
        $params['net_income'] = $this->calculateNetSales();

        PDF::setOptions(
            [
                'defaultPaperSize' => 'a4',
                'dpi' => 150,
                'defaultFont' => 'sans-serif',
                'isHtml5ParserEnabled' => true
            ]);

        $varDet = "Financial Position Report";

        $pdf = PDF::loadView('Reports.Financial.FinancialPosition.report', $params);
        return $pdf->download($varDet . '.pdf');
    }

}
