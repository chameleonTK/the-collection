<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')
// ->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1'], function () {

    Route::group(['prefix' => 'user'], function () {
        Route::get('/{id}', 'UserController@getUser');
        Route::get('/u/{username}', 'UserController@getUserByUsername');
    });

    Route::group(['prefix' => 'collection'], function () {
        Route::get('/u/{username}', 'CollectionController@getCollection');
    });

    Route::group(['prefix' => 'item'], function () {
        Route::get('/s/{slug}', 'ItemController@getItemBySlug');
        Route::get('/search', 'ItemController@search');
        Route::get('/{id}', 'ItemController@getItem');
    });
});
