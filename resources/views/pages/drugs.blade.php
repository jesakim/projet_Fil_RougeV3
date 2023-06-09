@extends('layouts.dashboard')

@section('drugbtn','active')
@section('pageName','Drugs')

@section('content')
{{-- <div class="card card-frame ">
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
</div> --}}


<div class="card card-frame ">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="form-group m-0 col-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input class="form-control" placeholder="Search" type="search" onkeyup="drugSearch(this)">
                </div>
                </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary w-100 m-0" data-bs-toggle="modal" data-bs-target="#addDrugModal">Ajouter un médicament</button>
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

<div class="row">

@forelse($drugs as $drug)


  <div class="col-md-4 mt-4 col-sm-6 col-xs-6 col-xl-3 drug-card" data-search-name="{{$drug->name}}">
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
          <div class="row w-100 m-0 justify-content-evenly">
              <button type="button" class="btn btn-outline-primary col-5 m-0" data-bs-toggle="modal" data-bs-target="#addDrugModal" onclick="editDrug({{$drug}})">Modifier</button>
              <button type="button" class="btn btn-outline-danger col-5 m-0" data-bs-toggle="modal" data-bs-target="#modal-notification" onclick="deleteform({{$drug->id}})">Delete</button>
          </div>
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



    <div class="modal fade" id="addDrugModal" tabindex="-1" role="dialog" aria-labelledby="addDrugModal" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Ajouter un médicament</h6>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Le nom du médicament</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">La catégorie du médicament</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link m-0  text-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary m-0">Ajouter</button>
            </div>
          </div>
        </div>
      </div>

@endsection
