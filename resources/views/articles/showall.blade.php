@extends ('layout')


@section ('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
            @foreach ($articles as $article)
                <div class="title">
                    <a href="{{ route('article.show', $article) }}">
                        <h2>{{ $article->title }}</h2>
                    </a>
                </div>
                <p><img src="images/banner.jpg" alt="" class="image image-full" /> </p>
                <p>{{ $article->body }}</p>
            @endforeach
		</div>
	</div>
</div>
@endsection