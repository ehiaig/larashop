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


Route::get('/', function () {
    return view('index');
});

*/
Route::get('/', 'SiteController@index');
//Route::get('show/{id}', 'SiteController@show');
Route::get('/single', function () {
    return view('single');
});


Auth::routes();

//Route::get('myaccount/home', 'HomeController@index')->name('home');



Route::get('admincp/dashboard', 'AdminController@viewDash');

Route::get('admincp/categories/index', 'CategoriesController@viewCategory');
Route::post('admincp/categories/save', 'CategoriesController@saveCategory');
Route::get('admincp/categories/edit/{id}','CategoriesController@edit');
Route::post('update','CategoriesController@update');
Route::get('admincp/categories/delete/{id}','CategoriesController@delete');
Route::resource('admincp/categories','CategoriesController');


Route::get('admincp/brands/index', 'BrandsController@viewBrand');
Route::post('admincp/brands/save', 'BrandsController@saveBrand');
Route::get('admincp/brands/edit/{id}','BrandsController@edit');
Route::post('update','BrandsController@update');
Route::get('admincp/brands/delete/{id}','BrandsController@delete');
Route::resource('admincp/brands','BrandsController');


Route::get('admincp/products/index', 'ProductsController@viewProduct');
Route::post('admincp/products/save', 'ProductsController@storeProduct');
Route::get('admincp/products/edit/{id}','ProductsController@edit');
Route::post('update','ProductsController@update');
Route::get('admincp/products/delete/{id}','ProductsController@delete');
Route::resource('admincp/products','ProductsController');

/*
Route::any('/search',function(){
    $productsearch = Input::get ( 'productsearch' );
    $product = Product::where('title','LIKE','%'.$q.'%')->orWhere('price','LIKE','%'.$q.'%')->get();
    if(count($product) > 0)
        return view('admincp/search')->withDetails($product)->withQuery ( $q );
    else return view ('admincp/search')->withMessage('No Details found. Try to search again !');
});

//Route::get('admincp/search', ['as'=>'products_index','uses'=>'SearchController@index']);

//Route::post('create-product', ['as'=>'create-product','uses'=>'SearchController@create']);


