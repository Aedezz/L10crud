<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nis;

class AdddNisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nis = Nis::orderBy('created_at', 'DESC')->paginate(1);
        return view('pages.nis.index', compact('nis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.nis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nis' => 'required', // Replace 'your_field1' with the actual field name
            'name' => 'required',
            'jk' => 'required',
        ], [
            'nis.required' => 'The NIS field is required.',
            'nis.numeric' => 'The NIS field must be a number.',
            'nis.unique' => 'The NIS field must be unique.',
            'name.required' => 'The Name field is required.',
            'name.string' => 'The Name field must be a string.',
            'jk.required' => 'The Jenis Kelamin field is required.',
            'jk.string' => 'The Jenis Kelamin field must be a string.',
        ]);

        Nis::create($validatedData);
        Nis::create($request->all());

        return redirect()->route('addnis.index')->with('succes', 'NIS Add succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nis = Nis::findOrFail($id);
        return view('pages.nis.show', compact('nis'));
    }

    public function edit(string $id)
    {
        $nis = Nis::findOrFail($id);
        return view('pages.nis.edit', compact('nis'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nis' => 'required', // Replace 'your_field1' with the actual field name
            'name' => 'required',
            'jk' =>'required',
        ], [
            'nis.required' => 'The NIS field is required.',
            'nis.numeric' => 'The NIS field must be a number.',
            'nis.unique' => 'The NIS field must be unique.',
            'name.required' => 'The Name field is required.',
            'name.string' => 'The Name field must be a string.',
            'jk.required' => 'The Jenis Kelamin field is required.',
            'jk.string' => 'The Jenis Kelamin field must be a string.',
        ]);
        
        $nis = Nis::findOrFail($id);
        $nis->update($validatedData);

        $nis->update($request->all());

        return redirect()->route('addnis.index')->with('succes', 'NIS Updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nis = Nis::findOrFail($id);

        $nis->delete();

        return redirect()->route('addnis.index')->with('succes', 'NIS Deleted succesfully');
    }
}
