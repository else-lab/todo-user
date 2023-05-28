@extends('layouts.app')

@section('title', 'Register')
@section('content')

<h1>Register</h1>

<form action="/register" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label @error('name') is-invalid @enderror">Name</label>
        <input type="text" class="form-control" id="name" name="name">
          @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
          @endif
    </div>
    <div class="mb-3">
      <label for="email_address" class="form-label @error('email') is-invaild @enderror">Email address</label>
      <input type="email" class="form-control" id="email" name="email">
      @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
      @endif
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    @if ($errors->has('password'))
      <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif

    <div class="mb-3">
        <label for="confirm_password" class="form-label @error('password') is-invalid @enderror">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

 <div class="error-block mt-3">  
    @if ($errors->any())
    <h3>Second Error Block</h3>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
  </div>

 </div>


@endsection
