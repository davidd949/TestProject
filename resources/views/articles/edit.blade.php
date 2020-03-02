@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
@endsection

@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <h1 style="text-align: center; font-size: 30px;">Edit Article</h1>
        <form method="POST" action="/articles/{{ $article->id }}">
            @csrf

            <!-- Modern browsers seems to handle GET and POST requests only.. others get converted to get
            Thus, we have to manually include special directions to laravel that this POST request with PUT intentions -->
            @method('PUT')

            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                    <input class="input" type="text" name="title" id="title" value="{{ $article->title }}" required min="3" maxlength="255"/>
                </div>
            </div>

            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                <div class="control">
                    <textarea class="textarea" type="text" name="excerpt" id="excerpt">{{ $article->excerpt }}</textarea>
                </div>
            </div>

            <div class="field">
                <label class="label" for="body">Body</label>
                <div class="control">
                    <textarea class="textarea" type="text" name="body" id="body">{{ $article->body }}</textarea>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection