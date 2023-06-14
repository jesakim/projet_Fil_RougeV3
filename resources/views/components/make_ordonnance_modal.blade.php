<button type="button" class="btn btn-success btn-sm py-1 px-2 m-0 mx-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#makeOrdonnances">
    Créer une ordonnance
</button>

<!-- Modal -->
<div class="modal fade" id="makeOrdonnances" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Créer une ordonnance</h5>
          <button type="button" class="btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('ordonnances.store')}}" method="post">
            @csrf
            <input type="hidden" value='{{$id}}' name="patient_id">
                <div class="d-flex align-items-center">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="ordopersodate_checkbox" >
                        <label class="form-check-label" for="flexSwitchCheckDefault">Utiliser une date personnalisée</label>
                      </div>
                    <div class="ms-auto">
                        <button type="button" class="btn btn-outline-danger m-0 p-2 shadow-none" onclick="toggleDrugSelect(-1)"><i class="fa-solid fa-minus"></i></button>
                        <button type="button" class="btn btn-outline-success m-0 p-2 shadow-none" onclick="toggleDrugSelect(1)"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
                <div class="form-group d-none" id="ordopersodate">
                    <label for="example-date-input" class="form-control-label">La date personnalisée</label>
                    <input class="form-control" type="date" value="{{date("Y-m-d")}}" id="example-date-input">
                </div>
            <div id="drug_and_dose_container">

            <div class="row">
                <div class="form-group mb-1 col-9">
                    <label class="form-control-label m-0"><span class="drugindexnumber">1</span> - Le médicament </label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option value="">Veuillez sélectionner un médicament</option>
                        @foreach ($drugs as $drug)
                        <optgroup label="Swedish Cars">
                        <option value="{{$drug->id}}">{{$drug->name}}</option>
                        </optgroup>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group mb-1 p-0 col-3">
                    <label class="form-control-label m-0"><span class="drugindexnumber">1</span> - La posologie</label>
                    <div class="d-flex align-items-center">
                        <input type="number" class="form-control" id="exampleFormControlInput1" value="3" min="0" placeholder="/J">
                        <span class="fs-6 ms-1">fois/jour</span>
                    </div>
                  </div>
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
