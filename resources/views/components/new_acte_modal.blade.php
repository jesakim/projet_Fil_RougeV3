<button type="button" class="btn btn-success btn-sm py-1 px-2 m-0 mx-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#newAct">
    Nouveau Acte
</button>

<!-- Modal -->
<div class="modal fade " id="newAct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nouveau Acte</h5>
          <button type="button" class="btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('actes.store')}}" method="post">
                @csrf
            <input type="hidden" value='{{$id}}' name="patient_id">

            <div class="m-0 d-flex">
                <input name="acteType" type="radio" class="btn-check shadow-none" id="btn-check" checked autocomplete="off">
                <label class="btn btn-outline-primary shadow-none m-0 p-0 w-100 rounded-0 rounded-start text-white" for="btn-check" onclick="actStandardBtn(this)">Acte standard</label>
                <input name="acteType" type="radio" class="btn-check shadow-none" id="btn-check-outlined"  autocomplete="off">
                <label class="btn btn-outline-primary shadow-none m-0 p-0 w-100 rounded-0 rounded-end" for="btn-check-outlined" onclick="actPersoBtn(this)">Acte personnalisé</label>
            </div>
            <div class="mt-3">
                <label for="acte-price-inp">Les Dents</label>
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check18" autocomplete="off" value="18">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check17" autocomplete="off" value="17">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check16" autocomplete="off" value="16">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check15" autocomplete="off" value="15">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check14" autocomplete="off" value="14">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check13" autocomplete="off" value="13">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check12" autocomplete="off" value="12">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check11" autocomplete="off" value="11">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check21" autocomplete="off" value="21">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check22" autocomplete="off" value="22">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check23" autocomplete="off" value="23">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check24" autocomplete="off" value="24">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check25" autocomplete="off" value="25">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check26" autocomplete="off" value="26">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check27" autocomplete="off" value="27">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check28" autocomplete="off" value="28">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check31" autocomplete="off" value="31">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check32" autocomplete="off" value="32">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check33" autocomplete="off" value="33">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check34" autocomplete="off" value="34">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check35" autocomplete="off" value="35">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check36" autocomplete="off" value="36">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check37" autocomplete="off" value="37">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check38" autocomplete="off" value="38">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check41" autocomplete="off" value="41">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check42" autocomplete="off" value="42">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check43" autocomplete="off" value="43">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check44" autocomplete="off" value="44">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check45" autocomplete="off" value="45">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check46" autocomplete="off" value="46">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check47" autocomplete="off" value="47">
                <input name="dents[]" type="checkbox" class="d-none" id="btn-check48" autocomplete="off" value="48">
                <div class="d-flex">
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0 rounded-start" onclick="selectDents(this,18)">18</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,17)">17</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,16)">16</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,15)">15</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,14)">14</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,13)">13</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,12)">12</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,11)">11</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,21)">21</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,22)">22</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,23)">23</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,24)">24</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,25)">25</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,26)">26</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,27)">27</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0 rounded-end" onclick="selectDents(this,28)">28</label>
                </div>
                <div class="d-flex mt-2">
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0 rounded-start" onclick="selectDents(this,48)">48</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,47)">47</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,46)">46</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,45)">45</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,44)">44</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,43)">43</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,42)">42</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,41)">41</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,31)">31</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,32)">32</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,33)">33</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,34)">34</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,35)">35</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,36)">36</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0" onclick="selectDents(this,37)">37</label>
                    <label class="btn btn-outline-info shadow-none m-0 p-1 w-100 rounded-0 rounded-end" onclick="selectDents(this,38)">38</label>
                </div>

            </div>

            <div class="form-group mb-2" id="acteStandard">
                <label for="exampleFormControlInput1" class="form-label">Acte</label>
                <select class="form-select" onchange="selecteService(this)" id="service_id" name="service_id">
                    <option value="">Selectionez un Acte</option>
                    @foreach ($services as $service)
                    <option value="{{$service->id}}" data-price="{{$service->price}}">{{$service->name}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group mb-2 d-none" id="actePerso">
                <label for="acte-price-inp">Acte</label>
                <textarea id="service_name"  rows="1" class="form-control" name="service_name"></textarea>
            </div>
            <div class="row">
                <div class="form-group m-0 mb-2 col-6">
                    <label for="acte-price-inp">Prix</label>
                    <input type="number" class="form-control" id="acte-price-inp" name="price" placeholder="200" min="0">
                </div>
                <div class="form-group m-0 mb-2 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                    <select class="form-select"id="service-select-inp" name="status">
                        <option value="0" selected>Terminé</option>
                        <option value="1">En Cours</option>
                    </select>
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="acte-price-inp">NB:</label>
                <textarea name="comment" rows="2" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
        </div>
      </div>
    </div>
  </div>
