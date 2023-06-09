


<!-- Modal -->
<div class="modal fade" id="{{$modalId}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ isset($patient) ? 'Modifier les info de '.$patient->name : 'Ajouter un patient'}} </h5>
          <button type="button" class="btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('patients.store')}}" method="post">
            @csrf
            <div class="row">
              <div class="form-group col-6">
                <label for="exampleFormControlInput1">Prénom <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" placeholder="Prénom">
              </div>
              <div class="form-group col-6">
                <label for="exampleFormControlInput1">Nom <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" placeholder="Nom">
              </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">N° de téléphone <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" value="{{ $patient->phone ?? '' }}" name="phone" placeholder="0606-060606" onkeyup="phoneFormate(this);">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">CIN</label>
                    <input type="text" class="form-control" name="phone" placeholder="BE252525">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="example-date-input" class="form-control-label">Date de naissance</label>
                    <input class="form-control" type="date" value="2000-01-01" id="example-date-input">
                </div>
                <div class="form-group col-6">
                    <label for="example-date-input" class="form-control-label">Genre</label>
                    <div class="row ps-3">
                <div class="form-check mt-1 col-6">
                    <input class="form-check-input" checked type="radio" name="gendre" id="customRadio1">
                    <label class="custom-control-label m-0" for="customRadio1">Mâle <i class="fa-solid fa-mars"></i></label>
                  </div>
                  <div class="form-check mt-1 col-6">
                    <input class="form-check-input" type="radio" name="gendre " id="customRadio2">
                    <label class="custom-control-label m-0" for="customRadio2">Femelle <i class="fa-solid fa-venus"></i></label>
                  </div>
                </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Patient assurance <span class="text-danger">*</span></label>
                <select class="form-control" name="assurance_id">
                  <option value="">Sélectionner l'assurance du patient</option>
                  <option value="1">Cnss</option>
                  <option value="2">Cnops</option>
                  <option value="3">Wafa assurance</option>
                  {{-- @foreach ($assurances as $assurance)
                    <option value="{{$assurance->id}}">{{$assurance->name}}</option>
                  @endforeach --}}
                </select>
              </div>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" value="1" checked name="iswaiting">
                <label class="form-check-label" for="flexSwitchCheckDefault">Ajouté à la salle d'attente</label>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
