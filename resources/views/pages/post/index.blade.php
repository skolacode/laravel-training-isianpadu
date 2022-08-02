@extends('layouts.main')

@section('title', 'Posts')
  
@section('content')

  <div class="container">
    <h1 style="margin-top: 15px; margin-bottom: 15px">Post List</h1>

    <a style="margin-bottom: 10px" href="{{ route('post.create') }}" class="btn btn-outline-primary btn-sm" role="button">Create Post</a>


    @foreach ($currency as $curr) 

      <p>{{ $curr->currency_code }}</p>
      <p>{{ $curr->unit }}</p>
      <p>{{ $curr->rate->buying_rate }}</p>
      
    @endforeach

    @foreach ($posts as $post)
      <div class="card" style="padding: 10px; max-width: 400px; margin-bottom: 20px">
        <p style="font-size: 20px; color: #a18888">{{ $post->name }}</p>

        <p>Email:</p>
        <p>{{ $post->user->email }}</p>
        
        <span style="font-size: 12px; color: #cdcdcd">Description</span>
        <p>{{ $post->description }}</p>

        <div class="table">
          <a class="btn btn-secondary btn-sm" href="{{ route('post.edit', ['id' => $post->id]) }}">Edit</a>
          <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </div>
      </div>
    @endforeach

  </div>

    <nav aria-label="Page navigation example">
      <ul class="pagination">
        {{ $posts->links("pagination::bootstrap-5") }}
      </ul>
    </nav>
  
@endsection