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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($patients as $patient)
                    <tr>
                        <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$patient->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$patient->phone}}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$patient->id}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                      </td>
                      <td class="align-middle d-flex justify-content-center m-0">
                        <a href="{{route('patients.show',$patient->id)}}" class="btn btn-info m-0 me-2 text-white font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Show
                        </a>
                        @if (!$patient->iswaiting)

                        <form wire:submit.prevent="addToWaitingList({{$patient->id}},1)" method="POST">
                            <button class="btn btn-success m-0 text-white font-weight-bold text-xs">
                                Add
                            </button>
                        </form>

                        @else

                        <form wire:submit.prevent="addToWaitingList({{$patient->id}},0)" method="POST">
                            <button class="btn btn-danger m-0 text-white font-weight-bold text-xs" type="submit">
                                Remove
                            </button>
                        </form>


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
</div>
