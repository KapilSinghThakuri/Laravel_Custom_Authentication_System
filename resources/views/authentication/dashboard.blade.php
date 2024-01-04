@extends('layout.app')

@section('content')

<div class="container mt-4 d-flex justify-content-center ">
    <div class="row">
        <div class="col-md-12 col-md-offset-4 ">

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

            <h4 class="text-center" >Welcome To Dashboard</h4>
            <hr>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td><a href="logout">logout</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection