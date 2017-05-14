<?php

Route::group(['prefix' => 'v1'], function () {
    Route::get('test',function (){
        return "working";
    });

    Route::post('login',['as'=>'v1.login','uses'=>'Api\V1\Auth\AuthController@login']);
    Route::get('refresh-token', ['as' => 'v1.refresh', 'uses' => 'Api\V1\Auth\AuthController@refreshToken']);

    Route::group(['middleware' => 'jwt.auth'], function (){
        Route::post(
            'refill',
            [
                'as' => 'v1.refill.refill',
                'uses' => 'Api\V1\Refill\RefillController@refill'
            ]
        );
    });

    Route::get(
        'provision',
        [
            'as' => 'v1.provision.provision',
            'uses' => 'Api\V1\Provision\ProvisionController@provision'
        ]
    );

});


