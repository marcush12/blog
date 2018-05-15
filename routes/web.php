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

Route::get('/', 'PagesController@home')->name('pages.home');
Route::get('about', 'PagesController@about')->name('pages.about');
Route::get('archive', 'PagesController@archive')->name('pages.archive');
Route::get('contact', 'PagesController@contact')->name('pages.contact');

Route::get('blog/{post}', 'PostsController@show')->name('posts.show');
Route::get('categories/{category}', 'CategoriesController@show')->name('categories.show');
Route::get('tags/{tag}', 'TagsController@show')->name('tags.show');
// Route::get('/posts', function () {
//     return App\Post::all();
// });
Route::group([
    'prefix'=>'admin',
    'namespace'=>'Admin',
    'middleware'=>'auth'],
    function () {
        Route::get('/', 'AdminController@index')->name('dashboard');

        Route::resource('posts', 'PostsController', ['except'=>'show', 'as'=>'admin']);//'as' colocar prefixo admin
        //rotas abaixo foram substituídas pela linha acima com resource
        // Route::get('posts', 'PostsController@index')->name('admin.posts.index');
        // Route::get('posts/create', 'PostsController@create')->name('admin.posts.create');
        // Route::post('posts', 'PostsController@store')->name('admin.posts.store');
        // Route::get('posts/{post}', 'PostsController@edit')->name('admin.posts.edit');
        // Route::put('posts/{post}', 'PostsController@update')->name('admin.posts.update');
        // Route::delete('posts/{post}', 'PostsController@destroy')->name('admin.posts.destroy');

        Route::resource('users', 'UsersController', ['as'=>'admin']);
        Route::put('users/{user}/roles', 'UsersRolesController@update')->name('admin.users.roles.update');
        Route::put('users/{user}/permissions', 'UsersPermissionsController@update')->name('admin.users.permissions.update');
        Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
        Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');

    //rotas de admin
    }
);


// Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        //Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        //Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');
