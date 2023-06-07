<button type="button" class="btn btn-success m-0 mx-1" data-bs-toggle="modal" data-bs-target="#makeOrdonnances">
    make ordonnance
</button>


<!-- Modal -->
<div class="modal fade show" style="display: block;" id="makeOrdonnances" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Make ordonnance</h5>
          <button type="button" class="btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('ordonnances.store')}}" method="post">
            @csrf
            @if (isset($patients))
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Select patient</label>
                <select class="select2-makeOrdonnances" name="patient_id">
                    <option value=""></option>
                    @foreach ($patients as $patient)
                    <option value="{{$patient->id}}">{{$patient->name}}</option>
                    @endforeach
                </select>
              </div>

            @else
            <input type="hidden" value='{{$id}}' name="patient_id">

            @endif
            <div id="drug_and_dose_container">
            <div class="row">
                <div class="form-group col-9">
                    <label for="exampleFormControlSelect1">Les médicaments</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option value="">Veuillez sélectionner un médicament</option>
                        @foreach ($drugs as $drug)
                        <optgroup label="Swedish Cars">
                        <option value="{{$drug->id}}">{{$drug->name}}</option>
                        </optgroup>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group p-0 col-3">
                    <label for="exampleFormControlInput1">La posologie</label>
                    <div class="d-flex align-items-center">
                        <input type="number" class="form-control" id="exampleFormControlInput1" value="3" min="0" placeholder="/J">
                        <span class="fs-5 ms-1">/Jour</span>
                    </div>
                  </div>
            </div>
        </div>
            {{-- <div class="">
                <label for="exampleFormControlInput1" class="form-label">Select Drugs</label>
                <select class="mselect2-makeOrdonnances" placeholder="test" name="drug_ids[]" multiple>
                    @foreach ($drugs as $drug)
                    <option value="{{$drug->id}}">{{$drug->name}}</option>
                    @endforeach
                </select>
              </div> --}}
              <div class="d-flex">
                <div class="ms-auto">
                    <button type="button" class="btn btn-outline-danger p-2 shadow-none" onclick="toggleDrugSelect(-1)"><i class="fa-solid fa-minus"></i></button>
                    <button type="button" class="btn btn-outline-success p-2 shadow-none" onclick="toggleDrugSelect(1)"><i class="fa-solid fa-plus"></i></button>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
