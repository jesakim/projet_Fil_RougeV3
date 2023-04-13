@extends('layouts.auth')



@section('content')

<div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Reset Password</h4>
                  <p class="mb-0">Enter new password</p>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif
                  <form method="POST" method="{{route('savenewpassword')}}">
                    @csrf
                    <input type="hidden" value='{{$token}}' name="token">
                    <div class="mb-3">
                      <input type="email" class="form-control form-control-lg" placeholder="Email" name="email" value='{{$email ?  $email : old('email')}}'>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control form-control-lg" placeholder="Enter New Password" name="password" >
                      </div>
                      <div class="mb-3">
                        <input type="password" class="form-control form-control-lg" placeholder="Confirm New Password" name="password_confirmation">
                      </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Reset Password</button>
                    </div>
                  </form>
                </div>
              </div>
</div>

@endsection
