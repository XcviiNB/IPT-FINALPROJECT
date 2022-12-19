<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::orderBy('author_name')->get();

        return response()->json([
            'authors' => $authors
        ]);
    }

    public function show(Author $author) {
        return response()->json($author);
    }

    public function store(Request $request) {
        $request->validate([
            'author_name' => 'string|required',
            'type' => 'string|required'
        ]);

        $author = Author::create($request->all());
        return response()->json($author);
    }

    public function update(Author $author, Request $request) {
        $author->update($request->all());
        return response()->json($author);
    }

    public function destroy(Author $author) {
        $author->delete();
        return response()->json(['Message' => 'Author removed']);
    }
}
