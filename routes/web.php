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


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/', ['as' => 'dashboard', 'uses' => 'Admin\DashboardController@index']);

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/map', ['as' => 'dashboard.map', 'uses' => 'Admin\DashboardController@map']);
        Route::get('/profile', ['as' => 'dashboard.profile', 'uses' => 'Admin\DashboardController@profile']);
    });

    Route::resource('roles', 'Admin\RolesController');
    Route::get('roles/{id}/permissions', ['as' => 'roles.permissions', 'uses' => 'Admin\RolesController@permission']);
    Route::post('roles/{id}/permissions', ['as' => 'roles.permissions.store', 'uses' => 'Admin\RolesController@storePermission']);

    Route::resource('users', 'Admin\UsersController');

    Route::group(['prefix' => 'users'], function () {
        Route::get('{id}/roles', ['as' => 'users.roles', 'uses' => 'Admin\UsersController@roles']);
        Route::post('{id}/roles', ['as' => 'users.roles.store', 'uses' => 'Admin\UsersController@saveRoles']);

        Route::get('{id}/permissions', ['as' => 'users.permissions', 'uses' => 'Admin\UsersController@permissions']);
        Route::post('{id}/permissions', ['as' => 'users.permissions.store', 'uses' => 'Admin\UsersController@savePermissions']);
        Route::post('findHaveEmail', ['as' => 'users.findHaveEmail', 'uses' => 'Admin\UsersController@findHaveEmail']);
    });

    Route::resource('student', 'Admin\UsersController');

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

});


Route::get('/', 'HomeController@index');
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('/news', 'HomeController@news');
Route::get('/about', 'HomeController@about');

Route::get('contact', ['as' => 'contact', 'uses' => 'ContactsController@create']);
Route::post('contact', ['as' => 'contact.store', 'uses' => 'ContactsController@store']);

Route::get('/profile', function () {
    return view('profile');
});

Route::get('gps-track', ['as' => 'gps.track', 'uses' => 'GpsLocationTrack@index']);
Route::get('/newsdetails/{id}', 'HomeController@newsdetails');



