@extends('admin.auth.layout')
@section('content')
    <!-- Main content -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="" class="h1"><b>Admin</b>Login</a>
        </div>
        <div class="card-body">
            @if(session('error_message'))
                <div class="alert alert-danger">
                    {{ session('error_message') }}
                </div>
            @endif
        
            <form action="{{ route('auth/postLogin') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" value="member@gmail.com" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" value="123456" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
