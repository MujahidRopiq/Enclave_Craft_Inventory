@extends('layouts.auth') @section('content')
<body class="login-page" style="min-height: 466px;">
    <div class="login-box">

    <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <a href="#" class="h1"><b>Sign In</b></a>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-8">
                <p class="badge badge-primary">Email: admin@gmail.com </p>
            </div>
            <div class="col-4">
                <p class="badge badge-primary">Pass: admin123 </p>
            </div>
        </div>
    <form action="{{ route('login') }}" method="post">
        @csrf
    <div class="input-group mb-3">
    <input type="email" class="form-control" name="email" placeholder="Email" required>
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-envelope"></span>
    </div>
    </div>
    </div>
    <div class="input-group mb-3">
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-lock"></span>
    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-8">
            <a href="/register">
                <p class="badge badge-info">Membuat akun baru?</p>
            </a>
        </div>

        <div class="col-4">
            <button type="submit" class="btn btn-danger btn-block">Sign In</button>
        </div>

    </div>
</form>



    <script src="../../plugins/jquery/jquery.min.js"></script>

    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>


    </body>
