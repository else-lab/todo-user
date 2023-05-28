@extends('layouts.app')

@section('title', 'Login')
@section('content')

<h1>Login</h1>

<form action="/login" method="POST" class="my-3">
  @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" value="admin@local.test">

  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <h4>Default username: admin@local.test </h4>
  <h4>Default password: password</h4>

@endsection
