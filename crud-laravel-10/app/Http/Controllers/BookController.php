<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Nis;
use App\Models\Kelas;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $connection = 'laravel-10-crud';
    protected $table = 'books'; // Replace with your actual table name
    protected $primaryKey = 'iduks';
    public $incrementing = false;


    /**
     * Display a listing of the resource.
     */

     public function search(Request $request)
    {
        $search = $request->input('search', '');

        $query = Book::orderBy('created_at', 'DESC');

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('nis', 'LIKE', '%' . $search . '%')
                    ->orWhere('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('kelas', 'LIKE', '%' . $search . '%')
                    ->orWhere('jurusan', 'LIKE', '%' . $search . '%')
                    ->orWhere('ta', 'LIKE', '%' . $search . '%')
                    ->orWhere('jk', 'LIKE', '%' . $search . '%')
                    ->orWhere('sakit', 'LIKE', '%' . $search . '%')
                    ->orWhere('penanganan', 'LIKE', '%' . $search . '%')
                    ->orWhere('petugas', 'LIKE', '%' . $search . '%');
            });
        }

        $books = $query->paginate(5);
        return view('pages.book.index', compact('books'));
    }


    public function index(Request $request)
    {
        $search = $request->input('search', '');

        $query = Book::orderBy('books.created_at', 'DESC')
            ->join('nis','books.nis','=','nis.nis')
            ->join('kelas','books.idkelas','=','kelas.idkelas');

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('nis', 'LIKE', '%' . $search . '%')
                    ->orWhere('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('kelas', 'LIKE', '%' . $search . '%')
                    ->orWhere('jurusan', 'LIKE', '%' . $search . '%')
                    ->orWhere('ta', 'LIKE', '%' . $search . '%')
                    ->orWhere('jk', 'LIKE', '%' . $search . '%')
                    ->orWhere('sakit', 'LIKE', '%' . $search . '%')
                    ->orWhere('penanganan', 'LIKE', '%' . $search . '%')
                    ->orWhere('petugas', 'LIKE', '%' . $search . '%');
            });
        }

        $books = $query->paginate(5);

       
        return view('pages.book.index', ['books' => $books]);
       
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('pages.book.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nis' => 'required|digits:9|numeric',
            'idkelas' => 'required',
            'sakit' => 'required',
            'penanganan' => 'required',
            'petugas' => 'required',
            
        ], [
            'nis.required' => 'The NIS field is required.',
            'idkelas.required' => 'The Kelas field is required.',
            'sakit.required' => 'The Sakit field is required.',
            'sakit.string' => 'The Sakit field must be a string.',
            'penanganan.required' => 'The Penanganan field is required.',
            'penanganan.string' => 'The Penanganan field must be a string.',
            'petugas.required' => 'The Petugas field is required.',
            'petugas.string' => 'The Petugas field must be a string.',
        ]);

        Book::create($validatedData);
        // Book::create($request->all());

        return redirect()->route('book.index')->with('success', 'Book added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($iduks)
    {
        $book = Book::join('nis','books.nis','=','nis.nis')
        ->join('kelas','books.idkelas','=','kelas.idkelas')
        ->where('iduks', $iduks)->first();

        if (!$book) {
            return view('pages.book.show')->with('failed', "Data doesn't exist!");
        }

        return view('pages.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($iduks)
    {
        $book = Book::where('iduks', $iduks)->first();
        if (!$book) {
            return view('pages.book.edit')->with('failed', "Data doesn't exist!");
        }
        return view('pages.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $iduks)
    {
        $validatedData = $request->validate([
            'nis' => 'required|digits:9|numeric',
            'name' => 'required',
            'kelas' => 'required',
            'jk' => 'required',
            'sakit' => 'required',
            'penanganan' => 'required',
            'petugas' => 'required',
        ], [
            'nis.required' => 'The NIS field is required.',
            'nis.numeric' => 'The NIS field must be a number.',
            'name.required' => 'The Nama field is required.',
            'kelas.required' => 'The Kelas field is required.',
            'jk.required' => 'The Jenis Kelamin field is required.',
            'sakit.required' => 'The Sakit field is required.',
            'penanganan.required' => 'The Penanganan field is required.',
            'petugas.required' => 'The Petugas field is required.',
        ]);

        $book = Book::findOrFail($iduks);
        $book->update($validatedData);

        return redirect()->route('book.index')->with('success', 'Book Updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $iduks)
    {
        $book = Book::findOrFail($iduks);

        $book->delete();

        return redirect()->route('book.index')->with('success', 'Book Deleted successfully');
    }

    public function getfield(Request $request){
        try {
            $getFields = Nis::where('nis',$request->nis)->first();
            // here you could check for data and throw an exception if not found e.g.
            // if(!$getFields) {
            //     throw new \Exception('Data not found');
            // }
            return response()->json($getFields, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
