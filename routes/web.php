<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/about', function (){
    return view('about');
});

Route::get('/hello', function(){
    $dataArray = [
        'message' => 'Hello World'
    ];
    return response() -> json($dataArray);
});

Route::get('/debug', function(){
    $dataArray = [
        'message' => 'Hello World'
    ];
    return ddd($dataArray);
});
 
$taskList = [
    'first' => 'sleep',
    'second' => 'Eat',
    'third' => 'Work'
];
// http://localhost:8000/tasks?search=first
Route::get('/tasks', function() use($taskList){
    //ddd(request()-> all());
    if (request()->search) {
        return $taskList[request()->search];
    }

    return $taskList;
});

Route::get('tasks/{param}', function($param) use($taskList){
    return $taskList[$param];
});

Route::post('/tasks', function() use ($taskList){
    //return request() -> all();
    $taskList[request() -> label] = request() -> task;

    return $taskList;
});

Route::patch('/tasks/{key}', function($key) use ($taskList){
    $taskList[$key] = request()-> task;
    return $taskList;
});