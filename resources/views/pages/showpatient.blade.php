@extends('layouts.dashboard')

@section('pageName','Patient')

@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-end mb-1">
{{-- <button class="btn bg-success text-white m-1 text-nowrap">
        <i class="me-1 fa-solid fa-hospital-user"></i>
        Info
    </button> --}}

    {{-- <x-facture_modal :id="$patient->id" :services="$services"/> --}}
    <x-make_ordonnance_modal :id="$patient->id" :drugs="$drugs"/>
    {{-- <x-make_reservation_modal :id="$patient->id"/> --}}

 </div>

<div class="card">
    <div class="dropdown position-absolute top-0 end-0">
        <button class="btn btn-icon shadow-none  pt-2 px-2 m-0 mx-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="btn-inner--icon"><i class="fa-solid fa-ellipsis-vertical text-dark fs-5"></i></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><button class="btn w-100 shadow-none p-0 py-1 m-0 text-primary" type="button" data-bs-toggle="modal" data-bs-target="#editPatient"><i class="fas fa-user-edit me-2"></i> Modifier</button></li>
          <li><button class="btn w-100 shadow-none p-0 py-1 m-0 text-danger" type="button" data-bs-toggle="modal" data-bs-target="#modal-notification"><i class="fas fa-user-times me-2"></i>Archiver</button></li>
        </ul>
      </div>
<div class="card-body p-3 rounded-3">
    <div class="d-flex align-items-center">
        <div class="me-3">
            <div class="avatar avatar-xl position-relative">
            <img src="https://ui-avatars.com/api/?name={{$patient->name}}&background=random&size=350&uppercase=false&font-size=0.5" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
        </div>

        <div class="">
            <h4 class="mb-1">
                <i class="fa-solid fa-venus female me-1"></i>
                {{$patient->name}}
            </h4>
            <h6 class="mb-1 font-weight-bold ">
                <i class="fa-solid text-primary fa-cake-candles me-1"></i>
                12/12/2222 - 23 ans
            </h6>
            <a href="tel:{{$patient->phone}}" class="mb-1 font-weight-bold">
                <i class="fa-solid text-primary fa-phone me-1"></i>
                {{$patient->phone}}
            </a>
            <div class="mb-1 font-weight-bold d-flex align-items-center">
                <i class="fa-solid text-primary fa-shield-heart me-1"></i>
                <span class="badge rounded-pill py-1 px-2 bg-secondary">{{$patient->assurance->name}}</span>
            </div>
        </div>
        {{-- <div class="col-auto ms-auto me-0">
            <button type="button" class="btn btn-danger col-12" data-bs-toggle="modal" data-bs-target="#modal-notification">Delete Patient</button>

            @if (!$patient->isconfirmed)
                <form action="{{route('comfirmpatient',$patient->slug)}}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-success w-100">Confirm</button>
                </form>
            @endif
        </div> --}}
        <div class="ms-auto me-3">
            <p class="mb-1 font-weight-bold text-sm">
                <i class="fa-solid text-primary fa-user-plus"></i>
                cree le : 12/12/1212
            </p>
            <p class="mb-1 font-weight-bold text-sm">
                <i class="fa-solid text-primary fa-coins"></i>
                Total à payer : <span class="text-dark fw-bolder">1000 Dhs</span>
            </p>
            <p class="mb-1 font-weight-bold text-sm">
                <i class="fa-solid text-primary fa-hand-holding-dollar"></i>
                Total reçu : <span class="text-success fw-bolder">250 Dhs</span>
            </p>
            <p class="mb-1 font-weight-bold text-sm">
                <i class="fa-solid text-primary fa-coins"></i>
                Total reste : <span class="text-danger fw-bolder">750 Dhs</span>
            </p>
            <p class="mb-1 font-weight-bold text-sm">
                <i class="fa-regular fa-calendar text-primary"></i>
                Le dernier rendez-vous : 12/12/1212
            </p>
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
                .female{
                    color: pink;
                }
                .dropdown-menu:not(.show){
                    display: none;
                }
                .dropdown .dropdown-menu:before{
                    content: '';
                }
                .tabBtn{
                    /* color: black; */
                    cursor: pointer;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;

                }
                .tabBtn:hover path, .tabBtn:hover{
                    fill:#5E73E4;
                    color: #5E73E4
                }
                .tabBtn .imgBtn{
                    width: 30px;
                    margin: 0;
                }
                .tabBtn.active{
                    fill:#5E73E4;
                    color: #5E73E4;
                    border-bottom: solid 2px #5E73E4;
                }
                .tabBtn.active svg path{
                    fill:#5E73E4;
                }
                .crown,.tooth,.root {
                    stroke: #3b3b3b;
                    stroke-width: .3px;
                    stroke-linejoin: round;
                    cursor: pointer;
                }

                .crown:hover,.tooth:hover,.root:hover {
                    fill:#5E73E4;
                }

                .crown,.tooth{ fill: #f0f0f0; }

                .root{ fill: #F2ECBE; }

                /* .lower_schema{
                    background-color:#5E73E4;
                } */
    </style>
    {{-- <nav aria-label="breadcrumb">
        <ul class="breadcrumb m-0">
          <li class="patient-item active" onclick="switchTab(this,'infoTab')">Info</li>
          <li class="patient-item ms-1" onclick="switchTab(this,'reservationsTab')" >Reservations</li>
          <li class="patient-item ms-1" onclick="switchTab(this,'ordonnacesTab')" >Ordonnances</li>
          <li class="patient-item ms-1" onclick="switchTab(this,'facturesTab')" >Factures</li>
        </ul>
      </nav> --}}
</div>
<div class="card-footer m-0 pt-0 px-2 pb-2 d-flex">
    <div>
        <span class="badge bg-success rounded-pill">Active</span>
        <a href="https://wa.me/+2126{{substr($patient->phone,0,8)}}" target="_blank" class="btn btn-outline-success rounded-pill py-0 px-3 m-0">
            <i class="fa-brands fa-whatsapp fs-4"></i>
        </a>

    </div>
    <div class="ms-auto d-flex">
    <button type="button" class="btn btn-primary btn-sm py-1 pe-3 ps-2 m-0 mx-1 rounded-pill"> <i class="fa-regular fa-calendar text-white me-1"></i> Nouveau RDV</button>
    @livewire('patient-waiting-btn',['patient_id' => $patient->id])
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
<div class="col-12 patientTab m-0" id="infoTab">
    <div class="card">
        <div class="card-header border-bottom border-secondary px-2 py-0 d-flex justify-content-between align-items-end">
            <div class="tabBtn text-sm active" onclick="switchTab(this,'rgrg')">
                @php
                include('assets/img/icons/actes.svg');
                @endphp
                <span class="textBtn">Actes</span>
            </div>
            <div class="tabBtn text-sm" onclick="switchTab(this,'rgrg')">
                @php
                include('assets/img/icons/coins.svg');
                @endphp
                <span class="textBtn">Paiement</span>
            </div>
            <div class="tabBtn text-sm" onclick="switchTab(this,'rgrg')">
                @php
                include('assets/img/icons/calender.svg');
                @endphp
                <span class="textBtn">Render-vous</span>
            </div>
            <div class="tabBtn text-sm" onclick="switchTab(this,'rgrg')">
                @php
                include('assets/img/icons/prescription.svg');
                @endphp
                <span class="textBtn">Ordonnances</span>
            </div>
            <div class="tabBtn text-sm" onclick="switchTab(this,'rgrg')">
                @php
                include('assets/img/icons/invoice.svg');
                @endphp
                <span class="textBtn">Note d'honoraires</span>
            </div>
            <div class="tabBtn text-sm" onclick="switchTab(this,'rgrg')">
                @php
                include('assets/img/icons/health-data-security.svg');
                @endphp
                <span class="textBtn">Certificats médiceaux</span>
            </div>
            <div class="tabBtn text-sm" onclick="switchTab(this,'rgrg')">
                @php
                include('assets/img/icons/album.svg');
                @endphp
                <span class="textBtn">Imagery</span>
            </div>
          </div>
    <div class="card-body">
        <div class="tooth_schemar d-flex overflow-auto">
          <div class="mx-auto">

          @php
        include('assets/img/tooth_schema/upper-tooth.svg');
        @endphp
        <div class="d-flex w-100">
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">18</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">17</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">16</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">15</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">14</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">13</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">12</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">11</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">21</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">22</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">23</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">24</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">25</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">26</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">27</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary" type="button">28</button>
        </div>
        <div class="d-flex w-100 justify-content-end">
            <button class="btn w-100 shadow-none p-0 m-0 text-primary justify-content-center d-flex" type="button">48</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary justify-content-center d-flex" type="button">47</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary justify-content-end d-flex" type="button">46</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary justify-content-end d-flex" type="button">45</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary justify-content-end d-flex" type="button">44</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary justify-content-end d-flex" type="button">43</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary justify-content-end d-flex" type="button">42</button>
            <button class="btn w-75 shadow-none p-0 m-0 text-primary justify-content-end d-flex pe-2" type="button">41</button>
            <button class="btn w-75 shadow-none p-0 m-0 text-primary justify-content-start d-flex ps-2" type="button">31</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary justify-content-start d-flex" type="button">32</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary justify-content-start d-flex" type="button">33</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary justify-content-start d-flex" type="button">34</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary justify-content-start d-flex" type="button">35</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary justify-content-start d-flex" type="button">36</button>
            <button class="btn w-100 shadow-none p-0 m-0 text-primary justify-content-center d-flex" type="button">37</button>
            <button class="btn w-100 justify-content-center d-flex shadow-none p-0 m-0 text-primary" type="button">38</button>
        </div>
        @php
        include('assets/img/tooth_schema/lower-tooth.svg');
        @endphp
          </div>

        </div>

        {{-- <img class='lower_schema' src="{{asset('assets/img/tooth_schema/lower-tooth.svg')}}" alt="" srcset=""> --}}
    </div>
</div>

{{-- <div class="col-12 d-none patientTab m-0" id="reservationsTab">
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
</div> --}}

{{-- <div class="col-12 d-none patientTab m-0" id="ordonnacesTab">
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
    </tr>
    @endforelse


    </tbody>
    </table>
    </div>
    </div>
    </div>
</div> --}}

{{-- <div class="col-12 d-none patientTab m-0" id="facturesTab">
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
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">rest</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Service</th>
    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date of creation</th>
    <th></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($patient->invoices as $invoice)


    <tr>
        <td>
        <div class="d-flex ps-3">
        <img src="https://ui-avatars.com/api/?name={{$patient->name}}&background=random&size=350&uppercase=false&font-size=0.5" class="avatar avatar-sm rounded">
        </div>
        </td>
        <td>
        <span class="badge bg-gradient-{{$invoice->rest == 0 ? 'success' :( $invoice->rest <= 200 ? 'warning' : 'danger')}}"> {{$invoice->rest}}</span>
        </td>
        <td>
            <span class="text-sm font-weight-bold mb-0"> {{$invoice->service->name}}</span>
            </td>
        <td>
        <p class="text-sm font-weight-bold mb-0">{{\Carbon\Carbon::parse($invoice->created_at)->format('d/m/Y')}} </p>
        </td>
        <td class="d-flex justify-content-end">
            <button class="btn btn-info text-center m-0" type="button" onclick="this.classList.add('d-none');this.nextElementSibling.classList.remove('d-none')">
                +
            </button>
        <div class="d-none d-flex align-items-center justify-content-end">
            <form action="{{route('invoice.update',$invoice->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row col-12 f-flex">
                    <div class="col-9">
                        <input class=" form-control" min="0"  type="number" name="given">
                    </div>

                    <button class="col-3 btn btn-info text-center m-0" type="submit">
                        +
                    </button>
                </div>
            </form>
        </div>
        </td>
    </tr>
    @endforeach


    </tbody>
    </table>
    </div>
    </div>
    </div>
</div> --}}

</div>

<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title text-danger" id="modal-title-notification">Souhaitez-vous archiver ce patient ?</h6>
        </div>
        <div class="modal-body p-3">
          <div class="form-group">
            <label for="exampleFormControlInput1">Préciser le motif de l'archivage:</label>
            <input type="text" class="form-control is-invalid" id="exampleFormControlInput1" placeholder="le motif">
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-link ml-auto text-primary" data-bs-dismiss="modal">Fermer</button>
            <form action="{{route('patients.destroy',$patient->slug)}}" method="post" id='deleteform'>
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger">Archiver</button>
            </form>
        </div>
      </div>
    </div>
</div>
@php
    $modalId = "editPatient";
@endphp
<x-add_patients_modal :modalId='$modalId' :patient="$patient"/>



@endsection
