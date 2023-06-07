{{-- button --}}

<button type="button" class="btn bg-success text-white m-0 mx-1" data-bs-toggle="modal" data-bs-target="#makeReservation">
    Make reservation
  </button>


<!-- Modal -->
<div class="modal fade" id="makeReservation" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Make reservation</h5>
          <button type="button" class="btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('reservations.store')}}" method="POST">
                @csrf
            @if (isset($patients))
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Select patient</label>
                <select class="select2-makeReservation" name="patient_id">
                    <option value=""></option>
                    @foreach ($patients as $patient)
                    <option value="{{$patient->id}}">{{$patient->name}}</option>
                    @endforeach
                </select>
              </div>

            @else
            <input type="hidden" value='{{$id}}' name="patient_id">

            @endif
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Reservation date</label>
                <input type="datetime-local" class="form-control" id="exampleFormControlInput1" min="{{date('Y-m-d')}}T00:00" name='date'>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn bg-gradient-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>

