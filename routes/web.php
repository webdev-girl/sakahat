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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('home');
});
// Route::get('/private', function () {
//     return view('private');
// });
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/edit-profile', function () {
    return view('edit-profile');
});
// Route::get('/account', function () {
//     return view('account');
// });
// Route::get('/bot', function () {
//     return view('bot');

// });
// Route::get('/tinker', function () {
//     return view('tinker');
// });
Route::get('/albums', function () {
    return view('albums');
});

Route::get('/chat', function () {
    return view('chat');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/upload', function () {
    return view('upload');
});
Route::get('/save-details', function () {
    return view('save-details');
});
Route::get('/fileUpload', function () {
    return view('fileUpload');
});
Route::post('upload', function (){
    // if ($request->has('imgUpload1') {
    //     $request->file('imgUpload1')->store();
    // }
    request()->file('file')->store(
        'my-file',
        's3'
    );
    return back();
})->name('upload');


Route::get('profile', 'UsersController@profile');
Route::post('profile', 'UsersController@update_avatar');
Route::get('/artisan/storage', function() {
    $command = 'storage:link';
    $result = Artisan::call($command);
    return Artisan::output();
});
Route::get('/', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');

// Route::match(['get', 'post'], '/botman', 'BotManController@handle');
// Route::get('/botman/tinker', 'BotManController@tinker');
Route::match(['get', 'post'],'/webhook', 'MessengerController@webhook');

Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/private', 'HomeController@private')->name('private');
Route::get('/users', 'HomeController@users')->name('users');
Route::get('messages', 'MessageController@fetchMessages');
Route::post('messages', 'MessageController@sendMessage');
Route::get('/private-messages/{user}', 'MessageController@privateMessages')->name('privateMessages');
Route::post('/private-messages/{user}', 'MessageController@sendPrivateMessage')->name('privateMessages.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
