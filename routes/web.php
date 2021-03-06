<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Income\IncomeController;
use App\Http\Controllers\Expense\ExpensesController;
use App\Http\Controllers\Report\SalesReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Income\ReportIncomeController;
use App\Http\Controllers\Expense\ReportExpensesController;
use App\Http\Controllers\Report\barChartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', function () {
    return view('home');
})->name('home');



Route::get('/', [DashboardController::class,'index'])->name('dashboard');
// ---------------------------------------register-------------------------------------------------------
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

// ---------------------------------------login-------------------------------------------------------
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);

Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

Route::get('/income', [IncomeController::class,'index'])->name('income');
Route::post('/income', [IncomeController::class, 'store'])->name('recordIncome');

Route::get('/expenses', [ExpensesController::class,'index'])->name('expenses'); //dont forget to change controller name
Route::post('/income', [IncomeController::class, 'store'])->name('recordExpenses');

Route::get('/salesReport', [SalesReportController::class,'index'])->name('salesReport'); //dont forget to change controller name

Route::post('/income/record', [IncomeController::class, 'store'])->name('recordIncome');
Route::post('/expenses/record', [ExpensesController::class, 'store'])->name('recordExpenses');

Route::get('/reportIncome', [ReportIncomeController::class,'index'])->name('reportIncome');
Route::get('/reportExpenses', [ReportExpensesController::class,'index'])->name('reportExpenses');

// ---------------------------------------search-------------------------------------------------------
Route::post('reportIncome', [ReportIncomeController::class,'search'])->name('reportIncome');
Route::post('reportExpenses', [ReportExpensesController::class,'search'])->name('reportExpenses');

// ---------------------------------------delete-------------------------------------------------------
Route::delete('/income{income}', [ReportIncomeController::class, 'destroy'])->name('destroyincome');
Route::delete('/expense{expense}', [ReportExpensesController::class, 'destroy'])->name('destroyexpense');

// ---------------------------------------BarChart-------------------------------------------------------
Route::get('barchart', [SalesReportController::class,'barchart'])->name('barchart');

// ---------------------------------------Pie Chart-------------------------------------------------------
Route::get('/incomeTypePieChart', [ReportIncomeController::class,'incomeTypePieChart'])->name('incomeTypePieChart');
Route::get('/incomeMethodPieChart', [ReportIncomeController::class,'incomeMethodPieChart'])->name('incomeMethodPieChart');

Route::get('/expensesTypePieChart', [ReportExpensesController::class,'expensesTypePieChart'])->name('expensesTypePieChart');
Route::get('/expensesMethodPieChart', [ReportExpensesController::class,'expensesMethodPieChart'])->name('expensesMethodPieChart');