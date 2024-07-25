<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checklist = Checklist::all();

        return response()->json([
            'status' => 200,
            'data' => $checklist
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $checklist = Checklist::create($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Checklist berhasil disimpan !!!',
            'data' => $checklist
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $checklist = Checklist::find($id);

        return response()->json([
            'status' => 200,
            'data' => $checklist
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $checklist = Checklist::find($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $checklist->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Checklist berhasil diubah !!!',
            'data' => $checklist
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $checklist = Checklist::find($id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Checklist berhasil dihapus !!!',
        ]);
    }
}
