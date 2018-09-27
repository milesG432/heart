@extends('layouts.app')

@section('content')
<div class="container" id="formContainer">
    <div id="loginForm">    
        <!-- Default form login -->
        <form class="text-center border border-light p-5" method="post" action="/authenticate">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p class="h4 mb-4">Sign in</p>
            <!-- Email -->
            <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" name="email" placeholder="E-mail" required="required">
            <!-- Password -->
            <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="password" placeholder="Password" required="required">
            <div class="d-flex justify-content-around">
                <div>
                    <!-- Remember me -->
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                        <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                    </div>
                </div>
                <div>
                    <!-- Forgot password -->
                    <a href="">Forgot password?</a>
                </div>
            </div>

            <!-- Sign in button -->
            <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

            <!-- Register -->
            <p>Not a member?
                <a href="">Register</a>
            </p>            
            
        </form>
<!-- Default form login -->
    </div>
</div>
@endsection
