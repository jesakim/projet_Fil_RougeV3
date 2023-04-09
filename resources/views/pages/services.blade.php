@extends('layouts.dashboard')

@section('servbtn','active')


@section('content')

<div class="card card-frame ">
    <div class="card-body">
        <form action="{{route('services.store')}}" method="post">
            @csrf
            <div class="row align-items-center">

                <div class="col-6 align-items-center p-0">
                    <div class="form-group m-0">
                        <input type="text" class="form-control" placeholder="Service Name" name="name">
                    </div>
                </div>
                <div class="col-3 align-items-center p-0 ps-1">
                    <div class="form-group m-0">
                        <input type="number" min="0" step="10" class="form-control" placeholder="Service Price" name="price">
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


{{-- services table --}}

<div class="card mt-3">
    <div class="table-responsive">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Service</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
            <th class="text-secondary opacity-7"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)

          <tr>
            <form action="{{route('services.update',$service->id)}}" method="post">
                @csrf
                @method('PUT')

            <td>
                  <h6 class="m-0 ps-3 text-sm text-wrap">{{$service->name}}</h6>
                  <div class="align-items-center p-0 d-none">
                    <div class="form-group m-0">
                        <input type="text" class="form-control" placeholder="Service Name" name="name" value="{{$service->name}}">
                    </div>
                  </div>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0 ">{{$service->price}}</p>
                <div class="form-group m-0 d-none d-flex col-6">
                    <input type="number" min="0" step="10" class="form-control" placeholder="Service price" name="price" value="{{$service->price}}">
                </div>
            </td>
            <td class="align-middle justify-content-end d-flex">
              <a class="text-info btn btn-link m-0 font-weight-bold" onclick="editServices(this)">
                Edit
              </a>
              <button type="submit"  class="d-none text-info btn btn-link m-0 font-weight-bold">
                Save
              </button>
                <button type="button" class="text-danger btn btn-link m-0 font-weight-bold" data-bs-toggle="modal" data-bs-target="#modal-notification" onclick="serviceDelete({{$service->id}})">
                      delete
                </button>
            </td>
            </form>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>


  {{-- services delete modal --}}

  <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title text-danger" id="modal-title-notification">Would You like to delete this service</h6>
        </div>
        <div class="modal-body p-0">
          <div class="text-center p-0">
              <i class="fa-solid text-danger fa-triangle-exclamation h1" style="font-size: 7rem;"></i>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-link ml-auto text-primary" data-bs-dismiss="modal">Close</button>
            <form action="{{route('services.destroy',4)}}" method="post" id='deleteform'>
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <form action="{{route('services.destroy',8)}}" method="post" id='deleteform'>
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Delete</button>
  </form>

@endsection
