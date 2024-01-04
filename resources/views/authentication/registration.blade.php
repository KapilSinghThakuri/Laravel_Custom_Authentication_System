@extends('layout.app')

@section('content')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row">
        <div class="col-md-8 col-md-offset-4 ">

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
            
            <div class="card" style="width: 400px; height: 420px;">
                <div class="card-header">
                    <h4 class="text-center">Register</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('/registration/registerUser') }}" method="POST">
                        @csrf
                        <div class="form-group m-2">
                            <label for="">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                            <span class="text-danger"> @error('name') {{ $message }} @enderror </span>
                        </div>
                        <div class="form-group m-2">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
                            <span class="text-danger"> @error('email') {{ $message }} @enderror </span>

                        </div>
                        <div class="form-group m-2">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Create New Password" value="{{ old('password') }}">
                            <span class="text-danger"> @error('password') {{ $message }} @enderror </span>

                        </div>
                        <div class="form-group m-2">
                            <button type="submit" class="btn btn-primary ">Register</button>
                        </div>
                    </form>

                    <br>
                    <a href="{{ url('login') }}" class="m-2">Already Register?</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection