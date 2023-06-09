@extends('layouts.dashboard')

@section('assisbtn','active')
@section('pageName','Assistants')


@section('content')
<div class="d-flex">
    <button type="submit" class="btn btn-success m-0 ms-auto" data-bs-toggle="modal" data-bs-target="#addAssistantModal">Ajouter un(e) assistant(e)</button>
</div>

{{-- <div class="card card-frame ">
    <div class="card-body">
        <form action="{{route('assistant.store')}}" method="post">
            @csrf
            <div class="row g-1 align-items-center">

                <div class="col-12 mb-1 align-items-center p-0">
                    <div class="form-group m-0">
                        <input type="text" class="form-control" placeholder="Assistant Name" name="name">
                    </div>
                </div>
                <div class="col-9 align-items-center p-0">
                    <div class="form-group m-0">
                        <input type="email" class="form-control" placeholder="Assistant Email" name="email">
                    </div>
                </div>
                <div class="col-3 ps-1">
                    <button type="submit" class="btn btn-primary w-100 m-0">Add</button>
                </div>
            </div>
        </form>
    </div>
</div> --}}

<div class="modal fade" id="addAssistantModal" tabindex="-1" role="dialog" aria-labelledby="addAssistantModal" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-notification">Ajouter un(e) assistant(e)</h6>
        </div>
        <div class="modal-body">
            <form action="{{route('assistant.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Le prenom</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="prenom" name="fname">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Le nom</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nom" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">L'email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="assistant@gmail.com" name="email">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-link m-0  text-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary m-0">Ajouter</button>
        </form>
        </div>
      </div>
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


{{-- Assistants table --}}


<div class="card mb-4 mt-3">
    <div class="card-header pb-0">
        <h6>Assistants table</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)

                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="https://ui-avatars.com/api/?name={{$user->name}}&background=random&size=350&uppercase=false&font-size=0.5" class="avatar avatar-sm me-3">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-xs">{{$user->name}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$user->email}}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-{{$user->isactive ? 'success' : 'danger'}}">{{$user->isactive ? 'Active' : 'Non Active'}}</span>
                    </td>
                    <td class="align-middle">
                      <a href="{{route('assistant.show',$user->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Show
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>


@endsection
