<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\PollOptionController;
use App\Http\Controllers\PollSubmitController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/users/{id}', [UserController::class, 'show'])->name('view_user');

Route::get('/infos', [InfoController::class, 'index'])->name('view_infos');
Route::get('/infos/{info}', [InfoController::class, 'show'])->name('view_info');
Route::post('/infos', [InfoController::class, 'store'])->name('add_info');
Route::delete('/infos/{info}', [InfoController::class, 'destroy'])->name('delete_info');

Route::get('/comments/infos/{info}', [CommentController::class, 'index'])->name('view_comments_from_info');
Route::post('/comments', [CommentController::class, 'store'])->name('add_comment');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('delete_comment');

Route::get('/reactions/infos/{info}', [ReactionController::class, 'index'])->name('view_reactions_from_info');
Route::post('/reactions', [ReactionController::class, 'store'])->name('add_reaction');
Route::delete('/reactions/{reaction}', [ReactionController::class, 'destroy'])->name('delete_reaction');

Route::post('/polls', [PollController::class, 'store'])->name('add_poll');

Route::get('/polls/{poll}/options/{option}', [PollOptionController::class, 'show'])->name('view_poll_option');
Route::post('/polls/{poll}/options', [PollOptionController::class, 'store'])->name('add_poll_option');

Route::post('/polls/{poll}/options/{option}/submits', [PollSubmitController::class, 'store'])->name('add_poll_option_submit');
