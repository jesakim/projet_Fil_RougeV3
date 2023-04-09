@extends('layouts.dashboard')


@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-end">
{{-- <button class="btn bg-success text-white m-1 text-nowrap">
        <i class="me-1 fa-solid fa-hospital-user"></i>
        Info
    </button> --}}
    <button class="btn bg-success text-white m-1 text-nowrap">
        <i class="me-1 fa-solid fa-coins"></i>
        facture
    </button>
    <x-make_ordonnance_modal :id="$patient->id" :drugs="$drugs"/>
    <x-make_reservation_modal :id="$patient->id"/>

 </div>

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
            <input type="hidden" name="patient_id" value="{{$patient->id}}">
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
        <img src="https://ui-avatars.com/api/?name={{$patient->name}}&background=random&size=350&uppercase=false&font-size=0.5" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
        </div>
        </div>
    <div class="col-auto my-auto">
        <div class="h-100">
        <h5 class="mb-1">
            {{$patient->name}}
        </h5>
        <p class="mb-0 font-weight-bold text-sm">
            {{$patient->phone}}
        </p>
        </div>
    </div>

    </div>
    <style>
        .patient-item.active{
            background-color: #5E73E4;
            color: white;
            padding: 5px 10px ;
            border-radius: 5px;
                }
        .patient-item{
            padding: 5px 10px ;
            border-radius: 5px;
            cursor: pointer;
                }
        .patient-item:hover{
            background-color: #465ddf;
            color: white;

                }
    </style>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb m-0">
          <li class="patient-item active" onclick="switchTab(this,'infoTab')">Info</li>
          <li class="patient-item ms-1" onclick="switchTab(this,'reservationsTab')" >Reservations</li>
          <li class="patient-item ms-1" onclick="switchTab(this,'ordonnacesTab')" >Ordonnances</li>
          <li class="patient-item ms-1" onclick="switchTab(this,'facturesTab')" >Factures</li>
        </ul>
      </nav>
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
<div class="col-12 d-none patientTab m-0" id="infoTab">
    <div class="card">
    <div class="card-body">
    <p class="text-uppercase text-bold">Patient Information</p>
    <div class="row align-items-center">
        <form action="{{route('patients.update',$patient->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="col">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Patient name</label>
                    <input class="form-control pat-int" type="text" value="{{$patient->name}}" disabled name="name">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Patient phone</label>
                    <input class="form-control pat-int " type="text" value="{{$patient->phone}}" disabled name="phone">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Patient assurance</label>
                    <select class="form-control pat-int" id="exampleFormControlSelect1" disabled name="assurance_id">
                        @foreach ($assurances as $assurance)
                        <option value="{{$assurance->id}}" {{$assurance->id == $patient->assurance_id ? 'selected' : ''}}>{{$assurance->name}}</option>
                        @endforeach
                    </select>
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

<div class="col-12 d-none patientTab m-0" id="reservationsTab">
    <div class="card mb-4">
    <div class="card-header pb-0">
    <h6>Reservations</h6>
    </div>
    <div class="card-body p-0">
    <div class="table-responsive p-0">
     <table class="table align-items-center justify-content-center mb-0 ">
    <thead>
    <tr>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
    <th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($patient->reservations as $reservation)


    <tr>
        <td>
        <div class="d-flex ps-3">
        <img src="https://ui-avatars.com/api/?name={{$patient->name}}&background=random&size=350&uppercase=false&font-size=0.5" class="avatar avatar-sm rounded">
        </div>
        </td>
        <td>
        <p class="text-sm font-weight-bold mb-0">{{\Carbon\Carbon::parse($reservation->date)->format('d/m/Y')}} </p>
        </td>
        <td>
        <span class="badge bg-gradient-{{strtotime($reservation->date)>time() ? 'warning' :( $reservation->didcome ? 'success' : 'danger')}}"> {{\Carbon\Carbon::parse($reservation->date)->diffForHumans()}}</span>
        </td>
        <td class="">
        @if(strtotime('today') == strtotime(\Carbon\Carbon::parse($reservation->date)->format('d-m-Y')) && !$reservation->didcome)
        <div class=" d-flex align-items-center justify-content-end">
            <form action="{{route('reservations.didcome',$reservation->id)}}" method="post">
                @csrf
                @method('PUT')
                <button class="btn btn-info m-0" type="submit">
                    Did come
                </button>
            </form>
        </div>
            @endif
        </td>
    </tr>
    @endforeach


    </tbody>
    </table>
    </div>
    </div>
    </div>
</div>

<div class="col-12 patientTab m-0" id="ordonnacesTab">
    <div class="card mb-4">
    <div class="card-header pb-0">
    <h6>Ordonnances</h6>
    </div>
    <div class="card-body p-0">
    <div class="table-responsive p-0">
     <table class="table align-items-center justify-content-center mb-0 ">
    <thead>
    <tr>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
    <th></th>
    </tr>
    </thead>
    <tbody>
        @forelse($patient->ordonnances as $ordonnance)
    <tr>
        <td>
        <div class="d-flex ps-3">
        <img src="https://ui-avatars.com/api/?name={{$patient->name}}&background=random&size=350&uppercase=false&font-size=0.5" class="avatar avatar-sm rounded">
        </div>
        </td>
        <td>
        <p class="text-sm font-weight-bold mb-0">{{\Carbon\Carbon::parse($ordonnance->created_at)->format('d/m/Y')}} </p>
        </td>
        <td>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="btn btn-icon btn-3 btn-primary m-0 " type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->index}}" aria-expanded="false" aria-controls="collapse{{$loop->index}}">
                        <span class="btn-inner--text">Ordonnance Drugs</span>
                        <i class="ms-3 fa-solid fa-chevron-down"></i>
                    </button>
                  </h2>
                  <div id="collapse{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body p-0 pt-1">
                        <ul class="text-dark m-0 ps-4">
                            @foreach ($ordonnance->drugs as $drug)

                            <li>{{$drug->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                  </div>
                </div>
            </div>


        </td>
        <td class="">
        <div class=" d-flex align-items-center justify-content-end">
            <form action="{{route('ordonnances.downloadPdf',$ordonnance->id)}}" method="post">
                @csrf
                <button class="btn btn-info m-0" type="submit">
                    Print
                </button>
            </form>
        </div>
        </td>
    </tr>
    @empty
    <tr>
        <td></td>
        <td>No Ordonnance for this user to show</td>
        {{-- <td></td> --}}
        {{-- <td></td> --}}
    </tr>
    @endforelse


    </tbody>
    </table>
    </div>
    </div>
    </div>
</div>

<div class="col-12 d-none patientTab m-0" id="facturesTab">
    <div class="card mb-4">
    <div class="card-header pb-0">
    <h6>Factures</h6>
    </div>
    <div class="card-body p-0">
    <div class="table-responsive p-0">
     <table class="table align-items-center justify-content-center mb-0 ">
    <thead>
    <tr>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
    <th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($patient->reservations->take(3) as $reservation)


    <tr>
        <td>
        <div class="d-flex ps-3">
        <img src="https://ui-avatars.com/api/?name={{$patient->name}}&background=random&size=350&uppercase=false&font-size=0.5" class="avatar avatar-sm rounded">
        </div>
        </td>
        <td>
        <p class="text-sm font-weight-bold mb-0">{{\Carbon\Carbon::parse($reservation->date)->format('d/m/Y')}} </p>
        </td>
        <td>
        <span class="badge bg-gradient-{{strtotime($reservation->date)>time() ? 'warning' :( $reservation->didcome ? 'success' : 'danger')}}"> {{\Carbon\Carbon::parse($reservation->date)->diffForHumans()}}</span>
        </td>
        <td class="">
        @if(strtotime('today') == strtotime(\Carbon\Carbon::parse($reservation->date)->format('d-m-Y')) && !$reservation->didcome)
        <div class=" d-flex align-items-center justify-content-end">
            <form action="{{route('reservations.didcome',$reservation->id)}}" method="post">
                @csrf
                @method('PUT')
                <button class="btn btn-info m-0" type="submit">
                    Did come
                </button>
            </form>
        </div>
            @endif
        </td>
    </tr>
    @endforeach


    </tbody>
    </table>
    </div>
    </div>
    </div>
</div>

</div>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<div class="form-group w-100">
    <select class="selectpicker w-100" data-live-search="true">
        @foreach ($assurances as $assurance)
        <option value="{{$assurance->id}}" {{$assurance->id == $patient->assurance_id ? 'selected' : ''}}>{{$assurance->name}}</option>
        @endforeach
    </select>
</div> --}}




@endsection
