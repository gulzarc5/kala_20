<?php

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

require __DIR__.'/admin.php';
Route::group(['namespace' => 'User'],function(){
    Route::get('/','LoginController@showLoginForm')->name('user.login_form');    
    Route::post('login', 'LoginController@Login')->name('user.login');    
    Route::post('logout', 'LoginController@logout')->name('user.logout');

    Route::group(['middleware'=>'auth:user','prefix'=>'user'],function(){
        Route::get('/dashboard', 'DashboardController@index')->name('user.deshboard');
        Route::post('/category/price/fetch', 'TicketController@priceFetch')->name('user.ticket_price_fetch');

        Route::post('temp/ticket', 'DashboardController@tempTicket')->name('user.temp_ticket');
        Route::get('temp/ticket/{id}', 'DashboardController@tempTicketRemove')->name('user.temp_ticket_remove');

        Route::get('ticket/book','TicketController@ticketBook')->name('user.ticket_book');
        
        Route::get('ticket/print/{ticket_id}/{page?}', 'TicketController@ticketPrint')->name('user.ticket_print');
        Route::get('ticket/re/print/{ticket_id}/{page}', 'TicketController@ticketRePrint')->name('user.ticket_re_print');

        Route::get('today/ticket/list/', 'ReportController@todayTicketList')->name('user.today_ticket_list');
        Route::get('ticket/view/{ticket_id}', 'TicketController@ticketView')->name('user.ticket_view');

        Route::get('day/report/view/', 'ReportController@dayReportView')->name('user.day_report_view');
        Route::get('day/report/print/', 'ReportController@dayReportPrint')->name('user.day_report_print');

        Route::get('total/', 'ReportController@totalDayReportView')->name('user.total_day_report_view');

        Route::post('total/report/search', 'ReportController@totalReportSearch')->name('user.total_report_search');

        Route::get('day/report/print/all/{page}/{s_date?}/{e_date?}', 'ReportController@totalReportPrint')->name('user.total_report_print');
    });
});