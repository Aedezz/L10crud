<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;


class AddPetugasController extends Controller
{
    protected $connection = 'laravel-10-crud';
    protected $table = 'idpetugas'; // Replace with your actual table name
    protected $primaryKey = 'idpetugas';
    public $incrementing = false;

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
            'nis' => 'required|numeric|digits:9',
        ], [
            'idpetugas.required' => 'The ID Kelas field is required.',
            'idpetugas.numeric' => 'The ID Kelas field must be a number.',
            'nis.required' => 'The nis field is required.',
            'nis.numeric' => 'The nis field must be a number.',
        ]);

        Petugas::create($validatedData);
        // Kelas::created($request->all());

        return redirect()->route('addpetugas.index')->with('success', 'Petugas added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($idpetugas)
    {
        $petugas = Petugas::where('idpetugas', $idpetugas)->first();

        if (!$petugas) {
            return view('pages.petugas.show')->with('failed', "Data doesn't exist!");
        }

        return view('pages.petugas.show', compact('petugas'));
    }


    public function edit($idpetugas)
    {
        $petugas = Petugas::where('idpetugas', $idpetugas)->first();
        if (!$petugas) {
            return view('pages.petugas.edit')->with('failed', "Data doesn't exist!");
        }
        return view('pages.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $idpetugas)
    {
        $validatedData = $request->validate([
            'idpetugas' => 'required|numeric',
            'nis' => 'required|numeric|digits:9',
        ], [
            'idpetugas.required' => 'The ID petugas field is required.',
            'idpetugas.numeric' => 'The ID petugas field must be a number.',
            'nis.required' => 'The NIS field is required.',
            'nis.numeric' => 'The nis field must be a number.',
        ]);
    
        // Find the record by explicitly using the primary key
        $petugas = Petugas::where('idpetugas', $idpetugas)->first();
    
        if ($petugas) {
            // Update the record using the primary key
            Petugas::where('idpetugas', $idpetugas)->update($validatedData);
    
            return redirect()->route('addpetugas.index')->with('success', 'Petugas updated successfully');
        }
    
        return redirect()->route('addpetugas.index')->with('failed', 'Data not found');
    }    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idpetugas)
    {
        $deleted = Petugas::where('idpetugas', $idpetugas)->delete();

        if ($deleted) {
            return redirect()->route('addpetugas.index')->with('success', 'Petugas successfully deleted');
        }

        return redirect()->route('addpetugas.index')->with('failed', "Data doesn't exist!");
    }

}
