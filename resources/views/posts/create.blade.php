@extends('layouts.app')

@section('content')
    <h1>CREATE POST</h1>

    {{--<form method="post" action="/posts">--}}

    {!! Form::open(['method' => 'post', 'action' => '\App\Http\Controllers\PostsController@store']) !!}
        @csrf

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create a Post', ['class'=>'btn btn-primary']) !!}
    </div>
        {{--<input type="text" name="title" placeholder="Enter title">
        <input type="submit" name="submit">--}}
    {!! Form::close() !!}

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
    @endif
@endsection

@yield('footer')
