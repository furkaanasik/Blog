@extends('Admin.adminDashboardLayout')

@section('posts')
    @foreach($posts as $post)
        <div class="card">
            <h5 class="card-header">{{ $post->title }}</h5>
            <div class="card-body">
                <h5 class="card-title">{{ $post->slug }}</h5>
                <p class="card-text">{{ $post->body }}</p>
                <a href="{{ route('get.post', [$post->slug]) }}" class="btn btn-primary">Go Post</a>
                <a href="{{ route('admin.edit.post', [$post]) }}" class="btn btn-primary">Edit</a>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete">
                    Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Delete this post's?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('admin.delete.post', [$post]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
