<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('\App\Http\Controllers')->middleware('auth')->prefix('mali')->as('mali.')->
group(function (){
    Route::get('sale','SaleController@index')->name('sale');
    Route::resource('sales', 'SaleController')->except(["update", "store"]);
    Route::match(['PUT', "POST"], "sale", "SaleController@store")->name("sale.store");

    Route::resource('commodities', 'CommodityController')->except(["update", "store"]);
    Route::match(['PUT', "POST"], "commodity", "CommodityController@store")->name("commodity.store");

    Route::resource('purchases', 'BuyController')->except(["update", "store"]);
    Route::match(['PUT', "POST"], "buy", "BuyController@store")->name("buy.store");

    Route::resource('costs', 'CostController')->except(["update", "store"]);
    Route::match(['PUT', "POST"], "cost", "CostController@store")->name("cost.store");

    Route::resource('cashes', 'CashController')->except(["update", "store"]);
    Route::match(['PUT', "POST"], "cash", "CashController@store")->name("cash.store");



    //API
    Route::post('delete_commodity','CommodityController@delete_commodity');
    Route::post('edit_commodity','CommodityController@edit_commodity');
    Route::post('get_commodity','CommodityController@get_commodity');
    Route::get('select2_get_commodity_id','CommodityController@select2_get_commodity_id')->name('select2_get_commodity_id');

    Route::post('edit_buy','BuyController@edit_buy');
    Route::post('delete_buy','BuyController@delete_buy');
    Route::post('get_available_factors','BuyController@get_available_factors')->name('get_available_factors');
    Route::post('edit_sale','SaleController@edit_sale');
    Route::post('delete_sale','SaleController@delete_sale');
    Route::post('edit_cost','CostController@edit_cost');
    Route::post('delete_cost','CostController@delete_cost');
    Route::post('edit_cash','CashController@edit_cash');
    Route::post('delete_cash','CashController@delete_cash');


});


Route::get('/clear_cache', function () {
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return redirect('/');
});

