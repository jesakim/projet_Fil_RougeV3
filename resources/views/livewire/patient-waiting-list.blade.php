<div>


<div class="row mt-4">
    <div class="col-12">
    <div class="card mb-4">
    <div class="card-header pb-0">
    <h6>Waiting patients</h6>
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


        @forelse($waitingPatients as $waitingPatient)

    <tr>
        <td>
            <div class="d-flex px-2 py-1">
            <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm ps-2">{{$waitingPatient->name}}</h6>
            </div>
            </div>
        </td>
        <td>
            <p class="text-xs font-weight-bold mb-0">{{$waitingPatient->phone}}</p>
        </td>
        <td class="align-items-center justify-content-end text-center row row-cols-2 row-cols-lg-4 g-2 m-0">
            <div class="col">

                <a href="{{route('patients.show',$waitingPatient->slug)}}" class="btn w-100 btn-info m-0 text-white font-weight-bold text-xs col" >
                    Show
                </a>
            </div>
            <form wire:submit.prevent="removeFromWaitingList({{$waitingPatient->id}})" method="POST"  class="col">
                <button class="btn btn-danger text-center m-0 text-white font-weight-bold text-xs w-100">
                    Remove
                </button>
            </form>
        </td>
    </tr>

    @empty
    <tr>
        <td></td>
        <td>
            No Patients in waiting list
        </td>
        <td></td>
    </tr>
    @endforelse


    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>

</div>
