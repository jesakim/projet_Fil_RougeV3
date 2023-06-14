@extends('layouts.dashboard')

@section('comptabtn','active')
@section('pageName','Comptabilité')


@section('content')


<div class="row">
    <div class="col-xl-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body p-3 pb-0">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total du mois mai</p>
                <h5 class="font-weight-bolder m-0">
                  2121 dhs
                </h5>
              </div>
            </div>
            <div class="col-3 d-flex justify-content-center p-0">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="fa-regular fa-calendar-days text-lg opacity-10"></i>
              </div>
            </div>
          </div>
          <div class="d-flex">
            <p class="text-danger m-0">
                2121 avec ICE
            </p>
            <p class="m-0 font-weight-bolder mx-3">/</p>
            <p class="text-success m-0">
                2121 Sans ICE
            </p>
        </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9  pe-0">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">total d'année avec ICE</p>
                <h5 class="font-weight-bolder text-danger">
                    2121 dhs
                </h5>
              </div>
            </div>
            <div class="col-3 d-flex justify-content-center p-0">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="fa-solid fa-coins text-lg opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">total d'année sans ICE</p>
                <h5 class="font-weight-bolder text-success">
                    2121 dhs
                </h5>
              </div>
            </div>
            <div class="col-3 d-flex justify-content-center p-0">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="fa-solid fa-coins text-lg opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-9">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">total d'année</p>
                <h5 class="font-weight-bolder">
                    2121 dhs
                </h5>
              </div>
            </div>
            <div class="col-3 d-flex justify-content-center p-0">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="fa-solid fa-coins text-lg opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>



<div class="card mb-4">
    <div class="card-header pb-0">
        <h6>Comptabilité</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total à payer</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 pe-0">Total Reçu sans ice</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Reçu avec ice</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Reste</th>
                  </tr>
                </thead>
                <tbody>
                    @for ($i=0;$i<10;$i++)


                  <tr>
                    <td>
                      <a href="{{route('patients.show','jamal')}}" target="blank" class="d-flex px-2 py-1 align-items-center">
                        <div>
                          <img src="https://ui-avatars.com/api/?name=name test&background=random&size=350&uppercase=false&font-size=0.5" class="avatar avatar-sm me-3">
                        </div>
                        <div class="btn btn-link m-0 p-0">jamal edidne sakim</div>
                        {{-- <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-xs">name test</h6>
                        </div> --}}
                      </a>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">3232 dhs</p>
                    </td>
                    <td>
                        <p class="text-xs text-success font-weight-bold mb-0">3232 dhs</p>
                      </td>
                      <td>
                        <p class="text-xs text-warning font-weight-bold mb-0">3232 dhs</p>
                      </td>
                      <td>
                        <p class="text-xs text-danger font-weight-bold mb-0">3232 dhs</p>
                      </td>
                  </tr>
                  @endfor
                </tbody>
              </table>
        </div>
    </div>
</div>


@endsection
