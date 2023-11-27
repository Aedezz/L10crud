<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;


class AddKelasController extends Controller
{

    protected $connection = 'laravel-10-crud';
    protected $table = 'idkelas';
    protected $primaryKey = 'idkelas';
    public $incrementing = false;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::orderBy('created_at', 'DESC')->paginate(5);
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
        $validatedData = $request->validate([
            'idkelas' => 'required|numeric',
            'nip' => 'required|numeric|digits:9',
            'ta' => 'required',
            'kelas' => 'required|string',
            'jurusan' => 'required|string',
        ], [
            'idkelas.required' => 'The ID Kelas field is required.',
            'idkelas.numeric' => 'The ID Kelas field must be a number.',
            'nip.required' => 'The NIP field is required.',
            'nip.numeric' => 'The NIP field must be a number.',
            'ta.required' => 'The Tahun Ajaran field is required.',
            'kelas.required' => 'The Jenis Kelamin field is required.',
            'kelas.string' => 'The Jenis Kelamin field must be a string.',
        ]);

        Kelas::create($validatedData);
        // Kelas::created($request->all());

        return redirect()->route('addkelas.index')->with('succes', 'Data Kelas added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kelas = Kelas::where('kelas', $id)->first();
        if (!$kelas) {
            return view('pages.kelas.show')->with('failed', "Data doesn't exist!");
        }
        return view('pages.kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::where('kelas', $id)->first();
        if (!$kelas) {
            return view('pages.kelas.edit')->with('failed', "Data doesn't exist!");
        }
        return view('pages.kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kelas = kelas::where('kelas', $id)->first();

        if ($kelas) {
            $validatedData = $request->validate([
                'idkelas' => 'required|numeric',
                'nip' => 'required|numeric|digits:9',
                'ta' => 'required',
                'kelas' => 'required|string',
                'jurusan' => 'required|string',
            ], [
                'idkelas.required' => 'The ID Kelas field is required.',
                'idkelas.numeric' => 'The ID Kelas field must be a number.',
                'nip.required' => 'The NIP field is required.',
                'nip.numeric' => 'The NIP field must be a number.',
                'ta.required' => 'The Tahun Ajaran field is required.',
                'kelas.required' => 'The Jenis Kelamin field is required.',
                'kelas.string' => 'The Jenis Kelamin field must be a string.',
            ]);

            // Explicitly specify the primary key column in the update method
            Kelas::where('kelas', $id)->update($validatedData);

            return redirect()->route('addkelas.index')->with('success', 'Kelas Updated successfully');
        }

        return redirect()->route('addkelas.index')->with('failed', 'Data not found');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = Kelas::where('kelas', $id)->delete();

        if ($deleted) {
            return redirect()->route('addkelas.index')->with('success', 'Data deleted successfully');
        }

        return redirect()->route('addkelas.index')->with('failed', "Data doesn't exist!");
    }
}
