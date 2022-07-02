@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Category Name</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$categorySlug}}</h6>
            </div>
        </div>
    </div>

    @foreach($categoryPosts as $post)
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body" style="width: 600px;">
                    <div style="width: 100%;">
                        <article>
                            <h1>
                                <a href="/post/{{ $post->slug }}">
                                    {{ $post->title }}
                                </a>
                            </h1>

                            <div>
                                {{ $post->body }}
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
