<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Kategoria::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator()->make(request()->all(), [
            "name" => "required|min:1|max:100",
            "color" => "required|min:3|max:20"
        ]);

        if ($validator->fails()) {
            return response()->json(["message" => "Invalid parameters"], 400);
        }

        $item = Kategoria::create($request->all());

        return response()->json(["id" => $item->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Kategoria::find($id);
        if ($item == null) {
            return response()->json(["message" => "Not such ID"], 404);
        }

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategoria $kategoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategoria $kategoria)
    {
        //
    }
}