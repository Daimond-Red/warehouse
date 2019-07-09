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
    return redirect()->route('home');
    // return view('welcome');
});

Route::get('setPermissions', function (){

   $permissions = [
       // 'location_index',
       // 'location_create',
       // 'location_edit',
       // 'location_destroy',
       // 'location_show',

       // 'item_type_index',
       // 'item_type_create',
       // 'item_type_edit',
       // 'item_type_destroy',
       // 'item_type_show',

       // 'unit_index',
       // 'unit_create',
       // 'unit_edit',
       // 'unit_destroy',
       // 'unit_show',

       // 'vendor_index',
       // 'vendor_create',
       // 'vendor_edit',
       // 'vendor_destroy',
       // 'vendor_show',

       // 'store_index',
       // 'store_create',
       // 'store_edit',
       // 'store_destroy',
       // 'store_show',

       // 'item_index',
       // 'item_create',
       // 'item_edit',
       // 'item_destroy',
       // 'item_show',
       // 'item_stocks',
       // 'item_master_index',
       // 'item_master_create',
       // 'item_master_edit',
       // 'item_master_destroy',
       // 'item_master_show',
       // 'item_master_stocks',

   ];



   // foreach ($permissions as $permission) {
   //     \Spatie\Permission\Models\Permission::create([
   //         'name'          => $permission, //str_slug($permission,'_'),
   //         // 'display_name'  => $permission,
   //     ]);
   // }

});


Auth::routes();

Route::any('/dashboard', 'HomeController@index')->name('home');

Route::get('/home', function(){
    return redirect()->route('home');
});


Route::group(['namespace' => 'Admin', 'middleware' => 'admin.auth' ], function () {

    Route::post('users', ['as' => 'admin.users.store', 'uses' => 'UserController@store']);

    Route::get('adminUsers', [ 'as' => 'admin.adminUsers.index', 'uses' => 'AdminUserController@index' ]);
    Route::get('adminUsers/create', [ 'as' => 'admin.adminUsers.create', 'uses' => 'AdminUserController@create' ]);
    Route::post('adminUsers', [ 'as' => 'admin.adminUsers.store', 'uses' => 'AdminUserController@store' ]);
    Route::get('adminUsers/{id}/edit', [ 'as' => 'admin.adminUsers.edit', 'uses' => 'AdminUserController@edit' ]);
    Route::put('adminUsers/{id}', [ 'as' => 'admin.adminUsers.update', 'uses' => 'AdminUserController@update' ]);
    Route::get('adminUsers/{id}/destroy', [ 'as' => 'admin.adminUsers.delete', 'uses' => 'AdminUserController@destroy' ]);

    Route::get('vendors', ['as' => 'admin.vendors.index', 'uses' => 'VendorController@index']);
    Route::get('vendors/create', ['as' => 'admin.vendors.create', 'uses' => 'VendorController@create']);
    Route::post('vendors', ['as' => 'admin.vendors.store', 'uses' => 'VendorController@store']);
    Route::get('vendors/{id}/edit', ['as' => 'admin.vendors.edit', 'uses' => 'VendorController@edit']);
    Route::put('vendors/{id}', ['as' => 'admin.vendors.update', 'uses' => 'VendorController@update']);
    Route::get('vendors/{id}/destroy', ['as' => 'admin.vendors.delete', 'uses' => 'VendorController@destroy']);
    Route::get('vendors/get', ['as' => 'admin.vendors.get', 'uses' => 'VendorController@get']);

    Route::get('stores', ['as' => 'admin.stores.index', 'uses' => 'StoreController@index']);
    Route::get('stores/create', ['as' => 'admin.stores.create', 'uses' => 'StoreController@create']);
    Route::get('stores/{id}/show', ['as' => 'admin.stores.show', 'uses' => 'StoreController@show']);
    Route::post('stores', ['as' => 'admin.stores.store', 'uses' => 'StoreController@store']);
    Route::get('stores/{id}/edit', ['as' => 'admin.stores.edit', 'uses' => 'StoreController@edit']);
    Route::put('stores/{id}', ['as' => 'admin.stores.update', 'uses' => 'StoreController@update']);
    Route::get('stores/{id}/destroy', ['as' => 'admin.stores.delete', 'uses' => 'StoreController@destroy']);
    Route::get('stores/items', ['as' => 'admin.stores.items', 'uses' => 'StoreController@getItems']);

    Route::match(['get', 'post'], 'stocks', ['as' => 'admin.items.stocks', 'uses' => 'ItemController@stocks']);
    Route::get('items', ['as' => 'admin.items.index', 'uses' => 'ItemController@index']);
    Route::get('items/create', ['as' => 'admin.items.create', 'uses' => 'ItemController@create']);
    Route::post('items', ['as' => 'admin.items.store', 'uses' => 'ItemController@store']);
    Route::get('items/{id}/edit', ['as' => 'admin.items.edit', 'uses' => 'ItemController@edit']);

    Route::get('item/{id}/show', ['as' => 'admin.items.show', 'uses' => 'ItemController@show']);

    Route::put('items/{id}', ['as' => 'admin.items.update', 'uses' => 'ItemController@update']);
    Route::get('items/{id}/destroy', ['as' => 'admin.items.delete', 'uses' => 'ItemController@destroy']);
    Route::get('quantity/edit', ['as' => 'admin.items.quantity', 'uses' => 'ItemController@quantity']);
    Route::get('get/item', ['as' => 'admin.items.item', 'uses' => 'ItemController@item']);
    Route::get('itemCheck', ['as' => 'admin.items.itemCheck', 'uses' => 'ItemController@itemCheck']);
    Route::get('item/{id}/history', ['as' => 'admin.items.history', 'uses' => 'ItemController@history']);

    Route::get('item/{id}/documents', ['as' => 'admin.items.documents', 'uses' => 'ItemController@documents']);
    Route::get('item/{id}/finalFiles', ['as' => 'admin.items.finalFiles', 'uses' => 'ItemController@finalFiles']);

    Route::post('item/{id}/documentsStore', ['as' => 'admin.items.documentsStore', 'uses' => 'ItemController@documentsStore']);
    Route::get('item/{id}/documentsDelete', ['as' => 'admin.items.documentsDelete', 'uses' => 'ItemController@documentsDelete']);

    Route::get('items/{userId}/activity', ['as' => 'admin.items.activityIndex', 'uses' => 'ItemController@activityIndex']);
    Route::get('items/{id}/activityApprove', ['as' => 'admin.items.activityApprove', 'uses' => 'ItemController@activityApprove']);

    Route::get('units', ['as' => 'admin.units.index', 'uses' => 'UnitController@index']);
    Route::get('units/create', ['as' => 'admin.units.create', 'uses' => 'UnitController@create']);
    Route::post('units', ['as' => 'admin.units.store', 'uses' => 'UnitController@store']);
    Route::get('units/{id}/edit', ['as' => 'admin.units.edit', 'uses' => 'UnitController@edit']);
    Route::put('units/{id}', ['as' => 'admin.units.update', 'uses' => 'UnitController@update']);
    Route::get('units/{id}/destroy', ['as' => 'admin.units.delete', 'uses' => 'UnitController@destroy']);

    Route::get('itemTypes', ['as' => 'admin.itemTypes.index', 'uses' => 'ItemTypeController@index']);
    Route::get('itemTypes/create', ['as' => 'admin.itemTypes.create', 'uses' => 'ItemTypeController@create']);
    Route::post('itemTypes', ['as' => 'admin.itemTypes.store', 'uses' => 'ItemTypeController@store']);
    Route::get('itemTypes/{id}/edit', ['as' => 'admin.itemTypes.edit', 'uses' => 'ItemTypeController@edit']);
    Route::put('itemTypes/{id}', ['as' => 'admin.itemTypes.update', 'uses' => 'ItemTypeController@update']);
    Route::get('itemTypes/{id}/destroy', ['as' => 'admin.itemTypes.delete', 'uses' => 'ItemTypeController@destroy']);

    Route::get('releaseStocks', ['as' => 'admin.releaseStocks.index', 'uses' => 'ReleaseStockController@index']);
    Route::get('releaseStocks/create', ['as' => 'admin.releaseStocks.create', 'uses' => 'ReleaseStockController@create']);
    Route::post('releaseStocks', ['as' => 'admin.releaseStocks.store', 'uses' => 'ReleaseStockController@store']);

    Route::get('releaseStocks/{id}/edit', ['as' => 'admin.releaseStocks.edit', 'uses' => 'ReleaseStockController@edit']);

    Route::get('releaseStocks/{id}/show', ['as' => 'admin.releaseStocks.show', 'uses' => 'ReleaseStockController@show']);

    Route::put('releaseStocks/{id}', ['as' => 'admin.releaseStocks.update', 'uses' => 'ReleaseStockController@update']);
    Route::get('releaseStocks/{id}/destroy', ['as' => 'admin.releaseStocks.delete', 'uses' => 'ReleaseStockController@destroy']);

    Route::get('locations', ['as' => 'admin.locations.index', 'uses' => 'LocationController@index']);
    Route::get('locations/{id}/edit', ['as' => 'admin.locations.edit', 'uses' => 'LocationController@edit']);
    Route::put('locations/{id}', ['as' => 'admin.locations.update', 'uses' => 'LocationController@update']);

    Route::get('itemMasters', [ 'as' => 'admin.itemMasters.index', 'uses' => 'ItemMasterController@index' ]);
    Route::get('itemMasters/create', [ 'as' => 'admin.itemMasters.create', 'uses' => 'ItemMasterController@create' ]);
    Route::post('itemMasters', [ 'as' => 'admin.itemMasters.store', 'uses' => 'ItemMasterController@store' ]);
    Route::get('itemMasters/{id}/edit', [ 'as' => 'admin.itemMasters.edit', 'uses' => 'ItemMasterController@edit' ]);
    Route::put('itemMasters/{id}', [ 'as' => 'admin.itemMasters.update', 'uses' => 'ItemMasterController@update' ]);
    Route::get('itemMasters/{id}/destroy', [ 'as' => 'admin.itemMasters.delete', 'uses' => 'ItemMasterController@destroy' ]);

    route::get('report2', function(){
        return view('admin.reports.report2');
    });
});

Route::group(['namespace' => 'Admin', 'middleware' => 'admin.auth' ], function () {

    Route::get('reports', [ 'as' => 'admin.reports.index', 'uses' => 'ReportController@index' ]);

});