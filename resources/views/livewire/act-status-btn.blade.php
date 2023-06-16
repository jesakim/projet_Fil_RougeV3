<div>
    <form wire:submit.prevent="toggleActStatus({{$act_id}})" method="post">
    <button type="submit" class="btn btn-sm w-100 m-0 px-2 py-1 btn-{{$status ? 'info' : 'success'}}">{{$status ? 'En cours' : 'Terminé'}}</button>
</form>
</div>
