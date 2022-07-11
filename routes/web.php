<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Setting
    Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingController');

    // Predict History
    Route::delete('predict-histories/destroy', 'PredictHistoryController@massDestroy')->name('predict-histories.massDestroy');
    Route::post('predict-histories/parse-csv-import', 'PredictHistoryController@parseCsvImport')->name('predict-histories.parseCsvImport');
    Route::post('predict-histories/process-csv-import', 'PredictHistoryController@processCsvImport')->name('predict-histories.processCsvImport');
    Route::resource('predict-histories', 'PredictHistoryController');

    // Article
    Route::delete('articles/destroy', 'ArticleController@massDestroy')->name('articles.massDestroy');
    Route::resource('articles', 'ArticleController');

    // Article Sets
    Route::delete('article-sets/destroy', 'ArticleSetsController@massDestroy')->name('article-sets.massDestroy');
    Route::post('article-sets/parse-csv-import', 'ArticleSetsController@parseCsvImport')->name('article-sets.parseCsvImport');
    Route::post('article-sets/process-csv-import', 'ArticleSetsController@processCsvImport')->name('article-sets.processCsvImport');
    Route::resource('article-sets', 'ArticleSetsController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
