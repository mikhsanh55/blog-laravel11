<?php
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// GET && POST
Route::get('/todo', [TodoController::class, 'index']);
Route::get('/todo/add', function() {
    return view('todo.add');
});
Route::get('/todo/edit/{id}', [
    TodoController::class,
    'edit'
]);
