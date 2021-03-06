<?php
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function () {
    return new UserResource(User::find(1));
});
Route::get('/users', function () {
    return UserResource::collection(User::paginate());
});
Route::get('/posts', 'Api\PostController@index')->middleware('auth:api');
Route::get('/posts/{post}', 'Api\PostController@show')->middleware('auth:api');

// Route::get('/hello',function(){return 'hello';});
Route::post('/post', 'Api\PostController@store')->middleware('auth:api');
Route::put('/post', 'Api\PostController@store')->middleware('auth:api');



