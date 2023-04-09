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
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
            <th class="text-secondary opacity-7"></th>
        </tr>
    </thead>
    <tbody>
    <tr>
        @if (!$waitingPatients->count())
<td></td>
<td></td>
<td>
    No Patients in waiting list
</td>
<td></td>
<td></td>

        @else

        @foreach ($waitingPatients as $waitingPatient)
    <tr>
        <td>
            <div class="d-flex px-2 py-1">
            <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm">{{$waitingPatient->name}}</h6>
            </div>
            </div>
        </td>
        <td>
            <p class="text-xs font-weight-bold mb-0">{{$waitingPatient->phone}}</p>
        </td>
        <td class="align-middle text-center text-sm">
            <span class="badge badge-sm bg-gradient-success">Online</span>
        </td>
        <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
        </td>
        <td class="align-items-center text-center row row-cols-2 row-cols-lg-4 g-2 m-0">
            <div class="col">

                <a href="{{route('patients.show',$waitingPatient->id)}}" class="btn w-100 btn-info m-0 text-white font-weight-bold text-xs col" >
                    Show
                </a>
            </div>
            <form wire:submit.prevent="removeFromWaitingList({{$waitingPatient->id}})" method="POST"  class="col">
                <button class="btn btn-danger text-center m-0 text-white font-weight-bold text-xs w-100">
                    Remove
                </button>
            </form>
            <div class="col">

                <a href="{{route('patients.show',$waitingPatient->id)}}" class="btn w-100 btn-info m-0 text-white font-weight-bold text-xs col" >
                    Show
                </a>
            </div>
            <div class="col">

                <a href="{{route('patients.show',$waitingPatient->id)}}" class="btn w-100 btn-info m-0 text-white font-weight-bold text-xs col" >
                    Show
                </a>
            </div>
        </td>
    </tr>
    @endforeach
    @endif


    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>

</div>
