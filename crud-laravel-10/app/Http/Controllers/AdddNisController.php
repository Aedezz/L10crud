<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nis;
use Illuminate\Validation\Rule;

class AdddNisController extends Controller
{
    protected $connection = 'laravel-10-crud';
    protected $table = 'nis';
    protected $primaryKey = 'nis';
    public $incrementing = false;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nis = Nis::orderBy('created_at', 'DESC')->paginate(5);
        return view('pages.nis.index', compact('nis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('pages.nis.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => [
                'required',
                'numeric',
                'digits:9',
                Rule::unique('nis'), // Check uniqueness in the 'nis' table
            ],
            'name' => 'required|string',
            'jk' => 'required|string',
        ], [
            'nis.unique' => 'The NIS has already been taken.', 
            'nis.required' => 'The NIS field is required.',
            'nis.digits' => 'The NIS field must be 9 digits.',
            'name.required' => 'The Name field is required.',
            'name.string' => 'The Name field must be a alphabet',
            'jk.required' => 'The Jenis Kelamin field is required.',
            'jk.string' => 'The Jenis Kelamin field must be a alphabet',
        ]);

        Nis::create($validatedData);
        // Nis::created($request->all());

        return redirect()->route('addnis.index')->with('success', 'NIS added successfully');
    }

    public function show($id)
    {
        $nis = Nis::where('nis', $id)->first();
        if (!$nis) {
            return view('pages.nis.show')->with('failed', "Data doesn't exist!");
        }
        return view('pages.nis.show', compact('nis'));
    }

    public function edit($id)
    {
        $nis = Nis::where('nis', $id)->first();
        if (!$nis) {
            return view('pages.nis.edit')->with('failed', "Data doesn't exist!");
        }
        return view('pages.nis.edit', compact('nis'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, string $id)
    {
        $nis = Nis::where('nis', $id)->first();

        if ($nis) {
            $validatedData = $request->validate([
                'nis' => [
                    'required',
                    'numeric',
                    'digits:9',
                    Rule::unique('nis')->ignore($nis->id), // Ignore the current record
                ],
                'name' => 'required|string',
                'jk' => 'required|string',
            ], [
                'nis.unique' => 'The NIS has already been taken.', 
                'nis.required' => 'The NIS field is required.',
                'nis.numeric' => 'The NIS field must be a number.',
                'name.required' => 'The Name field is required.',
                'name.string' => 'The Name field must be an alphabet.',
                'jk.required' => 'The Jenis Kelamin field is required.',
                'jk.string' => 'The Jenis Kelamin field must be an alphabet.',
            ]);

            // Explicitly specify the primary key column in the update method
            Nis::where('nis', $id)->update($validatedData);

            return redirect()->route('addnis.index')->with('success', 'NIS Updated successfully');
        }

        return redirect()->route('addnis.index')->with('failed', 'Data not found');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = Nis::where('nis', $id)->delete();

        if ($deleted) {
            return redirect()->route('addnis.index')->with('success', 'Data deleted successfully');
        }

        return redirect()->route('addnis.index')->with('failed', "Data doesn't exist!");
    }
}
