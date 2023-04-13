@extends('layouts.auth')



@section('content')

<div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Reset Password</h4>
                  <p class="mb-0">Enter your email address to recieve reset password email</p>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif
                  <form method="POST" method="{{route('resetpassword')}}">
                    @csrf
                    <div class="mb-3">
                      <input type="email" class="form-control form-control-lg" placeholder="Email" name="email">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Reset Password</button>
                    </div>
                  </form>
                </div>
              </div>
</div>

@endsection
