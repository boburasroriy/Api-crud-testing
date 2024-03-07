<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $items = Post::all();
        return response()->json($items);
    }

    // Display the specified resource.
    public function show($id)
    {
        $item = Post::findOrFail($id);
        return response()->json($item);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $item = Post::create($request->all());
        return response()->json($item, 201);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $item = Post::findOrFail($id);
        $item->update($request->all());
        return response()->json($item, 200);
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
