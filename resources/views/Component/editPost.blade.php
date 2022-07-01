@extends('Admin.adminDashboardLayout')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-4">Update a Post</h1>
            <form action="{{ route('admin.update.post', [$post]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group row">
                    <label for="slug" class="col-md-4 col-form-label text-md-right">Category</label>
                    <div class="col-md-6">
                        @foreach($categories as $key => $value)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="categories[]" id="option" value="{{$key}}"
                                    @foreach($checkedbox as $checkbox)
                                        @if($checkbox->name == $value)
                                            checked
                                        @endif
                                    @endforeach
                                >
                                <label class="form-check-label" for="inlineCheckbox1">{{ $value }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" class="form-control" name="slug" value={{ $post->slug }} />
                    @if ($errors->has('slug'))
                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" value={{ $post->title }} />
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="body" class="col-md-4 col-form-label text-md-right" style="float:left;">Body</label>
                    <textarea id="body" class="form-control" name="body" style="height: 300px;" cols="40" rows="5">{{ $post->body }}</textarea>
                    @if ($errors->has('body'))
                        <span class="text-danger">{{ $errors->first('body') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
