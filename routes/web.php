<?php 

use App\Http\Controllers\{PostController};
use Illuminate\Support\Facades\Route;
Route::get('/home', function(){
    return redirect()->route('index');
});//Redireciona para a pagina index

Route::get('/posts', [PostController::class, 'index'])->name('index');//Home- listagem das postagens
Route::get('/pots/create', [PostController::class, 'create'])->name('create');//Direciona para a página de cadastrar novo post
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');//Cadastra os dados do novo post no banco
Route::get('/posts/{id}', [PostController::class, 'edit'])->name('edit');//Redireciona para a página de editar posts
Route::put('/posts/edit.do/{id}', [PostController::class, 'update'])->name('edit.do');//Cadastra a edição no banco
Route::delete('/posts/delete/{id}', [PostController::class, 'destroy'])->name('destroy');//Deleta o registro
Route::any('/posts/search', [PostController::class, 'search'])->name('search');//Procurar registros

Route::get('/', function (){
    return view('welcome');
});

Route::get('dashboard', function(){
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
