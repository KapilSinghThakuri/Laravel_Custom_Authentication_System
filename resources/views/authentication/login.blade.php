@extends('layout.app')

@section('content')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row">
        <div class="col-md-8">

            @if(session('success'))
                <div class="alert alert-success" style="width: 380px;">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" style="width: 380px;">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card" style="width: 380px; height: 380px;">
                <div class="card-header">
                    <h4 class="text-center">Log In</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/registration/loginUser') }}" method="POST">
                        @csrf
                        <div class="form-group m-2">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Type Your Email" value="{{ old('email') }}">
                            <span class="text-danger"> @error('email') {{ $message }} @enderror </span>
                        </div>
                        <div class="form-group m-2">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Type Correct Password" value="{{ old('password') }}">
                            <span class="text-danger"> @error('password') {{ $message }} @enderror </span>
                        </div>
                        <div class="form-group m-2">
                            <button type="submit" class="btn btn-primary mt-2">Login</button>
                        </div>
                    </form>
                    <br>
                    <a href="{{ url('registration') }}" class="m-2">Not Register?</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection