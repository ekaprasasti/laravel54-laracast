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

// original view
// Route::get('/', function () {
//     return view('welcome');
// });

// pass variable name ke view
// Route::get('/', function(){
//	return view ('welcome', [
//		'name' => 'world'
//	]);
// });

// passing variable cara ke 2
// Route::get('/', function(){
// 	return view('welcome')->with('name', 'eka');
// });

// passing variable cara ke 3
// Route::get('/', function(){
// 	$name = 'prasasti';
// 	return view ('welcome', compact('name'));
// });

// Passing array to view
Route::get('/', function(){
	$tasks = [
		'go to the store',
		'finish my screencast',
		'clean the house'
	];
	return view('welcome', compact('tasks'));
});
