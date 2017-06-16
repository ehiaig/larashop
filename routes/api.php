<?php

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
Route::get('/search', [
    'as' => 'api.search',
    'uses' => 'Api\SearchController@search'
]);

/**
Route::get('/search', function (Request $request) {
    return App\Product::search($request->search)->get();
});


Route::post ( '/search', function () {
	$q = Input::get ( 'q' );
	$results = Product::where ( 'title', 'LIKE', '%' . $q . '%' )->orWhere ( 'price', 'LIKE', '%' . $q . '%' )->get ();
	if (count ( $results ) > 0)
		return view ( 'admin/dashboard' )->withResults ( $results )->withQuery ( $q );
	else
		return view ( 'admin/dashboard' )->withMessage ( 'No Details found. Try to search again !' );
} );

*/