@extends('layouts.dashboard')

@section('pageName','Profile')

@section('content')

<div class="card">
    <div class="card-body p-3">
        <div class="row gx-4">
        <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
                <img src="https://ui-avatars.com/api/?name={{$user->name}}&background=random&size=350&uppercase=false&font-size=0.5" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
        </div>
        <div class="col-auto my-auto">
            <div class="h-100">
                <h5 class="mb-1">
                    {{$user->name}}
                </h5>
                <p class="mb-0 font-weight-bold text-sm">
                    {{$user->email}}
                </p>
            </div>
        </div>
        </div>
    </div>
</div>



@if (session()->has('success'))
<div class="alert alert-success  border-0 text-white m-0 mt-2" role="alert">
    {{ session()->get('success') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger border-0 alert-dismissible fade show m-0 mt-2" role="alert">
    <ul class="m-0">
        @foreach ($errors->all() as $error)
            <li class="text-white">{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row gy-3 mt-3">
<div class="col-md-6 patientTab mt-3 m-0" id="infoTab">
    <div class="card">
    <div class="card-body">
    <p class="text-uppercase text-bold">Information</p>
    <div class="row align-items-center">
        <form action="{{route('profile.changeinfo',$user->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="col">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Assistant name</label>
                    <input class="form-control pat-int" type="text" value="{{$user->name}}" disabled name="name">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Assistant email</label>
                    <input class="form-control pat-int " type="text" value="{{$user->email}}" disabled name="email">
                </div>
            </div>
            <div class="col">
                <div class="form-group mt-3 m-0">
                    <button type="button" class="btn btn-primary w-100 m-0" onclick="editPatient(this)">Edit</button>
                    <button type="submit" class="btn btn-primary w-100 d-none m-0">Save Changes</button>
                </div>
            </div>
        </form>
    </div>

    </div>
    </div>
</div>

<div class="col-md-6 m-0 mt-3">
    <div class="card">
        <div class="card-body">
        <p class="text-uppercase text-bold">Change Password</p>
        <div class="row align-items-center">
            <form action="{{route('profile.changepassword',$user->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="form-group">
                        <label class="form-control-label">Current password</label>
                        <input class="form-control pass-int" type="password" disabled name="currentpass">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label  class="form-control-label">New password</label>
                        <input class="form-control pass-int" type="password" disabled name="newpass">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label  class="form-control-label">new password confirmation</label>
                        <input class="form-control pass-int" type="password" disabled name="newpass_confirmation">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mt-3 m-0">
                        <button type="button" class="btn btn-primary w-100 m-0" onclick="editPatient(this,'pass-int')">Edit</button>
                        <button type="submit" class="btn btn-primary w-100 d-none m-0">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>

        </div>
        </div>
</div>

</div>





@endsection
