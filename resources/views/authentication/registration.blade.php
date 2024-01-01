@extends('layout.app')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 ">

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
                    <h4 class="text-center">Register</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('/registration/registerUser') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                            <span class="text-danger"> @error('name') {{ $message }} @enderror </span>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
                            <span class="text-danger"> @error('email') {{ $message }} @enderror </span>

                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Create New Password" value="{{ old('password') }}">
                            <span class="text-danger"> @error('password') {{ $message }} @enderror </span>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-2">Register</button>
                        </div>
                    </form>

                    <br>
                    <a href="{{ url('login') }}">Already Register?</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection