<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;
use Illuminate\Support\Facades\Redis;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'news'],function(){
   Route::get('/',API\News\GetNewsController::class);
   Route::post('store',API\News\CreateNewsController::class);
   Route::get('{id}',API\News\ShowNewsController::class);
   Route::put('{id}',API\News\UpdateNewsController::class);
   Route::delete('{id}',API\News\DeleteNewsController::class);
});

Route::group(['prefix'=>'tags','as'=>'tags.'],function(){
   Route::get('/',API\Tag\GetTagController::class)->name('index');
   Route::post('store',API\Tag\CreateTagController::class)->name('store');
   Route::get('{id}',API\Tag\ShowTagController::class)->name('show');
   Route::put('{id}',API\Tag\UpdateTagController::class)->name('update');
   Route::delete('{id}',API\Tag\DeleteTagController::class)->name('delete');
});
