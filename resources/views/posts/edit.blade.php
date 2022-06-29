@extends('layouts.app')

@section('content')
    <h1>EDIT POST</h1>

    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['\App\Http\Controllers\PostsController@update',  $post->id]]) !!}
        {{csrf_field()}}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', $post->title, ['class'=>'form-control']) !!}
            {!! Form::submit('Update a Post', ['class'=>'btn btn-primary']) !!}
        </div>
        <br>
    {!! Form::close() !!}

    {!! Form::model($post, ['method' => 'DELETE', 'action' => ['\App\Http\Controllers\PostsController@destroy',  $post->id]]) !!}
    {{csrf_field()}}

    <div class="form-group">
        {!! Form::submit('Delete a Post', ['class'=>'btn btn-danger']) !!}
    </div>
    <br>
    {!! Form::close() !!}

    {{--<form method="post" action="/posts/{{$post->id}}">
        @csrf
        <input type= "hidden" name="_method" value="PUT">
        <input type="text" name="title" placeholder="Enter title" value="{{$post->title}}">
        <input type="submit" name="submit">
    </form>

    <form method="post" action="/posts/{{$post->id}}">
        @csrf
        <input type= "hidden" name="_method" value="DELETE"><br>
        <input type="submit" value="DELETE">
    </form>--}}
@endsection
