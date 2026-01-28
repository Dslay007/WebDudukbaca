<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $query = Author::query();

        if ($request->has('search')) {
            $query->where('author_name', 'like', "%{$request->search}%");
        }

        $authors = $query->orderBy('last_update', 'desc')->paginate(15);

        return view('admin.author.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.author.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'author_year' => 'nullable|string|max:20',
        ]);

        $author = new Author();
        $author->author_name = $request->author_name;
        $author->author_year = $request->author_year;
        $author->input_date = now();
        $author->last_update = now();
        $author->save();

        return redirect()->route('admin.author.index')->with('success', 'Author added successfully.');
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.author.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'author_year' => 'nullable|string|max:20',
        ]);

        $author = Author::findOrFail($id);
        $author->author_name = $request->author_name;
        $author->author_year = $request->author_year;
        $author->last_update = now();
        $author->save();

        return redirect()->route('admin.author.index')->with('success', 'Author updated successfully.');
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect()->route('admin.author.index')->with('success', 'Author deleted successfully.');
    }
}
