@extends('layouts.auth')



@section('content')

<div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign In</h4>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                @endif
                  <form method="POST" method="{{route('Signin')}}">
                    @csrf
                    <div class="mb-3">
                      <input type="email" class="form-control form-control-lg" placeholder="Email" name="email">
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" placeholder="Password" name="password">
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" value="true" name="rememberme" id="rememberMe">
                      <label class="form-check-label" for="rememberMe" >Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Forgot your password ?
                    <a href="{{route('showresetpassword')}}" class="text-primary text-gradient font-weight-bold">Reset password</a>
                  </p>
                </div>
              </div>
</div>

@endsection
