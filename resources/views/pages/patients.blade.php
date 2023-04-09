@extends('layouts.dashboard')

@section('patbtn','active')

@section('content')
<!-- Button trigger modal -->
<div class="w-100 d-flex justify-content-end">
    <x-add_patients_modal :assurances="$assurances"/>
</div>

@if ($errors->any())
    <div class="alert alert-danger border-0 alert-dismissible fade show" role="alert">
        <ul class="m-0">
            @foreach ($errors->all() as $error)
                <li class="text-white">{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@livewire('show-patients')

@endsection
