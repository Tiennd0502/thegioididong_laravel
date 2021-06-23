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

Route::get('/', function () {
    return view('welcome');
});

$prefix_admin = config('config.url.prefix_admin');
// admin -123123
Route::group(['prefix' => $prefix_admin, 'namespace' => 'Backend'],function(){
    Route::get('', 'AdminController@getLogin')->name('admin.getLogin');
    Route::get('/login', 'AdminController@getLogin')->name('admin.getLogin');
    Route::post('', 'AdminController@postLogin')->name('admin.postLogin');
    Route::get('logout', 'AdminController@logout')->name('admin.logout');

    //=============================== Page ===============================
    $prefix         = 'page';
    $controllerName = 'page';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        $controller  = ucfirst($controllerName).'Controller@';
        Route::get('/', $controller.'index')                ->name($controllerName.'.index');
        Route::get('/create', $controller.'create')         ->name($controllerName.'.create');
        Route::post('/', $controller.'store')               ->name($controllerName.'.store');
        Route::put('/{id}', $controller.'update')           ->name($controllerName.'.update')->where('id','[0-9]+');
        Route::delete('/{id}', $controller.'destroy')       ->name($controllerName.'.destroy')->where('id','[0-9]+');
        Route::get('/{id}', $controller.'show')             ->name($controllerName.'.show')->where('id','[0-9]+');
        Route::get('/{id}/edit', $controller.'edit')        ->name($controllerName.'.edit')->where('id','[0-9]+');
    });
    //=============================== slider ===============================
    $prefix         = 'slider';
    $controllerName = 'slider';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        $controller  = ucfirst($controllerName).'Controller@';
        Route::get('/', $controller.'index')                ->name($controllerName.'.index');
        Route::get('/{status}/{id}',$controller.'status')->name($controllerName.'.status')->where('id','[0-9]+');
        Route::get('/create', $controller.'create')         ->name($controllerName.'.create');
        Route::post('/', $controller.'store')               ->name($controllerName.'.store');
        Route::put('/{id}', $controller.'update')           ->name($controllerName.'.update')->where('id','[0-9]+');
        Route::delete('/{id}', $controller.'destroy')       ->name($controllerName.'.destroy')->where('id','[0-9]+');
        Route::get('/{id}', $controller.'show')             ->name($controllerName.'.show')->where('id','[0-9]+');
        Route::get('/{id}/edit', $controller.'edit')        ->name($controllerName.'.edit')->where('id','[0-9]+');
    });
    //=============================== Category ===============================
    $prefix         = 'category';
    $controllerName = 'category';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        $controller  = ucfirst($controllerName).'Controller@';
        Route::get('/', $controller.'index')                ->name($controllerName.'.index');
        Route::get('/{status}/{id}',$controller.'status')->name($controllerName.'.status')->where('id','[0-9]+');
        Route::get('/create', $controller.'create')         ->name($controllerName.'.create');
        Route::post('/', $controller.'store')               ->name($controllerName.'.store');
        Route::put('/{id}', $controller.'update')           ->name($controllerName.'.update')->where('id','[0-9]+');
        Route::delete('/{id}', $controller.'destroy')       ->name($controllerName.'.destroy')->where('id','[0-9]+');
        Route::get('/{id}', $controller.'show')             ->name($controllerName.'.show')->where('id','[0-9]+');
        Route::get('/{id}/edit', $controller.'edit')        ->name($controllerName.'.edit')->where('id','[0-9]+');
        
    });
    //=============================== brand ===============================
    $prefix         = 'brand';
    $controllerName = 'brand';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        $controller  = ucfirst($controllerName).'Controller@';
        Route::get('/', $controller.'index')                ->name($controllerName.'.index');
        Route::get('/{status}/{id}',$controller.'status')->name($controllerName.'.status')->where('id','[0-9]+');
        Route::get('/create', $controller.'create')         ->name($controllerName.'.create');
        Route::post('/', $controller.'store')               ->name($controllerName.'.store');
        Route::put('/{id}', $controller.'update')           ->name($controllerName.'.update')->where('id','[0-9]+');
        Route::delete('/{id}', $controller.'destroy')       ->name($controllerName.'.destroy')->where('id','[0-9]+');
        Route::get('/{id}', $controller.'show')             ->name($controllerName.'.show')->where('id','[0-9]+');
        Route::get('/{id}/edit', $controller.'edit')        ->name($controllerName.'.edit')->where('id','[0-9]+');
    });
    //=============================== product ===============================
    $prefix         = 'product';
    $controllerName = 'product';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        $controller  = ucfirst($controllerName).'Controller@';
        Route::get('/', $controller.'index')                ->name($controllerName.'.index');
        Route::get('/{status}/{id}',$controller.'status')->name($controllerName.'.status')->where('id','[0-9]+');
        Route::get('/create', $controller.'create')         ->name($controllerName.'.create');
        Route::post('/', $controller.'store')               ->name($controllerName.'.store');
        Route::put('/{id}', $controller.'update')           ->name($controllerName.'.update')->where('id','[0-9]+');
        Route::get('/{id}/copy', $controller.'copy')         ->name($controllerName.'.copy')->where('id','[0-9]+');
        Route::delete('/{id}', $controller.'destroy')       ->name($controllerName.'.destroy')->where('id','[0-9]+');
        Route::get('/{id}', $controller.'show')             ->name($controllerName.'.show')->where('id','[0-9]+');
        Route::get('/{id}/edit', $controller.'edit')        ->name($controllerName.'.edit')->where('id','[0-9]+');
        Route::get('getBrand/{category_id}',$controller.'getBrand')->name('getBrand')->where('category_id','[0-9]+');
        
    });
    //=============================== article ===============================
    $prefix         = 'article';
    $controllerName = 'article';
    Route::group(['prefix' => $prefix], function () use($controllerName) {
        $controller  = ucfirst($controllerName).'Controller@';
        Route::get('/', $controller.'index')                ->name($controllerName.'.index');
        Route::get('/{status}/{id}',$controller.'status')->name($controllerName.'.status')->where('id','[0-9]+');
        Route::get('/create', $controller.'create')         ->name($controllerName.'.create');
        Route::post('/', $controller.'store')               ->name($controllerName.'.store');
        Route::put('/{id}', $controller.'update')           ->name($controllerName.'.update')->where('id','[0-9]+');
        Route::get('/{id}/copy', $controller.'copy')         ->name($controllerName.'.copy')->where('id','[0-9]+');
        Route::delete('/{id}', $controller.'destroy')       ->name($controllerName.'.destroy')->where('id','[0-9]+');
        Route::get('/{id}', $controller.'show')             ->name($controllerName.'.show')->where('id','[0-9]+');
        Route::get('/{id}/edit', $controller.'edit')        ->name($controllerName.'.edit')->where('id','[0-9]+');
        Route::get('getBrand/{category_id}',$controller.'getBrand')->name('getBrand')->where('category_id','[0-9]+');
        
    });
});