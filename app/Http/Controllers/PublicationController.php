<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index() {
        $publications = Publication::orderBy('title','ASC')->with(['author'])->get();

        return response()->json([
            'publications' => $publications
        ]);
    }

    public function show(Publication $publication) {
        return response()->json($publication);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'string|required',
            'author_id' => 'numeric|required',
            'publisher' => 'string|required'
        ]);

        $publication = Publication::create($request->all());
        return response()->json($publication);
    }

    public function update(Publication $publication, Request $request) {
        $publication->update($request->all());
        return response()->json($publication);
    }

    public function destroy(Publication $publication) {
        $publication->delete();
        return response()->json(['message' => 'Information Removed']);
    }
}
