@extends('layouts.dashboard')

@section('dashbtn','active')
@section('pageName','Dashboard')

@section('content')
<!-- Button trigger modal -->
<div class="mb-2 d-flex flex-wrap align-items-center justify-content-end">

    <x-add_patients_modal :assurances="$assurances"/>
    <x-make_reservation_modal :patients="$patients"/>
    <x-make_ordonnance_modal :patients="$patients" :drugs="$drugs"/>
    <x-facture_modal :patients="$patients" :services="$services"/>
</div>
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
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Patient Number</p>
                <h5 class="font-weight-bolder">
                  {{$patients->count()}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="fa-solid fa-hospital-user text-lg opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8  pe-0">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Reservations</p>
                <h5 class="font-weight-bolder">
                  {{$todaysreservation}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="fa-regular fa-calendar-days text-lg opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">active Assistants</p>
                <h5 class="font-weight-bolder">
                  {{$assistantsnumber}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="fa-solid fa-user text-lg opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">this week revenue</p>
                <h5 class="font-weight-bolder">
                  {{$thisweekrevenue}} DH
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="fa-solid fa-coins text-lg opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


@livewire('patient-waiting-list')


{{-- <select  class="select2-select w-100">
    <option value=""></option>
    @foreach ($patients as $patient)

    <option value="AL">{{$patient->name}}</option>
    @endforeach
  </select> --}}
  <div class="row mt-4">
    <div class="col-12">
    <div class="card mb-4">
    <div class="card-header pb-0">
    <h6>Patients to be confirmed</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">phone</th>
            <th class="text-secondary opacity-7"></th>
        </tr>
    </thead>
    <tbody>


        @forelse($patientsToBeConfirmed as $patientToBeConfirmed)

    <tr>
        <td>
            <div class="d-flex px-2 py-1">
            <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm ps-2">{{$patientToBeConfirmed->name}}</h6>
            </div>
            </div>
        </td>
        <td>
            <p class="text-xs font-weight-bold mb-0">{{$patientToBeConfirmed->phone}}</p>
        </td>
        <td class="align-items-center justify-content-end text-center row row-cols-2 row-cols-lg-4 g-2 m-0">
            <div class="col">

                <a href="{{route('patients.show',$patientToBeConfirmed->slug)}}" class="btn w-100 btn-info m-0 text-white font-weight-bold text-xs col" >
                    Show
                </a>
            </div>
            <form action="{{route('comfirmpatient',$patientToBeConfirmed->slug)}}" method="post"  class="col">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-danger text-center m-0 text-white font-weight-bold text-xs w-100">
                    Confirm
                </button>
            </form>
        </td>
    </tr>

    @empty
    <tr>
        <td></td>
        <td>
            No Patients to be confirmed
        </td>
    </tr>
    @endforelse


    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>

@endsection
