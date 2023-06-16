<div>
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="m-0">Patients</h4>
                    <h6 class="m-0 text-sm">Showing {{$countonsearch}} of {{$all}}</h6>
                </div>
              <div class="w-50 d-flex justify-content-between align-items-center">
                <select class="form-select w-25" aria-label="Default select example" wire:model='count'>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="{{$all}}">All</option>
                  </select>
                <div class="form-group m-0 w-75 ms-2">
                <div class="input-group">
                  <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                  <input class="form-control" placeholder="Search" type="search" wire:model='search'>
                </div>
              </div>
              </div>

            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($patients as $patient)
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div>
                                  <img src="https://ui-avatars.com/api/?name={{$patient->name}}&background=random&size=350&uppercase=false&font-size=0.5" class="avatar avatar-sm m-0">
                                </div>
                                <a href="{{route('patients.show',$patient->slug)}}" target="_blank" class="btn btn-link m-0 me-2 font-weight-bold text-xs">
                                    {{$patient->fname .' '. $patient->name }}
                                  </a>
                              </div>

                      </td>
                      <td>
                        <a href="https://wa.me/+2126{{substr($patient->phone,0,8)}}" target="_blank" class="text-xs font-weight-bold mb-0">{{$patient->phone}}</a>
                      </td>
                      <td >

                        <form wire:submit.prevent="addToWaitingList({{$patient->id}},{{!$patient->iswaiting ? '1':'0'}})" method="POST" class="d-flex justify-content-center">
                            <button class="btn btn-{{!$patient->iswaiting ? 'success':'danger'}} m-0 text-white font-weight-bold text-xs">
                                {{!$patient->iswaiting ? 'Ajouté à':'Retirer de'}} la salle d'attente
                            </button>
                        </form>
                        {{-- @if (!$patient->iswaiting)

                        <form wire:submit.prevent="addToWaitingList({{$patient->id}},1)" method="POST">
                            <button class="btn btn-success m-0 text-white font-weight-bold text-xs">
                                Ajouté à la salle d'attente
                            </button>
                        </form>

                        @else

                        <form wire:submit.prevent="addToWaitingList({{$patient->id}},0)" method="POST">
                            <button class="btn btn-danger m-0 text-white font-weight-bold text-xs" type="submit">
                                 la salle d'attente
                            </button>
                        </form>


                        @endif --}}
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
</div>
