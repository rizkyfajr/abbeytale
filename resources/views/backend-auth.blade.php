@extends('backend.layout.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')
@section('content')

    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
    </div>
    @if(session('error'))
    <div class="alert alert-danger">
        <b>Opps!</b> {{session('error')}}
    </div>
    @endif
    <form action="{{ route('actionlogin') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="email" name="email" class="form-control form-control-user"
                id="exampleInputEmail" aria-describedby="emailHelp"
                placeholder="Enter Email Address...">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-user"
                id="exampleInputPassword" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Log In</button>
      

    </form>


    <hr>
    <div class="text-center">
        <a class="small" href="forgot-password.html">Forgot Password?</a>
    </div>
    <div class="text-center">
        <a class="small" href="register.html">Create an Account!</a>
    </div>



@endsection
