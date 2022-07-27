@extends('layouts.main')

@section('title', 'Posts')
  
@section('content')

  <div class="container">
    <h1>Post List</h1>

    <a style="margin-bottom: 10px" href="{{ route('post.create') }}" class="btn btn-outline-primary" tabindex="-1" role="button" >Primary link</a>

    <div class="card" style="padding: 10px">
      <p>Title here</p>
      <p>action buttons here</p>
    <div/>
  </div>
  
@endsection