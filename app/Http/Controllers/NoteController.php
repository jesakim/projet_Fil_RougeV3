<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use Barryvdh\DomPDF\Facade\PDF;
use NumberFormatter;
use PhpParser\Node\Stmt\Return_;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        $note = Note::create($request->safe());
        if ($request->safe()->date_perso) {
            $note->created_at = $request->safe()->date_perso;
            $note->save();
        }
        return $this->show($note);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        $numberToWords = ucfirst((new NumberFormatter('fr',NumberFormatter::SPELLOUT))->format($note->montant));
        $note->numberToWords =  $numberToWords;
        // return $note;
        $pdfName = $note->iswithICE ? 'note-dhonoraires-with-ice' : 'note-dhonoraires';
        $pdf = PDF::loadView('pdf.'.$pdfName,
        compact('note'))->setPaper('A5', 'portrait');

         return  $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->back();
    }
}
