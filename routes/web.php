<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('tasks');
Route::post('/task/save', [TaskController::class, 'save'])->name('task.save');
Route::get('/tasks/reset', [TaskController::class, 'reset'])->name('tasks.reset');
Route::post('/task/complete', [TaskController::class, 'markAsComplete'])->name('tasks.complete');
// Route::delete('/task/delete/{task}', [TaskController::class, 'delete'])->name('task.delete');
