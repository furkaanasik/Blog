@extends('layout')

@section('content')
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
