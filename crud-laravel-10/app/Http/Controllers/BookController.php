<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
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
                    ->orWhere('angkatan', 'LIKE', '%' . $search . '%')
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

        $query = Book::orderBy('created_at', 'DESC');

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('nis', 'LIKE', '%' . $search . '%')
                    ->orWhere('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('kelas', 'LIKE', '%' . $search . '%')
                    ->orWhere('jurusan', 'LIKE', '%' . $search . '%')
                    ->orWhere('angkatan', 'LIKE', '%' . $search . '%')
                    ->orWhere('jk', 'LIKE', '%' . $search . '%')
                    ->orWhere('sakit', 'LIKE', '%' . $search . '%')
                    ->orWhere('penanganan', 'LIKE', '%' . $search . '%')
                    ->orWhere('petugas', 'LIKE', '%' . $search . '%');
            });
        }

        $books = $query->paginate(5);
        return view('pages.book.index', compact('books'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'jk' => 'required',
            'sakit' => 'required',
            'penanganan' => 'required',
            'petugas' => 'required',
        ], [
            'nis.required' => 'The NIS field is required.',
            'nis.numeric' => 'The NIS field must be a number.',
            'name.required' => 'The Nama field is required.',
            'kelas.required' => 'The Jenis Kelamin field is required.',
            'kelas.string' => 'The Jenis Kelamin field must be a string.',
            'jurusan.required' => 'The Jurusan field is required.',
            'jurusan.string' => 'The Jurusan field must be a string.',
            'angkatan.required' => 'The Angkatan field is required.',
            'angkatan.numeric' => 'The Angkatan field must be a numeric.',
            'jk.required' => 'The Jenis Kelamin field is required.',
            'jk.string' => 'The Jenis Kelamin field must be a string.',
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
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('pages.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('pages.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'jk' => 'required',
            'sakit' => 'required',
            'penanganan' => 'required',
            'petugas' => 'required',
        ], [
            'nis.required' => 'The NIS field is required.',
            'nis.numeric' => 'The NIS field must be a number.',
            'name.required' => 'The Nama field is required.',
            'kelas.required' => 'The Jenis Kelamin field is required.',
            'kelas.string' => 'The Jenis Kelamin field must be a string.',
            'jurusan.required' => 'The Jurusan field is required.',
            'jurusan.string' => 'The Jurusan field must be a string.',
            'angkatan.required' => 'The Angkatan field is required.',
            'angkatan.numeric' => 'The Angkatan field must be a numeric.',
            'jk.required' => 'The Jenis Kelamin field is required.',
            'jk.string' => 'The Jenis Kelamin field must be a string.',
            'sakit.required' => 'The Sakit field is required.',
            'sakit.string' => 'The Sakit field must be a string.',
            'penanganan.required' => 'The Penanganan field is required.',
            'penanganan.string' => 'The Penanganan field must be a string.',
            'petugas.required' => 'The Petugas field is required.',
            'petugas.string' => 'The Petugas field must be a string.',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validatedData);

        return redirect()->route('book.index')->with('success', 'Book Updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->route('book.index')->with('success', 'Book Deleted successfully');
    }
}
