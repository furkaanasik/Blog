@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body" style="width: 600px;">
                <div style="width: 100%;">
                    <article>
                        <h1>{{ $post->title }}</h1>
                        <p>{{ $post->created_at->diffForHumans() }}</p>

                        <div>
                            @foreach($categories as $category)
                                <a href="{{ route('get.categories.posts', [$category->slug]) }}" class="btn btn-dark">{{ $category->name }}</a>
                            @endforeach
                        </div>

                        <br>
                        <br>
                        <div>
                            {{ $post->body }}
                        </div>

                        <br>
                        <a href="/">Go Back</a>
                    </article>

                    <br>
                    <br>
                    <label for="comments" style="margin: auto">Comments</label>

                    <form action="{{ route('create.comment', [$post->id, $post->slug]) }}" method="POST">
                        @csrf
                        <textarea id="body" class="form-control" name="body" style="height: 100px;" cols="40" rows="5"></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>

                    <div class="comment mt-4 text-justify float-left" style="border:black">
                        @foreach($comments as $comment)
                            <h4>{{$comment->owner}}</h4>

                            <time>{{ $comment->created_at->diffForHumans() }}</time>

                            <p>{{$comment->body}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
