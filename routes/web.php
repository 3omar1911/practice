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


Route::get('/posts/usecache', 'PostsController@useCache');
Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tasks/{rate}', function($rate) {

	return App\Task::passedRate($rate)->orderBy('rate', 'asc')->get();

});

Route::get('/dummies', function() {


	$dummies = ['lerum', 'ninja', 'somethin else'];

	return $dummies;
});

Route::get('/logsome', function() {
	Log::info('first info to log');
});

Route::get('/mailsome', function() {

	$user = App\User::find(1);

	Mail::to($user)->send(new App\Mail\ConfigurationMail($user));
});

Route::get('activate/{code}', function($code) {

	$user = Auth::user();

	if($user->act_key == $code) {

		$user->active = true;
		$user->save();
	}


})->middleware('auth');

Route::get('/cachesome', function() {
	// Cache::put('zoo', 'oooo', 50);

	// return Cache::get('zoo');

	$posts = Cache::remember('posts', 10, function() {

		return App\Post::all();
	});

	return $posts;
});

Route::get('/redissome', function() {

	$redis = (app()->make('redis'));

	$redis->set('key', 'value');

	return $redis->get('key');
});

Route::get('/collectsome', function() {

	$coll = collect([1,2,3]);

	return $coll;
});

Route::get('/data', function() {

	$data = [
		'item1' => 'apple',
		'item2' => 'book',
		'item3' => 'shirt'
	];


	return response($data)->withHeaders([
		'Content-Type' => 'text/json',
		'device' => 'samsung'
	]);

});