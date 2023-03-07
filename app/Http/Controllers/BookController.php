<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('home', compact('books'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $books = Book::where('judul', 'LIKE', '%' . $search . '%')->get();
        return view('home', compact('books'));
    }

    public function show($id)
    {
        $books = Book::findOrFail($id);
        return view('books.show', compact('books'));
    }

    public function create()
    {
        return view('create');
    }


    public function edit($id)
    {
        $books = Book::findOrFail($id);
        return view('books.edit', compact('books'));
    }

    public function update(Request $request, $id)
    {
        $books = Book::findOrFail($id);

        $books->title = $request->input('title');
        $books->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public', $filename);
            $books->image = $filename;
        }

        $books->save();

        return redirect()->route('books.show', $books->id)->with('success', 'Book updated successfully!');
    }

    public function store(Request $request)
    {
        $books = new Book();

        $books->judul = $request->input('judul');
        $books->pengarang = $request->input('pengarang');
        $books->penerbit = $request->input('penerbit');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            $books->image = $path;
        }

        $books->save();

        return redirect()->route('home', $books->id)->with('success', 'Book added successfully!');
    }

    public function destroy($id)
    {
        $books = Book::findOrFail($id);
        $books->delete();

        return redirect()->route('home')->with('success', 'Book deleted successfully!');
    }
}
