@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">
        <h1>Create A Post</h1>

        <form method="post" action="{{url('/posts')}}">

            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title">
            </div>
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" id="body" placeholder="Body" name="body"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>

            @include('layouts.errors')

        </form>
    </div>
@endsection