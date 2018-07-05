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

Route::get('/',[
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);


Route::get('/post/{slug}',[
    'uses' => 'FrontEndController@single',
    'as' => 'post.single'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){

 
    /*** POSTS ***/
    Route::get('/post/create',[ 
        'uses' => 'PostsController@create',
        'as' => 'post.create'
    ]);

    Route::get('/posts',[ 
        'uses' => 'PostsController@index',
        'as' => 'posts'
    ]);
    
    
    Route::post('/post/store',[
        'uses' => 'PostsController@store',
        'as' => 'post.store'
    ]);

    Route::get('/post/delete/{id}',[
        'uses' => 'PostsController@destroy',
        'as' => 'post.delete'
    ]);

    Route::get('/post/trashed',[
        'uses' => 'PostsController@trashed',
        'as' => 'posts.trashed'
    ]);

    Route::get('/post/trunc/{id}',[
        'uses' => 'PostsController@trunc',
        'as' => 'post.trunc'
    ]);

    Route::get('/post/restore/{id}',[
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);

    Route::get('/post/edit/{id}',[
        'uses' => 'PostsController@edit',
        'as' => 'post.edit'
    ]);

    Route::post('/post/update/{id}',[
        'uses' => 'PostsController@update',
        'as' => 'post.update'
    ]);

    
    /*** Categories ***/


    Route::get('/category/create',[
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::post('/category/store',[
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);


    Route::get('/categories',[
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);

    Route::get('/category/edit/{id}',[
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);

    Route::post('/category/update/{id}',[
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);

    Route::get('/category/delete/{id}',[
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);


    /*** TAGS ***/


    Route::get('/tag/create',[
        'uses' => 'TagController@create',
        'as' => 'tag.create'
    ]);

    Route::post('/tag/store',[
        'uses' => 'TagController@store',
        'as' => 'tag.store'
    ]);


    Route::get('/tags',[
        'uses' => 'TagController@index',
        'as' => 'tags'
    ]);

    Route::get('/tag/edit/{id}',[
        'uses' => 'TagController@edit',
        'as' => 'tag.edit'
    ]);

    Route::post('/tag/update/{id}',[
        'uses' => 'TagController@update',
        'as' => 'tag.update'
    ]);

    Route::get('/tag/delete/{id}',[
        'uses' => 'TagController@destroy',
        'as' => 'tag.delete'
    ]);

    /*** Users ***/
    Route::get('/users',[
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    Route::get('/user/create',[
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);

    Route::post('/user/store',[
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);


    Route::get('/user/notadmin/{id}',[
        'uses' => 'UsersController@not_admin',
        'as' =>'user.not.admin'
    ]);

    Route::get('/user/admin/{id}',[
        'uses' => 'UsersController@admin',
        'as' =>'user.admin'
    ]);


    Route::get('/user/edit',[
        'uses' => 'UsersController@edit',
        'as' => 'user.edit'
    ]);


    Route::post('/user/update',[
        'uses' => 'UsersController@update',
        'as' => 'user.update'
    ]);

    Route::get('/user/delete/{id}',[
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);

    Route::post('/settings/update',[
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);

    
});


    /*** TEST ***/
    Route::get('/test',function(){
        return App\Post::find(1)->profile;
    });



    