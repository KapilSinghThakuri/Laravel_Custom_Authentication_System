@extends('layout.app')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Log In</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/registration/loginUser') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Type Your Email" value="{{ old('email') }}">
                            <span class="text-danger"> @error('email') {{ $message }} @enderror </span>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Type Correct Password" value="{{ old('password') }}">
                            <span class="text-danger"> @error('password') {{ $message }} @enderror </span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-2">Login</button>
                        </div>
                    </form>
                    <br>
                    <a href="{{ url('registration') }}">Not Register?</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection