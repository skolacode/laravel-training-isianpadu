@extends('layouts.main')

@section('title', 'Login')

@section('content')

  <form action="{{ route('auth.login.attempt') }}" method="POST">
    @csrf
    <input name="email" type="text" placeholder="Enter your username" />

    <input name="password" type="password" placeholder="Enter your password" />

    <button type="submit" class="btn btn-sm btn-primary">Login</button>
  </form>

@endsection