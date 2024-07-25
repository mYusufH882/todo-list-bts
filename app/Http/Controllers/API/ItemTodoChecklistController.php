<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ItemTodoChecklist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemTodoChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemTodo = ItemTodoChecklist::all();

        return response()->json([
            'status' => 200,
            'data' => $itemTodo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'checklist_id' => 'required|integer',
            'title' => 'required|string',
            'status' => 'string'
        ]);

        $itemTodo = ItemTodoChecklist::create($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Item Todo berhasil disimpan !!!',
            'data' => $itemTodo
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $itemTodo = ItemTodoChecklist::find($id);

        return response()->json([
            'status' => 200,
            'data' => $itemTodo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $itemTodo = ItemTodoChecklist::find($id);

        $request->validate([
            'checklist_id' => 'required|integer',
            'title' => 'required|string',
            'status' => 'string'
        ]);

        $itemTodo->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Item Todo berhasil diubah !!!',
            'data' => $itemTodo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $itemTodo = ItemTodoChecklist::find($id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Item Todo berhasil dihapus !!!'
        ]);
    }
}
