<?php

namespace App\Http\Controllers;

use App\Models\Chronogram;
use Illuminate\Http\Request;

class ChronogramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *\Illuminate\Http\Response
     */
    public function index()
    {
        $chronograms = Chronogram::all();
        return response()->json($chronograms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'month' => 'required',
            'municipio' => 'required',
            'note' => 'nullable',
            'groups' => 'nullable',
            'sport_modality' => 'nullable',
            'sports_venue_main_name' => 'nullable',
            'sports_venue_main_address' => 'nullable',
            'sports_venue_alter_name' => 'nullable',
            'sports_venue_alter_address' => 'nullable',
            'day' => 'required',
            'hour_start' => 'required',
            'hour_end' => 'required',
        ]);
    
        $chronogram = Chronogram::create($validatedData);
    
        return response()->json([
            'message' => 'Chronogram created successfully',
            'chronogram' => $chronogram,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chronogram  $chronogram
     * @return \Illuminate\Http\Response
     */
    public function show(Chronogram $chronogram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chronogram  $chronogram
     * @return \Illuminate\Http\Response
     */
    public function edit(Chronogram $chronogram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chronogram  $chronogram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chronogram $chronogram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chronogram  $chronogram
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chronogram $chronogram)
    {
        //
    }
}
