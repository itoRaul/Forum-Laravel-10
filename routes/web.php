<?php

use App\Http\Controllers\Admin\ForumController;
use App\Http\Controllers\Admin\UserController;
// use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

// Rotas protegidas (só acessa logado)
Route::middleware(['auth'])->group(function () {
    //Exclui o forum
    Route::delete('/forum/{id}', [ForumController::class, 'destroy'])->name('forum.destroy');

    //Edita o forum
    Route::put('/forum/{id}', [ForumController::class, 'update'])->name('forum.update');
    Route::get('/forum/{id}/edit', [ForumController::class, 'edit'])->name('forum.edit');

    //cadastra no forum
    Route::post('/forum/create', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');

    //mostra as informações detalhadas do forum
    Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');

    //Exibi no forum
    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');

    // Logout
    Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');
});

//login
Route::get('/login', [UserController::class, 'index'])->name('users.login.form');
Route::post('/login', [UserController::class, 'login'])->name('users.login');

//register
Route::get('/register', [UserController::class, 'register'])->name('users.register.form');
Route::post('/register', [UserController::class, 'storeRegistration'])->name('users.register');

Route::get('/', function () {
    return redirect()->route('users.login.form');
});
