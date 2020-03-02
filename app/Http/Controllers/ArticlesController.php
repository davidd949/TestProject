<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    // Show multiple articles
    public function show(Article $article) {
        // $article = Article::findOrFail($id);
        // By adding Article within the args, its a shortcut way to tell
        // laravel to use "Article::where('id', 1)->first()" and set its findings
        // to the arg 'article'
        // NOTE: The args name for this method MUST match the wild card's name
        // within the route!

        return view('articles.show', [
            'article' => $article
        ]);
    }

    // Show a single article
    public function showall() {
        $articles = Article::paginate(3);

        return view('articles.showall', [
            'articles' => $articles
        ]);
    }

    // Show a view to create a new resource
    public function create() {
        return view('articles.create');
    }

    // Persist the new resource
    public function store() {
        // Validation

        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        /*
        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();
        */

        // Another way to create below. You must enable this feature in
        // the model. Laravel does this to prevent mass creation by default
        Article::create([
            'title' => request('title'),
            'excerpt' => request('excerpt'),
            'body' => request('body')
        ]);

        // Since validate is an array and same format as in Article::create(),
        // you can either set the validate as a variable or inline it.
        /*
        $validationdata = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        Article::create($validationdata);

        // OR inline method
        Article::create(request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required'
        ]));

        */

        // Attached appropriate tags to each new article example
        $this->validateArticle();
        
        $article = new Article(request(['title', 'body']));
        $article->user_id = 1; // auth()->id()
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect('/articles');
    }

    // Show a view to edit existing resource
    public function edit($id) {

        $article = Article::find($id);
        
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    // Persist the edited resource
    public function update($article) {
        /*
        $article = Article::find($id);
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();
        */

        $validateUpdate = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article->update($validateUpdate);

        return redirect('/articles/' . $article->id);
    }

    // Delete the resource
    public function destroy() {

    }

    protected function validateArticle() {

        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
