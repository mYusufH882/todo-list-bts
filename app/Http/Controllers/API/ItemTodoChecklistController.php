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

        return response()->json($itemTodo);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'checklist_id' => 'required|string|max:36',
            'title' => 'required|string',
            'status' => 'string'
        ]);

        $itemTodo = ItemTodoChecklist::create($request->all());

        return response()->json($itemTodo);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $itemTodo = ItemTodoChecklist::find($id);

        return response()->json($itemTodo, Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $itemTodo = ItemTodoChecklist::find($id);

        $request->validate([
            'checklist_id' => 'required|string|max:36',
            'title' => 'required|string',
            'status' => 'string'
        ]);

        $itemTodo->update($request->all());

        return response()->json($itemTodo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $itemTodo = ItemTodoChecklist::find($id)->delete();

        return response()->json('Item Todo Checklist berhasil dihapus !!!', Response::HTTP_NO_CONTENT);
    }
}
