<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Post;
use App\Models\User ; 
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('home',[
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "nama" => "Oniel" ,
        "gen" => "8" ,
        "img"  => "P2.jpeg" 
    ]);
});



Route::get('/blog', [PostController::class,'index']);


// single post 
//  /blog/{slug} ====> slug diambil dari url/link, jadi ibaratnya apapun yang ada di link/url akan ditangkap 
// pada {slug} walaupun kita tidak mempunyai halaman tersebut ttp akan ditampilkan dan array tersebut dianggap 
//  tidak ada atau kosong itulah kenapa tidak eror 
Route::get('/blog/{post:slug}', [PostController::class,'detail']);

// Route::get('/categories/{category:slug}' , function(Category $category){
// 	return view('blog',[
// 		'title' => "Post By category : $category->name" , 
// 		// 'blogs' => $category->posts,  
//         'blogs' => $category->posts->load('category' , 'user'),
// 	]) ;
// }) ;


Route::get('/categories' , function(){
	return view('categorys' , [
        'title' => 'Category' ,
        'categorys' => Category::all()
    ]) ;
}) ;


// Route::get('/authors/{user:username}' , function(User $user){
// 	return view('blog' , [
//         'title' => "Post By author : $user->name" ,
//         // 'blogs' => $user->posts
//         'blogs' => $user->posts->load('category' , 'user') 
//     ]) ;
// }) ;


Route::get('/login' , [LoginController::class,'index'])->name('login')->middleware('guest') ;
Route::post('/login' , [LoginController::class,'authenticate']) ;
Route::post('/logout' , [LoginController::class,'logout']) ;

Route::get('/register' , [RegisterController::class,'index'])->middleware('guest') ;
Route::post('/register' , [RegisterController::class,'store']) ;



Route::get('/dashboard', function(){
    return view('dashboard.index') ;
})->middleware('auth');

Route::get('/dashboard/posts/cekSlug' , [DashboardPostController::class, 'checkSlug'])->middleware('auth') ;

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories',AdminCategoryController::class)->except('show')->middleware(IsAdmin::class); 