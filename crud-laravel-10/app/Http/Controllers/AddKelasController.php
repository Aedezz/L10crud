<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;


class AddKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::orderBy('created_at', 'DESC')->paginate(1);
        return view('pages.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'idkelas' => 'required', // Replace 'your_field1' with the actual field name
            'nis' => 'required',
            'ta' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ], [
            'idkelas.required' => 'The ID Kelas field is required.',
            'idkelas.numeric' => 'The ID Kelas field must be a number.',
            'nis.required' => 'The NIS field is required.',
            'nis.numeric' => 'The NIS field must be a number.',
            'ta.required' => 'The Tahun Ajaran field is required.',
            'ta.numeric' => 'The Tahun Ajaran field must be a numeric.',
            'kelas.required' => 'The Jenis Kelamin field is required.',
            'kelas.string' => 'The Jenis Kelamin field must be a string.',
        ]);
        Kelas::create($validatedData);
        Kelas::create($request->all());

        return redirect()->route('addkelas.index')->with('succes', 'Data Kelas succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('pages.addkelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('pages.kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'idkelas' => 'required', // Replace 'your_field1' with the actual field name
            'nis' => 'required',
            'ta' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ], [
            'idkelas.required' => 'The ID Kelas field is required.',
            'idkelas.numeric' => 'The ID Kelas field must be a number.',
            'nis.required' => 'The NIS field is required.',
            'nis.numeric' => 'The NIS field must be a number.',
            'nis.unique' => 'The NIS field must be unique.',
            'ta.required' => 'The Tahun Ajaran field is required.',
            'ta.numeric' => 'The Tahun Ajaran field must be a numeric.',
            'kelas.required' => 'The Jenis Kelamin field is required.',
            'kelas.string' => 'The Jenis Kelamin field must be a string.',
        ]);
        Kelas::create($validatedData);
        $kelas = Kelas::findOrFail($id);

        $kelas->update($request->all());

        return redirect()->route('addkelas.index')->with('succes', 'Kelas Updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->delete();

        return redirect()->route('addkelas.index')->with('succes', 'kelas Deleted succesfully');
    }
}
