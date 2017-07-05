<?php


Auth::routes();

//for map screen validation
Route::group(['middleware' => 'map.validate'], function () {
    Route::get('token', function () {
        return response()->json([
            'token' => session('token')
        ]);
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'auth_user_type', 'role:Admin']], function () {

    Route::get('/', ['as' => 'dashboard', 'uses' => 'Admin\DashboardController@index']);

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/map', ['as' => 'dashboard.map', 'uses' => 'Admin\DashboardController@map']);
        Route::get('/profile', ['as' => 'dashboard.profile', 'uses' => 'Admin\DashboardController@profile']);
    });

    Route::resource('roles', 'Admin\RolesController');
    Route::get('roles/{id}/permissions', ['as' => 'roles.permissions', 'uses' => 'Admin\RolesController@permission']);
    Route::post('roles/{id}/permissions', ['as' => 'roles.permissions.store', 'uses' => 'Admin\RolesController@storePermission']);

    Route::resource('users', 'Admin\UsersController');
    Route::resource('registration_payments', 'Admin\RegistrationPaymentController');

    Route::group(['prefix' => 'users'], function () {
        Route::get('{id}/roles', ['as' => 'users.roles', 'uses' => 'Admin\UsersController@roles']);
        Route::post('{id}/roles', ['as' => 'users.roles.store', 'uses' => 'Admin\UsersController@saveRoles']);

        Route::get('{id}/permissions', ['as' => 'users.permissions', 'uses' => 'Admin\UsersController@permissions']);
        Route::post('{id}/permissions', ['as' => 'users.permissions.store', 'uses' => 'Admin\UsersController@savePermissions']);
        Route::post('findHaveEmail', ['as' => 'users.findHaveEmail', 'uses' => 'Admin\UsersController@findHaveEmail']);
    });

    Route::resource('student', 'Admin\StudentController');

    Route::resource('permissions', 'Admin\PermissionsController');
    Route::resource('status', 'Admin\StatusController');
    Route::get('autocomplete', 'Admin\AutoCompleteController@autocomplete');


    Route::resource('news', 'Admin\Site\News\NewsPostsController');
    Route::group(['prefix' => 'news'], function () {
        Route::post(
            'displayNewsBySearchText',
            [
                'as' => 'news.displayNewsBySearchText',
                'uses' => 'Admin\Site\News\NewsPostsController@displayNewsBySearchText'
            ]
        );
    });
    Route::resource('newssticker', 'Admin\NewsstickerController');

    Route::resource('testimonials', 'Admin\Site\TestimonialsController');
    Route::group(['prefix' => 'testimonials'], function () {
        Route::post(
            'displayTestimonialsBySearchText',
            [
                'as' => 'testimonials.displayTestimonialsBySearchText',
                'uses' => 'Admin\Site\TestimonialsController@displayTestimonialsBySearchText'
            ]
        );
    });

    Route::get('/blank', function () {return view('admin.blank');});
    Route::get('/404', ['as' => 'dashboard.404', 'uses' => 'Admin\DashboardController@page404']);

    Route::resource('events', 'Admin\EventsController');
    Route::resource('payments', 'Admin\PaymentController');
    Route::delete(
        'delete_payment{id}',
        [
            'as' => 'admin.payment',
            'uses' => 'Admin\PaymentController@destroy'
        ]
    );

    Route::get('invoice/{id}', ['as' => 'admin.invoice', 'uses' => 'Admin\InvoiceController@showInvoice']);
    Route::get('invoice_download/{id}', ['as' => 'admin.invoice_download', 'uses' => 'Admin\InvoiceController@downloadInvoice']);

    Route::get('approve_payment{id}', ['as' => 'admin.approve_payment', 'uses' => 'Admin\PaymentController@approvePayment']);
    Route::get('pending_payment{id}', ['as' => 'admin.pending_payment', 'uses' => 'Admin\PaymentController@pendingPayment']);
    Route::get('cancel_payment{id}', ['as' => 'admin.cancel_payment', 'uses' => 'Admin\PaymentController@cancelPayment']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'auth_user_type', 'role:Support-Admin']], function () {

    Route::get('/', ['as' => 'dashboard', 'uses' => 'Admin\DashboardController@index']);
    Route::resource('users', 'Admin\UsersController');

    Route::resource('news', 'Admin\Site\News\NewsPostsController');
    Route::group(['prefix' => 'news'], function () {
        Route::post(
            'displayNewsBySearchText',
            [
                'as' => 'news.displayNewsBySearchText',
                'uses' => 'Admin\Site\News\NewsPostsController@displayNewsBySearchText'
            ]
        );
    });
    Route::resource('newssticker', 'Admin\NewsstickerController');

    Route::resource('testimonials', 'Admin\Site\TestimonialsController');
    Route::group(['prefix' => 'testimonials'], function () {
        Route::post(
            'displayTestimonialsBySearchText',
            [
                'as' => 'testimonials.displayTestimonialsBySearchText',
                'uses' => 'Admin\Site\TestimonialsController@displayTestimonialsBySearchText'
            ]
        );
    });

});

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {

    Route::resource('profile', 'User\ProfileController');
    Route::resource('students', 'User\StudentsListController');
    Route::resource('payments', 'User\PaymentsController');
  
    Route::post('payments/process_list', ['as' => 'get_process_list', 'uses' => 'User\PaymentsController@getProcessList']);
    Route::post('payments/checkout_payment', ['as' => 'final_payment_list', 'uses' => 'User\PaymentsController@checkoutPayment']);
    Route::post('payments/confirm_payment', ['as' => 'confirm', 'uses' => 'User\PaymentsController@confirm']);

    Route::resource('invoice', 'User\InvoiceController');

    Route::get('invoice/{id}', ['as' => 'user.invoice', 'uses' => 'User\InvoiceController@showInvoice']);
    Route::get('invoice_download/{id}', ['as' => 'user.invoice_download', 'uses' => 'User\InvoiceController@downloadInvoice']);
});

Route::get('/', 'HomeController@index');
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/sign-in', ['as' => 'student-login', 'uses' => 'User\LoginController@login']);
Route::post('/sign-in', ['as' => 'student-login', 'uses' => 'User\LoginController@postLogin']);

Route::get('/news', 'HomeController@news');
Route::get('/about', 'HomeController@about');

Route::get('contact', ['as' => 'contact', 'uses' => 'ContactsController@create']);
Route::post('contact', ['as' => 'contact.store', 'uses' => 'ContactsController@store']);

Route::get('/newsdetails/{id}', 'HomeController@newsdetails');

 Route::resource('payments', 'User\PaymentsController');




