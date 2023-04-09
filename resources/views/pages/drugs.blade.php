@extends('layouts.dashboard')

@section('drugbtn','active')

@section('content')
<div class="card card-frame ">
    <div class="card-body">
        <form action="{{route('drugs.store')}}" method="post">
            @csrf
            <div class="row align-items-center">

                <div class="col-9 align-items-center">
                    <div class="form-group m-0">
                        <input type="text" class="form-control" placeholder="Drugs Name" name="name">
                    </div>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary w-100 m-0">add</button>
                </div>
            </div>
        </form>
    </div>
</div>


@if (session()->has('success'))
<div class="alert alert-info border-0 text-white m-0 mt-2" role="alert">
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

<div class="row">

@forelse($drugs as $drug)


  <div class="col-md-4 mt-4 col-sm-6 col-xl-3">
    <div class="card card-blog card-plain blur-shadow-image" style="background-color: #e9ecef">
      <div class="position-relative">
        <a class="d-block blur-shadow-image">
          <img src="https://ui-avatars.com/api/?name={{$drug->name}}&background=random&size=350&uppercase=false&font-size=0.5" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
        </a>
      </div>
      <div class="card-body px-1 pt-3">
          <h5 class="text-center">
            {{$drug->name}}
          </h5>
        <form action="{{route('drugs.update',$drug->id)}}" method="POST">
            @csrf
            @method('PUT')
          <div class="form-group d-none">
            <input type="text" class="form-control" name="name" value="{{$drug->name}}">
          </div>

          <div class="row w-100 m-0 justify-content-evenly">
              <button type="button" class="btn btn-outline-primary col-5 m-0" onclick="editDrug(this)">Edit</button>
              <button type="submit" class="btn btn-outline-primary col-5 m-0 d-none">Save</button>
              <button type="button" class="btn btn-outline-danger col-5 m-0" data-bs-toggle="modal" data-bs-target="#modal-notification" onclick="deleteform({{$drug->id}})">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @empty

  <div class="col mt-3">
    <div class="card card-frame ">
        <div class="card-body">
            No drug to display
        </div>
    </div>
  </div>
  @endforelse



</div>

{{-- delete modal --}}

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
              <form action="" method="post" id='deleteform'>
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
          </div>
        </div>
      </div>
    </div>

@endsection
