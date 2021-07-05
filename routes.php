<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('Classmy', [
    'as' => 'Classmy',
    'uses' => 'tranthihoaitrang\Classmy\Controllers\Front\ClassFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see', 'in_context'],
                  'namespace' => 'tranthihoaitrang\Classmy\Controllers\Admin',
        ], function () {

        /*
          |-----------------------------------------------------------------------
          | Manage Classmy
          |-----------------------------------------------------------------------
          | 1. List of Classmy
          | 2. Edit Classmy
          | 3. Delete Classmy
          | 4. Add new Classmy
          | 5. Manage configurations
          | 6. Manage languages
          |
        */

        /**
         * list
         */
        Route::get('admin/Classmy', [
            'as' => 'Classmy.list',
            'uses' => 'ClassAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/Classmy/edit', [
            'as' => 'Classmy.edit',
            'uses' => 'ClassAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/Classmy/copy', [
            'as' => 'Classmy.copy',
            'uses' => 'ClassAdminController@copy'
        ]);

        /**
         * post
         */
        Route::post('admin/Classmy/edit', [
            'as' => 'Classmy.class',
            'uses' => 'ClassAdminController@class'
        ]);

        /**
         * delete
         */
        Route::get('admin/Classmy/delete', [
            'as' => 'Classmy.delete',
            'uses' => 'ClassAdminController@delete'
        ]);

        /**
         * trash
         */
         Route::get('admin/Classmy/trash', [
            'as' => 'Classmy.trash',
            'uses' => 'ClassAdminController@trash'
        ]);

        /**
         * configs
        */
        Route::get('admin/Classmy/config', [
            'as' => 'Classmy.config',
            'uses' => 'ClassAdminController@config'
        ]);

        Route::post('admin/Classmy/config', [
            'as' => 'Classmy.config',
            'uses' => 'ClassAdminController@config'
        ]);

        /**
         * language
        */
        Route::get('admin/Classmy/lang', [
            'as' => 'Classmy.lang',
            'uses' => 'ClassAdminController@lang'
        ]);

        Route::post('admin/Classmy/lang', [
            'as' => 'Classmy.lang',
            'uses' => 'ClassAdminController@lang'
        ]);

    });
});
