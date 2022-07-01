@extends('Admin.adminDashboardLayout')
@section('content')
    @foreach($users as $user)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->email }}</h5>
                <h5 class="card-title">{{ $user->name }}</h5>

                <p class="card-text">{{ $user->created_at->diffForHumans() }}</p>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#change_rule{{$user->id}}">
                    Change role
                </button>

                <!-- Modal -->
                <div class="modal fade" id="change_rule{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Change {{ $user->email }} rule?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('admin.change.user.role', [$user]) }}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Change</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete{{$user->id}}">
                    Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Delete {{ $user->email }} user?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('admin.delete.user', [$user]) }}" method="POST">
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
