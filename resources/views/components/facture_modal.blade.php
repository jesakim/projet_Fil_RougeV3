{{-- button --}}

<button type="button" class="btn bg-success text-white m-0 mx-1" data-bs-toggle="modal" data-bs-target="#makeInvoice">
    Invoice
</button>


<!-- Modal -->
<div class="modal fade" id="makeInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Make Invoice</h5>
          <button type="button" class="btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('invoice.store')}}" method="POST">
                @csrf
            @if (isset($patients))
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Select patient</label>
                <select class="selectpicker" data-live-search="true" name="patient_id">
                    @foreach ($patients as $patient)
                    <option value="{{$patient->id}}">{{$patient->name}}</option>
                    @endforeach
                </select>
              </div>

            @else
            <input type="hidden" value='{{$id}}' name="patient_id">

            @endif
            <div class="row">
                <div class="col-9">
                    <label for="exampleFormControlInput1" class="form-label">Select Service</label>
                    <select class="form-select" aria-label="Default select example" onchange="selecteService(this)" name="service_id">
                        <option value="">Select a service</option>
                        @foreach ($services as $service)
                        <option value="{{$service->id}}" data-price="{{$service->price}}">{{$service->name}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="form-group col-3">
                    <label for="exampleFormControlInput1">Service price</label>
                    <input type="text" id="selectedPrice" class="form-control" disabled value="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1" >Received</label>
                    <input type="text" id="received" class="form-control" value="select service first" oninput="receivedChanged(this)" disabled>
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">the rest</label>
                    <input type="number" min="0" id="theRest" class="form-control readonly" readonly value="0" name="rest">
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn bg-gradient-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>


  <style>
    .dropdown-menu{
        width: 100% !important;
        min-width: unset !important;
    }
    .bootstrap-select{
        width: 100% !important;

    }
</style>



