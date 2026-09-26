<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\testController;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;


    Route::get('/', [HomeController::class, 'Home'])->name('home');

    Route::prefix("teste")->group(function () {

        Route::controller(testController::class)->group(function () {

            Route::get('/', 'index');
            Route::get('/{id}', 'show');
            Route::put('/{id}', 'update');
            Route::post('/', 'store');
            Route::delete('/{id}', 'destroy');
        });
    });

    // ---- Login/Logout ----

    Route::get('/login', [AuthController::class, 'view'])->name('login');
    Route::post('/login', [AuthController::class, 'login_post'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('categorias')->group(function () {
  
    });

    // ---- Área administrativa (protegida) ----

    Route::middleware(['auth','checkrole'])->group(function () {

            Route::prefix('admin')->group(function () {

                    Route::get('/', [UserController::class, 'index'])->name('users.home');
                    Route::get('/list', [UserController::class, 'get_all'])->name('users.list_users');

                    Route::get('/create', [UserController::class, 'view'])->name('users.create');
                    Route::post('/create', [UserController::class, 'save'])->name('users.save');
                    Route::delete('/{id}', [UserController::class, 'delete'])->name('users.delete');
                    Route::Post('/users/search', [UserController::class, 'search'])->name('users.search');

                
                    Route::prefix('categorias')->group(function () {

                        Route::get('/', [CategoriaController::class, 'index'])->name('categorias.home');
                        Route::get('/list', [CategoriaController::class, 'get_all'])->name('categorias.list'); 

                        Route::get('/create', [CategoriaController::class, 'create'])->name('categoria.create');
                        Route::post('/create', [CategoriaController::class, 'save'])->name('categoria.save');
                        Route::get('/{id}/edit', [CategoriaController::class, 'edit_view'])->name('categoria.edit');
                        Route::put('/{id}', [CategoriaController::class, 'update'])->name('categoria.update'); Route::post('/search', [CategoriaController::class, 'search'])->name('categorias.search'); 

                        Route::delete('/{id}', [CategoriaController::class, 'delete'])->name('categoria.delete');
                        
                        
                    });
                    
                    Route::prefix('noticias')->group(function () {

                        Route::get('/', [NoticiaController::class, 'index'])->name('noticias.home'); 
                        Route::get('/list', [NoticiaController::class, 'list_noticias'])->name('noticias.list');

                        Route::get('/create', [NoticiaController::class, 'create'])->name('noticias.create');
                        Route::post('/create', [NoticiaController::class, 'save'])->name('noticias.save');
                        Route::get('/{id}/edit', [NoticiaController::class, 'view_edit'])->name('noticias.edit');
                        Route::put('/{id}', [NoticiaController::class, 'save_edit'])->name('noticias.update');
                        Route::post('/noticias/search', [NoticiaController::class, 'search'])->name('noticias.search');
                        Route::delete('/{id}', [NoticiaController::class, 'delete'])->name('noticias.delete'); 

                        Route::get('/rascunhos', [NoticiaController::class, 'rascunhos'])->name('noticias.rascunhos');
                        Route::get('/despublicados', [NoticiaController::class, 'despublicados'])->name('noticias.despublicados');

                    });


                Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
                Route::put('/{id}', [UserController::class, 'save_edit'])->name('users.update');

            });

    });

    // Público — Notícias

    Route::prefix('noticias')->group(function () {

        Route::get('/list', [PublicController::class, 'noticias'])->name('noticias');
        Route::get('/search', [PublicController::class, 'search_noticia'])->name('search');
        Route::get('/{slug}', [PublicController::class, 'detalhes'])->name('detalhes');

    });


    Route::get('/register', [PublicController::class,'create'])->name('create');
    Route::post('/register', [PublicController::class,'save'])->name('save');
    Route::get('/recentes', [PublicController::class, 'novas_noticias'])->name('noticias.recentes');
    Route::get('/antigas', [PublicController::class, 'velhas_noticias'])->name('noticias.antigas');
    Route::get('/categorias', [PublicController::class, 'categorias'])->name('categorias');
    Route::get('/noticia_categoria/{id}', [PublicController::class, 'noticia_categoria'])->name('noticia_categoria');



