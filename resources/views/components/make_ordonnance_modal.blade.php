<button type="button" class="btn btn-success m-0 mx-1" data-bs-toggle="modal" data-bs-target="#makeOrdonnances">
    make ordonnance
</button>


<!-- Modal -->
<div class="modal fade" id="makeOrdonnances" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
          <button type="button" class="btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('ordonnances.store')}}" method="post">
            @csrf
            @if (isset($patients))
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Select patient</label>
                <select class="selectpicker" data-live-search="true" name="patient_id">
                    <option value="Null" selected>Select patient</option>
                    @foreach ($patients as $patient)
                    <option value="{{$patient->id}}">{{$patient->name}}</option>
                    @endforeach
                </select>
              </div>

            @else
            <input type="hidden" value='{{$id}}' name="patient_id">

            @endif

            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Select Drugs</label>
                <select class="selectpicker" data-live-search="true" name="drug_ids[]" multiple>
                    @foreach ($drugs as $drug)
                    <option value="{{$drug->id}}">{{$drug->name}}</option>
                    @endforeach
                </select>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
