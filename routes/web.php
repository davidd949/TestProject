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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bee', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/queryString', function () {
    return view('test', [
        'name' => request('name')
    ]);
});

Route::get('/posts/{post}', function ($post) {
    # Imitating a DB
    $posts = [
        '1stpost' => 'Hello world!!',
        '2ndpost' => 'Second post here'
    ];

    # Return a 404 error page if key doesn't exist in our temp DB
    if (! array_key_exists($post, $posts)) {
        abort(404, 'That post does not exists!');
    };
    
    return view('posts', [
        'post' => $posts[$post]
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    # gets all articles
    $article = App\Article::all();
    # gets only one article
    $article = App\Article::take(1)->get();
    # paginations
    $article = App\Article::paginate(1);
    # newest ones (asc) defaults using created_at or insert value 'updated_at'
    $article = App\Article::latest('updated_at')->get();

    return view('about', [
        'articles' => $article
    ]);
});

# Using controllers
Route::get('/adminposts/{post}', 'AdminPostsController@show')->name('article.post');

Route::get('/articles', 'ArticlesController@showall');

Route::post('/articles', 'ArticlesController@store');

Route::get('/articles/create', 'ArticlesController@create')->name('article.create');

// Route::get('/articles/{article}', 'ArticlesController@show');
# Added a named route so if we change the route, all other hardcoded URL
# will update accordingly. Wildcard name must match the external named routes.
Route::get('/articles/{article}', 'ArticlesController@show')->name('article.show');

Route::put('/articles/{article}', 'ArticlesController@update');

Route::get('/articles/{article}/edit', 'ArticlesController@edit');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
