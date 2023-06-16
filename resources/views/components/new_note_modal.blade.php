<button type="button" class="btn btn-success btn-sm py-1 px-2 m-0 mx-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#makeNote">
    Créer une Note d'honoraires
</button>

<!-- Modal -->
<div class="modal fade" id="makeNote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Créer une ordonnance</h5>
          <button type="button" class="btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('note.store')}}" method="post">
            @csrf
            <input type="hidden" value='{{$id}}' name="patient_id">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="notepersodate_checkbox" >
                        <label class="form-check-label" for="flexSwitchCheckDefault">Utiliser une date personnalisée</label>
                    </div>
                    <div class="form-group d-none" id="notepersodate">
                        <label for="example-date-input" class="form-control-label">La date personnalisée</label>
                        <input class="form-control" name="date_perso" type="date" id="example-date-input">
                    </div>
                    <div class="form-group m-0 col-6">
                        <label for="example-date-input" class="form-control-label mb-1">Sans/Avec ICE</label>
                        <div class="row ps-3">
                    <div class="form-check mt-1 col-6">
                        <input class="form-check-input" checked type="radio" name="iswithICE" value="0" id="iswithICE">
                        <label class="custom-control-label m-0" for="iswithICE">Sans ICE</label>
                      </div>
                      <div class="form-check mt-1 col-6">
                        <input class="form-check-input" type="radio" name="iswithICE" value="1" id="iswithICE">
                        <label class="custom-control-label m-0" for="iswithICE">Avec ICE</i></label>
                      </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="example-date-input" class="form-control-label">Le montant</label>
                        <input class="form-control" name="montant" type="number" id="montant" placeholder="200">
                    </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Créer</button>
        </div>
    </form>
      </div>
    </div>
  </div>
