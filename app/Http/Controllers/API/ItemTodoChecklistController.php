<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Checklist;
use App\Models\ItemTodoChecklist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemTodoChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllItemByChecklist($id)
    {
        $itemTodo = Checklist::with('items')->find($id);

        if(!$itemTodo) {
            return response()->json([
                'status' => 404,
                'message' => 'Checklist/Item Todo tidak ditemukan !!!'
            ]);
        }
        
        return response()->json([
            'status' => 200,
            'data' => $itemTodo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeItembyChecklist(Request $request, $id)
    {
        $checklist = Checklist::find($id);

        if(!$checklist) {
            return response()->json([
                'status' => 404,
                'message' => 'Checklist tidak ditemukan !!!'
            ]);
        }

        $request->validate([
            'checklist_id' => 'required|integer',
            'title' => 'required|string',
            'description' => 'string',
            'status' => 'string'
        ]);

        $itemTodo = $checklist->items()->create($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Item Todo berhasil disimpan !!!',
            'data' => $itemTodo
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showItemIdByChecklist($id, $item_id)
    {
        $checklist = Checklist::find($id);

        if(!$checklist) {
            return response()->json([
                'status' => 404,
                'message' => 'Checklist tidak ditemukan !!!'
            ]);
        }

        $itemTodo = $checklist->items()->find($item_id);

        if(!$itemTodo) {
            return response()->json([
                'status' => 404,
                'message' => 'Item tidak ditemukan !!!'
            ]);
        }

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

    public function updateItemStatusByChecklist(Request $request, $id, $item_id)
    {
        $checklist = Checklist::find($id);

        if(!$checklist) {
            return response()->json([
                'status' => 404,
                'message' => 'Checklist tidak ditemukan !!!'
            ]);
        }

        $item = $checklist->items()->find($item_id);

        if(!$item) {
            return response()->json([
                'status' => 404,
                'message' => 'Item tidak ditemukan !!!'
            ]);
        }

        $request->validate([
            'status' => 'required|string'
        ]);

        $item->update([
            'status' => $request->status
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Status Item berhasil diubah !!!',
            'data' => $item
        ]);
    }

    public function updateRenameItemByChecklist(Request $request, $id, $item_id)
    {
        $checklist = Checklist::find($id);

        if(!$checklist) {
            return response()->json([
                'status' => 404,
                'message' => 'Checklist tidak ditemukan !!!'
            ]);
        }

        $item = $checklist->items()->find($item_id);

        if(!$item) {
            return response()->json([
                'status' => 404,
                'message' => 'Item tidak ditemukan !!!'
            ]);
        }

        $request->validate([
            'title' => 'required|string'
        ]);

        $item->update([
            'title' => $request->title
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Rename Item berhasil diubah !!!',
            'data' => $item
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteItemIdByChecklist($id, $item_id)
    {
        $checklist = Checklist::find($id);

        if(!$checklist) {
            return response()->json([
                'status' => 404,
                'message' => 'Checklist tidak ditemukan !!!'
            ]);
        }

        $item = $checklist->items()->find($item_id);

        if(!$item) {
            return response()->json([
                'status' => 404,
                'message' => 'Item tidak ditemukan !!!'
            ]);
        }
        
        $item->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Item Todo berhasil dihapus !!!'
        ]);
    }
}
