<?php

namespace App\Http\Controllers;

use App\Models\Elem;
use Illuminate\Http\Request;

class ElemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $elemek = Elem::with("category")->get();
        return response()->json($elemek);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator()->make(request()->all(), [
            "description" => "required|min:1|max:100",
            "category" => "required|integer|exists:kategoriak,id",
            "done" => "boolean|nullable"
        ]);

        if ($validator->fails()) {
            return response()->json(["message" => "Invalid parameters"], 400);
        }

        //$created = Elem::create($validator->validated());
        //if ($created == null) {
        //    return response()->json(["message" => "Failed to create element"]);
        //}


        $created = Elem::create($request->all());
        return response()->json($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Elem $elem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $elem = Elem::find($id);
        if ($elem == null) {
            return response()->json(["message" => "Not such element ID"], 404);
        }

        $validator = validator()->make(request()->all(), [
            "description" => "min:1|max:100",
            "category" => "integer|exists:kategoriak,id",
            "done" => "boolean|nullable"
        ]);

        if ($validator->fails()) {
            return response()->json(["message" => "Invalid parameters"], 400);
        }

        $elem->update($request->all());

        return response()->json($elem);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $elem = Elem::find($id);
        if ($elem == null) {
            return response()->json(["message" => "No such element"], 404);
        }

        $elem->delete();

        return response()->json(["id" => $id]);
    }
}