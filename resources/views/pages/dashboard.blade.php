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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>
                <h5 class="font-weight-bolder">
                  $53,000
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Users</p>
                <h5 class="font-weight-bolder">
                  2,300
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>
                <h5 class="font-weight-bolder">
                  +3,462
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                <h5 class="font-weight-bolder">
                  $103,430
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
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
