<div>

    <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="m-0">Reservations</h4>
                <h6 class="m-0 text-sm">Showing from {{$from}} to {{$to}}</h6>
            </div>
            <select class="form-select w-50" aria-label="Default select example" wire:model='range'>
                <option value="today">Today</option>
                <option value="week">This Week</option>
                <option value="month">This Month</option>
            </select>

        </div>
        <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
        <thead>
        <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Reseration date</th>
        {{-- <th class="text-secondary opacity-7"></th> --}}
        </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $res)

    <tr>
        <td>
            <div class="d-flex px-2 py-1">
            <div>
            <img src="https://ui-avatars.com/api/?name={{$res->name}}&background=random&size=350&uppercase=false&font-size=0.5" class="avatar avatar-sm me-3" alt="user1">
            </div>
            <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm">{{$res->name}}</h6>
            <p class="text-xs text-secondary mb-0">{{$res->phone}}</p>
            </div>
            </div>
        </td>
        <td>
            <p class="text-xs font-weight-bold mb-0">{{$res->date}}</p>
        </td>
        {{-- <td class="align-middle">
        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
        Edit
        </a>
        </td> --}}
    </tr>
    @endforeach

        </tbody>
        </table>
        </div>
        </div>
</div>

</div>
