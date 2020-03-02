@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
@endsection

@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <h1 style="text-align: center; font-size: 30px;">New Article</h1>
        <form method="POST" action="/articles">
            @csrf

            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                    <input class="input {{ $errors->has('title') ? 'is-danger' : '' }}"
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"/>
                    @if ($errors->has('title'))
                    <p class="help is-danger">{{ $errors->first('title') }}</p>
                    @endif
                </div>
            </div>

            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('excerpt') ? 'is-danger' : '' }}" type="text" name="excerpt" id="excerpt"></textarea>
                    @error('excerpt')
                    <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label" for="body">Body</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('body') ? 'is-danger' : '' }}" type="text" name="body" id="body"></textarea>
                    @error('body')
                    <p class="help is-danger">{{ $errors->first('body') }}</p>
                    @enderror
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