<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacatures = \App\Models\Vacature::with(['bedrijf', 'status', 'contactpersoon'])->get();
        return view('vacatures.index', compact('vacatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bedrijven = \App\Models\Bedrijf::all();
        $statussen = \App\Models\Status::all();
        $contactpersonen = \App\Models\Contactpersoon::all();
        return view('vacatures.create', compact('bedrijven', 'statussen', 'contactpersonen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'functietitel' => 'required|string|max:255',
            'bedrijf_id' => 'required|integer|exists:bedrijven,id',
            'status_id' => 'required|integer|exists:statussen,id',
            'contactpersoon_id' => 'required|integer|exists:contactpersonen,id',
            'uren_per_week' => 'nullable|string|max:50',
            'uiterste_datum_aanbieding' => 'nullable|date',
        ]);
        $vacature = \App\Models\Vacature::create($validated);
        return redirect()->route('vacatures.index')->with('success', 'Vacature toegevoegd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vacature = \App\Models\Vacature::findOrFail($id);
        $bedrijven = \App\Models\Bedrijf::all();
        $statussen = \App\Models\Status::all();
        $contactpersonen = \App\Models\Contactpersoon::all();
        return view('vacatures.edit', compact('vacature', 'bedrijven', 'statussen', 'contactpersonen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vacature = \App\Models\Vacature::findOrFail($id);
        $validated = $request->validate([
            'functietitel' => 'required|string|max:255',
            'bedrijf_id' => 'required|integer|exists:bedrijven,id',
            'status_id' => 'required|integer|exists:statussen,id',
            'contactpersoon_id' => 'required|integer|exists:contactpersonen,id',
            'uren_per_week' => 'nullable|string|max:50',
            'uiterste_datum_aanbieding' => 'nullable|date',
        ]);
        $vacature->update($validated);
        return redirect()->route('vacatures.index')->with('success', 'Vacature bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vacature = \App\Models\Vacature::findOrFail($id);
        $vacature->delete();
        return redirect()->route('vacatures.index')->with('success', 'Vacature verwijderd!');
    }
}
