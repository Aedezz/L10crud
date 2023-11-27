<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;


class AddPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Petugas::orderBy('created_at', 'DESC')->paginate(5);
        return view('pages.petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idpetugas' => 'required|numeric',
            'nis' => 'required|digits:9|numeric',
        ], [
            'idpetugas.required' => 'The ID Petugas field is required.',
            'idpetugas.numeric' => 'The ID Petugas field must be a number.',
            'nis.required' => 'The NIS field is required.',
            'nis.numeric' => 'The NIS field must be a number.',
        ]);

        Petugas::create($validatedData);
        // Kelas::create($request->all());

        return redirect()->route('addpetugas.index')->with('succes', 'Data Petugas added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('pages.addpetugas.show', compact('petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('pages.petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'idpetugas' => 'required|numeric',
            'nis' => 'required|digits:9|numeric',
        ], [
            'idpetugas.required' => 'The ID Petugas field is required.',
            'idpetugas.numeric' => 'The ID Petugas field must be a number.',
            'nis.required' => 'The NIS field is required.',
            'nis.numeric' => 'The NIS field must be a number.',
        ]);

        $petugas = Petugas::findOrFail($id);
        $petugas->update($validatedData);
        // Kelas::update($request->all());

        return redirect()->route('addpetugas.index')->with('succes', 'Petugas Updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = Petugas::findOrFail($id);

        $petugas->delete();

        return redirect()->route('addpetugas.index')->with('succes', 'Petugas Deleted succesfully');
    }
}
