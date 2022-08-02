@extends('layouts.main')

@section('content')
        <div >
            
            @auth
                <p>Welcome to this page</p>

                <p>Please create a POST</p>
            @endauth

            @guest
                <p>Welcome to this page</p>

                <p>Please login</p>
            @endguest
        </div>

@endsection