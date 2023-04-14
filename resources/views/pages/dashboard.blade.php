@extends('layouts.dashboard')

@section('dashbtn','active')

@section('content')
<!-- Button trigger modal -->
<div class="mb-2 d-flex align-items-center justify-content-end">

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

@endsection
