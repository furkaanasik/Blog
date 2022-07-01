@extends('Admin.adminDashboardLayout')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header">Admin Create Post</div>
                    <div class="card-body" style="width: 600px;">
                        <form action="{{ route('admin.create.post') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="slug" class="col-md-4 col-form-label text-md-right">Category</label>
                                <div class="col-md-6">
                                    @foreach($categories as $key => $value)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="categories[]" id="option" value="{{$key}}">
                                            <label class="form-check-label" for="inlineCheckbox1">{{ $value }}</label>
                                        </div>
                                    @endforeach

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

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right" style="float:left;">Title</label>
                                <div class="col-md-6" style="float:right;">
                                    <input type="text" id="title" class="form-control" name="title" required autofocus>
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="body" class="col-md-4 col-form-label text-md-right" style="float:left;">Body</label>
                                <div class="col-md-6" style="float:right;">
                                    <textarea id="body" class="form-control" name="body" style="height: 300px;" cols="40" rows="5"></textarea>
                                    @if ($errors->has('body'))
                                        <span class="text-danger">{{ $errors->first('body') }}</span>
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
