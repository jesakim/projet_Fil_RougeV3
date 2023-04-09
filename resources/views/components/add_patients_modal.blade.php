<button type="button" class="btn btn-success m-0 mx-1" data-bs-toggle="modal" data-bs-target="#addPatient">
    Add Patient
</button>


<!-- Modal -->
<div class="modal fade" id="addPatient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
          <button type="button" class="btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('patients.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Patient name</label>
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Patient phone</label>
                <input type="text" class="form-control" name="phone" placeholder="0606060606">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Patient assurance</label>
                <select class="form-control" name="assurance_id">
                  @foreach ($assurances as $assurance)
                    <option value="{{$assurance->id}}">{{$assurance->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" value="1" checked name="iswaiting">
                <label class="form-check-label" for="flexSwitchCheckDefault">Ajouter a salle d'attente</label>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
