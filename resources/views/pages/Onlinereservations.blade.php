@extends('layouts.dashboard')

@section('onlineresbtn','active')
@section('pageName','Rendez-vous en ligne')


@section('content')

<div class="card mb-4 mt-3">
    <div class="card-header pb-0">
        <h6>Les rendez-vous en ligne</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Statut</th>
                  </tr>
                </thead>
                <tbody>
                    @for ($i=0;$i<10;$i++)


                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="https://ui-avatars.com/api/?name=name test&background=random&size=350&uppercase=false&font-size=0.5" class="avatar avatar-sm me-3">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-xs">name test</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">12/12/2112 21:21</p>
                    </td>
                    <td class="align-middle">
                      {{-- <a href="{{route('assistant.show',$user->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Show
                      </a> --}}
                      <div class="form-group m-0">
                        <select class="form-control" id="exampleFormControlSelect1" onchange="console.log('eeee')">
                          <option value="0">Infirmer</option>
                          <option value="1">Appeler une fois</option>
                          <option value="2">Appeler 2 fois</option>
                          <option value="3">Appeler plus que 2 fois</option>
                          <option value="4">Confirmer</option>
                        </select>
                      </div>
                    </td>
                  </tr>
                  @endfor
                </tbody>
              </table>
        </div>
    </div>
</div>


@endsection
