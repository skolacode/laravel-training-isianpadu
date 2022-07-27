@extends('layouts.main')

@section('title', 'Create Post')
  
@section('content')
  <div class="container">

    <form class="needs-validation" action="{{ route('post.store') }}" method="POST">
      @csrf
      <label for="fname">First name:</label><br>
      <input type="text" id="name" name="name" maxlength="11" value="{{ old('name') }}"><br>

      {{-- METHOD 2 --}}
      @error('name')
        <div class="">
          {{$errors->first('name')}}
        </div>
      @enderror

      <label for="desc">Desc:</label><br>
      <textarea id="desc" name="description">{{ old('description') }}</textarea>
      @error('description')
        <div class="">
          please enter
        </div>
      @enderror
      </br></br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form> 
  </div>
@endsection

@push('scripts')
  <script href="#"></script>
@endpush
