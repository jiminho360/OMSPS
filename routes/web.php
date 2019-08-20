<?php


use Illuminate\Support\Facades\Route;

//
//Route::get('/', function () {
//    return view('login');
//});
//
//Route::get('/','');

//Dashboard
Route::get('Dashboard', 'AuthenticationController@homepage');

//Authentication
Route::get('/', 'AuthenticationController@loginIndex')->name('login');
Route::post('login', 'AuthenticationController@login');
Route::get('logout', 'AuthenticationController@logout');

Route::middleware('auth')->group(function () {
    Route::get('welcome', 'AuthenticationController@homepage');

//Users
    Route::get('users', 'UsersController@index');
    Route::post('users/store', 'UsersController@store');
    Route::get('users/edit/{id}', 'UsersController@edit');
    Route::post('users/update', 'UsersController@update');
    Route::get('users/delete/{id}', 'UsersController@destroy');
//years
    Route::get('years', 'YearsController@index');
    Route::post('years/store', 'YearsController@store');
    Route::get('years/edit/{id}', 'YearsController@edit');
    Route::post('years/update', 'YearsController@update');
    Route::get('years/delete/{id}', 'YearsController@destroy');
    Route::get('years/activate/{id}', 'YearsController@activate');

//Fees
    Route::get('Fees', 'FeeController@index');
    Route::post('Fees/store', 'FeeController@store');
    Route::get('Fees/edit/{id}', 'FeeController@edit');
    Route::post('Fees/update', 'FeeController@update');
    Route::get('Fees/delete/{id}', 'FeeController@destroy');

//UserTypes
    Route::get('UserTypes', 'UserTypesController@index');
    Route::post('UserTypes/store', 'UserTypesController@store');
    Route::get('UserTypes/delete/{id}', 'UserTypesController@destroy');
    Route::get('UserTypes/edit/{id}', 'UserTypesController@edit');

//religions
    Route::get('Religions', 'ReligionsController@index');
    Route::get('Religions/edit/{id}', 'ReligionsController@edit');
    Route::post('Religions/store', 'ReligionsController@store');
    Route::post('Religions/update', 'ReligionsController@update');
    Route::get('Religions/delete/{id}', 'ReligionsController@destroy');

//nationalities
    Route::get('nationalities', 'nationalitiesController@index');
    Route::get('nationalities/edit/{id}', 'nationalitiesController@edit');
    Route::post('nationalities/update', 'nationalitiesController@update');
    Route::get('nationalities/delete/{id}', 'nationalitiesController@destroy');
    Route::post('nationalities/store', 'nationalitiesController@store');

//Students Payment Records
    Route::get('Payment', 'PaymentsController@index');
    Route::post('Payment/store', 'PaymentsController@store');
    Route::get('Payment/edit/{id}', 'PaymentsController@edit');
    Route::post('Payment/update', 'PaymentsController@update');
    Route::get('Payment/delete/{id}', 'PaymentsController@destroy');

//Students
    Route::get('Students', 'StudentsController@index');
    Route::post('Students/store', 'StudentsController@store');
    Route::get('Students/edit/{id}', 'StudentsController@edit');
    Route::post('Students/update', 'StudentsController@update');
    Route::get('Students/delete/{id}', 'StudentsController@destroy');

//Results
    Route::get('Academic', 'ReportController@Academic');
    Route::get('Financial', 'ReportController@Financial');

//Employees
    Route::get('RegEmployee', 'EmployeeController@Index');
    Route::post('Employees/store', 'EmployeeController@store');
    Route::get('Employees/edit/{id}', 'EmployeeController@edit');
    Route::get('Employees/delete/{id}', 'EmployeeController@destroy');
    Route::get('Employees/show/{id}', 'EmployeeController@show');
    Route::post('Employees/update', 'EmployeeController@update');

//Grades/Nursery
    Route::get('Nursery', 'Grades\NurseryController@index');
    Route::post('nursery/store', 'Grades\NurseryController@store');
    Route::get('nursery/edit/{id}', 'Grades\NurseryController@edit');
    Route::post('nursery/update', 'Grades\NurseryController@update');
    Route::get('nursery/delete/{id}', 'Grades\NurseryController@destroy');

//Grades/Std1
    Route::get('Std1', 'Grades\StdOneController@index');
    Route::post('Std1/store', 'Grades\StdOneController@store');
    Route::get('Std1/edit/{id}', 'Grades\StdOneController@edit');
    Route::get('Std1/delete/{id}', 'Grades\StdOneController@destroy');
    Route::post('Std1/update', 'Grades\StdOneController@update');

//Grades/Std2
    Route::get('Std2', 'Grades\StdTwoController@index');
    Route::post('Std2/store', 'Grades\StdTwoController@store');
    Route::get('Std2/edit/{id}', 'Grades\StdTwoController@edit');
    Route::get('Std2/delete/{id}', 'Grades\StdTwoController@destroy');
    Route::post('Std2/update', 'Grades\StdTwoController@update');
//Grades/Std3

    Route::get('Std3', 'Grades\StdThreeController@index');
    Route::post('Std3/store', 'Grades\StdThreeController@store');
    Route::get('Std3/edit/{id}', 'Grades\StdThreeController@edit');
    Route::get('Std3/delete/{id}', 'Grades\StdThreeController@destroy');
    Route::get('Std3/show/{id}', 'Grades\StdThreeController@show');
    Route::post('Std3/update', 'Grades\StdThreeController@update');
//Grades/Std4
    Route::get('Std4', 'Grades\StdFourController@index');
    Route::post('Std4/store', 'Grades\StdFourController@store');
    Route::get('Std4/edit/{id}', 'Grades\StdFourController@edit');
    Route::get('Std4/delete/{id}', 'Grades\StdFourController@destroy');
    Route::get('Std4/show/{id}', 'Grades\StdFourController@show');
    Route::post('Std4/update', 'Grades\StdFourController@update');
//Grades/Std5
    Route::get('Std5', 'Grades\StdFiveController@index');
    Route::post('Std5/store', 'Grades\StdFiveController@store');
    Route::get('Std5/edit/{id}', 'Grades\StdFiveController@edit');
    Route::get('Std5/delete/{id}', 'Grades\StdFiveController@destroy');
    Route::get('Std5/show/{id}', 'Grades\StdFiveController@show');
    Route::post('Std5/update', 'Grades\StdFiveController@update');
//Grades/Std6
    Route::get('Std6', 'Grades\StdSixController@index');
    Route::post('Std6/store', 'Grades\StdSixController@store');
    Route::get('Std6/edit/{id}', 'Grades\StdSixController@edit');
    Route::get('Std6/delete/{id}', 'Grades\StdSixController@destroy');
    Route::get('Std6/show/{id}', 'Grades\StdSixController@show');
    Route::post('Std6/update', 'Grades\StdSixController@update');
//Grades/Std7
    Route::get('Std7', 'Grades\StdSevenController@index');
    Route::post('Std7/store', 'Grades\StdSevenController@store');
    Route::get('Std7/edit/{id}', 'Grades\StdSevenController@edit');
    Route::get('Std7/delete/{id}', 'Grades\StdSevenController@destroy');
    Route::get('Std7/show/{id}', 'Grades\StdSevenController@show');
    Route::post('Std7/update', 'Grades\StdSevenController@update');

//=========================Reports PDF Printing=======================
    Route::post('nursery/download_p', 'Reports\Grades\NurseryController@downloadPdf');
    Route::post('Std1/download_p', 'Reports\Grades\StdOneController@downloadPdf');
    Route::post('Std2/download_p', 'Reports\Grades\StdTwoController@downloadPdf');
    Route::post('Std3/download_p', 'Reports\Grades\StdThreeController@downloadPdf');
    Route::post('Std4/download_p', 'Reports\Grades\StdFourController@downloadPdf');
    Route::post('Std5/download_p', 'Reports\Grades\StdFiveController@downloadPdf');
    Route::post('Std6/download_p', 'Reports\Grades\StdSixController@downloadPdf');
    Route::post('Std7/download_p', 'Reports\Grades\StdSevenController@downloadPdf');

    Route::get('IncomeStatement', 'Reports\Finance\IncomeController@index');
    Route::get('IncomeStatement/download_p', 'Reports\Finance\IncomeController@downloadPdf');

    Route::get('FinancialPosition', 'Reports\Finance\FinancialPositionController@index');
    Route::get('FinancialPosition/download_p', 'Reports\Finance\FinancialPositionController@downloadPdf');
//=========================Results====================================
    Route::get('rslt-nursery', 'Results\Grades\NurseryController@index');
    Route::get('rslt-std_one', 'Results\Grades\StdOneController@index');
    Route::get('rslt-std_two', 'Results\Grades\StdTwoController@index');
    Route::get('rslt-std_three', 'Results\Grades\StdThreeController@index');
    Route::get('rslt-std_four', 'Results\Grades\StdFourController@index');
    Route::get('rslt-std_five', 'Results\Grades\StdFiveController@index');
    Route::get('rslt-std_six', 'Results\Grades\StdSixController@index');
    Route::get('rslt-std_seven', 'Results\Grades\StdSevenController@index');

//========================= Academic Reports =========================
    Route::get('rpt-nursery', 'Reports\Grades\NurseryController@index');
    Route::get('rpt-std_one', 'Reports\Grades\StdOneController@index');
    Route::get('rpt-std_two', 'Reports\Grades\StdTwoController@index');
    Route::get('rpt-std_three', 'Reports\Grades\StdThreeController@index');
    Route::get('rpt-std_four', 'Reports\Grades\StdFourController@index');
    Route::get('rpt-std_five', 'Reports\Grades\StdFiveController@index');
    Route::get('rpt-std_six', 'Reports\Grades\StdSixController@index');
    Route::get('rpt-std_seven', 'Reports\Grades\StdSevenController@index');

//=============================Finance===============================================
    Route::get('Capital', 'Finance\CapitalController@index');
    Route::post('Capital/store', 'Finance\CapitalController@store');
    Route::get('Capital/edit/{id}', 'Finance\CapitalController@edit');
    Route::post('Capital/update', 'Finance\CapitalController@update');
    Route::get('Capital/delete/{id}', 'Finance\CapitalController@destroy');

    Route::get('Carriages', 'Finance\CarriagesController@index');
    Route::post('Carriages/store', 'Finance\CarriagesController@store');
    Route::get('Carriages/edit/{id}', 'Finance\CarriagesController@edit');
    Route::post('Carriages/update', 'Finance\CarriagesController@update');
    Route::get('Carriages/delete/{id}', 'Finance\CarriagesController@destroy');


    Route::get('CurrentAssets', 'Finance\CurrentAssetsController@index');
    Route::post('CurrentAssets/store', 'Finance\CurrentAssetsController@store');
    Route::get('CurrentAssets/edit/{id}', 'Finance\CurrentAssetsController@edit');
    Route::post('CurrentAssets/update', 'Finance\CurrentAssetsController@update');
    Route::get('CurrentAssets/delete/{id}', 'Finance\CurrentAssetsController@destroy');

    Route::get('CurrentLiabilities', 'Finance\CurrentLiabilitiesController@index');
    Route::post('CurrentLiabilities/store', 'Finance\CurrentLiabilitiesController@store');
    Route::get('CurrentLiabilities/edit/{id}', 'Finance\CurrentLiabilitiesController@edit');
    Route::post('CurrentLiabilities/update', 'Finance\CurrentLiabilitiesController@update');
    Route::get('CurrentLiabilities/delete/{id}', 'Finance\CurrentLiabilitiesController@destroy');


    Route::get('Drawings', 'Finance\DrawingsController@index');
    Route::post('Drawings/store', 'Finance\DrawingsController@store');
    Route::get('Drawings/edit/{id}', 'Finance\DrawingsController@edit');
    Route::post('Drawings/update', 'Finance\DrawingsController@update');
    Route::get('Drawings/delete/{id}', 'Finance\DrawingsController@destroy');


    Route::get('Equity', 'Finance\EquityController@index');
    Route::post('Equity/store', 'Finance\EquityController@store');
    Route::get('Equity/edit/{id}', 'Finance\EquityController@edit');
    Route::post('Equity/update', 'Finance\EquityController@update');
    Route::get('Equity/delete/{id}', 'Finance\EquityController@destroy');


    Route::get('Expenses', 'Finance\ExpensesController@index');
    Route::post('Expenses/store', 'Finance\ExpensesController@store');
    Route::get('Expenses/edit/{id}', 'Finance\ExpensesController@edit');
    Route::post('Expenses/update', 'Finance\ExpensesController@update');
    Route::get('Expenses/delete/{id}', 'Finance\ExpensesController@destroy');


    Route::get('IndirectIncome', 'Finance\IndirectIncomeController@index');
    Route::post('IndirectIncome/store', 'Finance\IndirectIncomeController@store');
    Route::get('IndirectIncome/edit/{id}', 'Finance\IndirectIncomeController@edit');
    Route::post('IndirectIncome/update', 'Finance\IndirectIncomeController@update');
    Route::get('IndirectIncome/delete/{id}', 'Finance\IndirectIncomeController@destroy');


    Route::get('Inventories', 'Finance\InventoriesController@index');
    Route::post('Inventories/store', 'Finance\InventoriesController@store');
    Route::get('Inventories/edit/{id}', 'Finance\InventoriesController@edit');
    Route::post('Inventories/update', 'Finance\InventoriesController@update');
    Route::get('Inventories/delete/{id}', 'Finance\InventoriesController@destroy');


    Route::get('NoncurrentAssets', 'Finance\NonCurrentAssetsController@index');
    Route::post('NonCurrentAsset/store', 'Finance\NonCurrentAssetsController@store');
    Route::get('NonCurrentAsset/edit/{id}', 'Finance\NonCurrentAssetsController@edit');
    Route::post('NonCurrentAsset/update', 'Finance\NonCurrentAssetsController@update');
    Route::get('NonCurrentAsset/delete/{id}', 'Finance\NonCurrentAssetsController@destroy');


    Route::get('NoncurrentLiabilities', 'Finance\NonCurrentLiabilitiesController@index');
    Route::post('NonCurrentLiabilities/store', 'Finance\NonCurrentLiabilitiesController@store');
    Route::get('NonCurrentLiabilities/edit/{id}', 'Finance\NonCurrentLiabilitiesController@edit');
    Route::post('NonCurrentLiabilities/update', 'Finance\NonCurrentLiabilitiesController@update');
    Route::get('NonCurrentLiabilities/delete/{id}', 'Finance\NonCurrentLiabilitiesController@destroy');


    Route::get('Purchases', 'Finance\PurchasesController@index');
    Route::post('Purchases/store', 'Finance\PurchasesController@store');
    Route::get('Purchases/edit/{id}', 'Finance\PurchasesController@edit');
    Route::post('Purchases/update', 'Finance\PurchasesController@update');
    Route::get('Purchases/delete/{id}', 'Finance\PurchasesController@destroy');


    Route::get('Sales', 'Finance\SalesController@index');
    Route::post('Sales/store', 'Finance\SalesController@store');
    Route::get('Sales/edit/{id}', 'Finance\SalesController@edit');
    Route::post('Sales/update', 'Finance\SalesController@update');
    Route::get('Sales/delete/{id}', 'Finance\SalesController@destroy');

//=====================================================================
//ajax
    Route::get('grades/ajax/', 'Grades\NurseryController@getMarks');
    Route::get('grades/ajax/1', 'Grades\StdOneController@getMarks');
    Route::get('grades/ajax/2', 'Grades\StdTwoController@getMarks');
    Route::get('grades/ajax/3', 'Grades\StdThreeController@getMarks');
    Route::get('grades/ajax/4', 'Grades\StdFourController@getMarks');
    Route::get('grades/ajax/5', 'Grades\StdFiveController@getMarks');
    Route::get('grades/ajax/6', 'Grades\StdSixController@getMarks');
    Route::get('grades/ajax/7', 'Grades\StdSevenController@getMarks');

});