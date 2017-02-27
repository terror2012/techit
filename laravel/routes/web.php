<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::group(['middleware' => 'sys_off'], function(){
    Route::group(['middleware' => 'ban_system'], function() {
        Route::get('/', 'IndexController@index')->name('home');
        Route::get('home', 'IndexController@index');
        Route::get('/about_us', 'AboutUsController@index');
        Route::get('/comments', 'CommentsController@index')->name('comm');
        Route::post('/add_comment', 'CommentsController@addComments');
        Route::post('/add_reply', 'CommentsController@addReply');
        Route::get('/delete_comment/{id}', 'CommentsController@deleteComm');
        Route::get('/delete_reply/{id}', 'CommentsController@deleteReply');
        Route::get('/services', 'ServiceController@index');
        Route::get('/howto', 'HowToController@index');
        Route::post('/howto/submit', 'HowToController@submit');
        Route::get('/contact', 'ContactController@index');
        Route::post('/contact','ContactController@contact');
        Route::get('/account', 'UserPanelController@index')->name('account');
        Route::get('/edit_account_details', 'UserPanelController@edit_user_info');
        Route::get('/how_to_ajax/{id}', 'HowToController@ajaxRespond');
        Route::get('/logout', function(){
            Auth::logout();
            return redirect()->action('IndexController@index');
        });
        Route::get('/schedule', 'ScheduleController@index');
        Route::post('/schedule/submit', 'ScheduleController@query');
        Route::get('/schedule/getDate', 'ScheduleController@getDataAJAX');
        Route::get('/schedule/getTime/{date}', 'ScheduleController@getTimeAJAX');
        Route::get('/schedule/register', 'ScheduleController@regIndex');
        Route::post('/schedule/register', 'ScheduleController@reg');
        Route::post('/schedule/reg_complete', 'ScheduleController@reg_complete');
        Route::post('/schedule/guest_pay', 'ScheduleController@PayAsGuest');
        Route::post('/checkout', 'ScheduleController@checkout');
        Route::get('/remote_connect', 'RemoteConnectController@index');
        Route::get('/thanksyou', 'ScheduleController@thankyou');
        Route::get('/account/invoice/{id}', 'UserPanelController@view_invoice');
        Route::get('/account/delete_invoice/{id}', 'UserPanelController@delete_invoice');
        Route::post('/account/checkout/{id}', 'UserPanelController@checkout');

        Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {
            Route::get('/', 'AdminIndexController@index')->name('admin');
            Route::get('/edit_contact', 'EditContactController@index')->name('contact');
            Route::post('/changePhone', 'EditContactController@changePhone');
            Route::post('/changeEmail', 'EditContactController@changeEmail');
            Route::post('/changeHours', 'EditContactController@changeHours');
            Route::post('/changeDays', 'EditContactController@changeDays');
            Route::get('/service', 'EditServiceController@index')->name('edit_service');
            Route::get('/edit_service/{id}', 'EditServiceController@edit_index');
            Route::get('/delete_service/{id}', 'EditServiceController@delete');
            Route::post('/edit_service/{id}', 'EditServiceController@edit');
            Route::get('/add_service', 'EditServiceController@addIndex');
            Route::post('/add_service', 'EditServiceController@add');
            Route::get('/section', 'SectionController@index')->name('sections');
            Route::get('/edit_section/{id}','SectionController@editIndex');
            Route::post('/edit_section/{id}', 'SectionController@edit');
            Route::get('/activate/{id}', 'SectionController@activate');
            Route::get('/deactivate/{id}', 'SectionController@deactivate');
            Route::get('/delete_section/{id}', 'SectionController@delete');
            Route::get('/add_section', 'SectionController@addIndex');
            Route::post('/add_section', 'SectionController@add');
            Route::get('/about_us', 'AboutUsEditController@index');
            Route::post('/about_us', 'AboutUsEditController@edit');
            Route::get('/clients', 'ClientsController@index')->name('clients');
            Route::get('/message/{id}', 'ClientsController@message');
            Route::post('/message/{id}', 'ClientsController@send');
            Route::get('/view_client/{id}', 'ClientsController@view');
            Route::post('/edit_client/{id}', 'ClientsController@edit');
            Route::get('/ban_client/{id}', 'ClientsController@ban');
            Route::get('/unban_client/{id}', 'ClientsController@unban');
            Route::get('/invoices', 'InvoicesController@index')->name('invoices');
            Route::get('/view_invoice/{id}', 'InvoicesController@view');
            Route::get('/send_reminder/{id}', 'InvoicesController@reminder');
            Route::get('/send_invoice/{id}', 'InvoicesController@send');
            Route::get('/archieve/{id}', 'InvoicesController@archieve');
            Route::get('/appointments/', 'AppointmentsController@index')->name('appointments');
            Route::get('/view_archieve/{id}', 'AppointmentsController@view')->name('appointments');
            Route::get('/schedules', 'EditScheduleController@index')->name('schedule');
            Route::get('/up_invoice/{id}', 'EditScheduleController@up');
            Route::get('/decline/{id}', 'EditScheduleController@decline');
            Route::get('/view_query/{id}', 'EditScheduleController@view');
            Route::get('/content_manager', 'ContentManagerController@index')->name('manager');
            Route::post('/content_settings', 'ContentManagerController@content_settings');
            Route::post('/change_admin_info', 'ContentManagerController@admin_info');
            Route::get('/how_to', 'EditHowToController@index')->name('howTo');
            Route::get('/how_to/delete/{id}', 'EditHowToController@delete');
            Route::get('/how_to/edit/{id}', 'EditHowToController@editIndex');
            Route::post('/how_to/edit/{id}', 'EditHowToController@edit');
            Route::get('/how_to/add', 'EditHowToController@addIndex');
            Route::post('/how_to/add', 'EditHowToController@add');
            Route::get('/gallery', 'EditGalleryController@index')->name('gallery');
            Route::get('/gallery/delete/{id}', 'EditGalleryController@delete');

            /*GalleryRoutes*/
            Route::post('/gallery/add', 'EditGalleryController@add');
            Route::post('/gallery/landingChange', 'EditGalleryController@landingChange');
            Route::post('/gallery/aboutChange', 'EditGalleryController@aboutChange');
            Route::post('/gallery/commentChange', 'EditGalleryController@commentChange');
            Route::post('/gallery/contactChange', 'EditGalleryController@contactChange');
            Route::post('/gallery/howtoChange', 'EditGalleryController@howtoChange');
            Route::post('/gallery/myaccChange', 'EditGalleryController@myaccChange');
            Route::post('/gallery/scheduleChange', 'EditGalleryController@scheduleChange');
            Route::post('/gallery/serviceChange', 'EditGalleryController@serviceChange');
            /*EndGalleryRoutes*/

        });
    });

    Route::get('/banned', 'BannedPageController@index')->name('banned');
});
Route::get('/offline', 'OfflineModeController@index')->name('offline');
