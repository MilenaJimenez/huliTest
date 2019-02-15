<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Line;

class LineController extends Controller
{
      public function index()
    {
        return Line::all();
    }

    public function show(Line $line)
    {
        return $line;
    }

    public function store(Request $request)
    {
        $line = Line::create($request->all());

        return response()->json($line, 201);
    }

    public function update(Request $request, Line $line)
    {
        $line->update($request->all());

        return response()->json($line, 200);
    }

    public function delete(Line $line)
    {
        $line->delete();

        return response()->json(null, 204);
    }
}
