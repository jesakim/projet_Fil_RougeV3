<div>
    <form wire:submit.prevent="toggleWaitingList({{$patient_id}})" method="POST">
        <button type="submit" class="btn btn-{{$iswaiting ? 'danger' : 'success'}} btn-sm py-1 px-3 m-0 rounded-pill">{{$iswaiting ? 'Retirer de' : 'Ajouté à'}} la salle d'attente</button>
    </form>
</div>
