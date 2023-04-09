<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Http\Requests\StoreDrugRequest;
use App\Http\Requests\UpdateDrugRequest;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $drugs = Drug::all();
        return view('pages.drugs',compact('drugs'));
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
    public function store(StoreDrugRequest $request)
    {
       Drug::create($request->validated());
       return redirect()->back()->with('success', 'Drug added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Drug $drug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drug $drug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDrugRequest $request, Drug $drug)
    {
        $drug->update($request->validated());
        return redirect()->back()->with('success', 'Drug updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drug $drug)
    {
        $drug->delete();
        return redirect()->back()->with('success', 'Drug deleted successfully');
    }
}
