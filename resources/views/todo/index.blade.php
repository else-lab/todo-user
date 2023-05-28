@extends('layouts.app')

@section('title', 'Todo List')
@section('content')

<h1>All Todo List</h1>

<ul class="list-group">
    @foreach ($todos as $todo)

      <li class="list-group-item d-flex justify-content-between align-items-center">
        {{$todo->title}}
        <span class="badge bg-primary rounded-pill">{{$todo->user_id}}</span>
      </li>
    @endforeach
  </ul>

@endsection
