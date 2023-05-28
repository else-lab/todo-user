@extends('layouts.app')

@section('title', 'New Todo')
@section('content')

<h1>New Todo</h1>
@auth
<form action="/todo" method="POST">
  @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group my-3">
    <label for="is_done">Todo Completed?</label>
    <select class="form-control" id="is_done" name="is_done">
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endauth

@guest
  <p>Please login to add new todos</p>
@endguest


@endsection
