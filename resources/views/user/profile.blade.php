@extends('layouts.app')

@section('title', 'Profile')
@section('content')

<div class="content-warp mt-3">
    @auth
    <div class="card">
        <div class="card-header">
            User Profile
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ Auth::user()->name }} </h5>
            <p class="card-text">Email: {{ Auth::user()->email }}</p>
        
        </div>
    </div>

    <h2>Todos</h2>

    <ul class="list-group">
        @foreach ($todos as $todo)

        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$todo->title}}
            <span class="badge bg-primary rounded-pill">{{$todo->user_id}}</span>
        </li>
        @endforeach
    </ul>
    @endauth

    @guest
        You are not logged in
    @endguest



</div>



@endsection