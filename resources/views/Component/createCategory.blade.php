@extends('Admin.adminDashboardLayout')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header">Admin Create Category</div>
                    <div class="card-body" style="width: 600px;">
                        <form action="{{ route('admin.create.category') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right" style="float:left;">Name</label>
                                <div class="col-md-6" style="float:right;">
                                    <input type="text" id="name" class="form-control" name="name" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label text-md-right" style="float:left;">Slug</label>
                                <div class="col-md-6" style="float:right;">
                                    <input type="text" id="slug" class="form-control" name="slug" required autofocus>
                                    @if ($errors->has('slug'))
                                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
