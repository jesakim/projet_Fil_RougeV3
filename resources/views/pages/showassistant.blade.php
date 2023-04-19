@extends('layouts.dashboard')
@section('pageName','Assistant')


@section('content')

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('reservations.store')}}" method="POST">
                @csrf
            <input type="hidden" name="patient_id" value="{{$user->id}}">
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Reservation date</label>
                <input type="datetime-local" class="form-control" id="exampleFormControlInput1" name='date'>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-gradient-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
<div class="card-body bg-white p-3 rounded-3">
    <div class="row gx-4 align-items-center">
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
            {{$user->phone}}
        </p>
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

<div class="row g-3 mt-3">
<div class="col-md-9 patientTab m-0" id="infoTab">
    <div class="card">
    <div class="card-body">
    <p class="text-uppercase text-bold">assistant Information</p>
    <div class="row align-items-center">
        <form action="{{route('assistant.update',$user->id)}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{$user->id}}" name="id">
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

<div class="col-md-3 m-0 mt-3">
    <form action="{{route('assistant.activate',$user->id)}}" method="post">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-{{$user->isactive ? 'danger' : 'success'}} col-12">{{$user->isactive ? 'Deactivate' : 'Activate'}}</button>
    </form>
    <button type="button" class="btn btn-danger col-12" data-bs-toggle="modal" data-bs-target="#modal-notification">Delete Assistant</button>

</div>

</div>

<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title text-danger" id="modal-title-notification">Would You like to delete this grug</h6>
          </div>
          <div class="modal-body p-0">
            <div class="text-center p-0">
                <i class="fa-solid text-danger fa-triangle-exclamation h1" style="font-size: 7rem;"></i>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-link ml-auto text-primary" data-bs-dismiss="modal">Close</button>
              <form action="{{route('assistant.destroy',$user->id)}}" method="post" id='deleteform'>
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
          </div>
        </div>
      </div>
</div>




@endsection
