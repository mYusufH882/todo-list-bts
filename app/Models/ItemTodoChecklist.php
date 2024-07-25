<?php

namespace App\Models;

use App\Traits\UseUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTodoChecklist extends Model
{
    use HasFactory;

    protected $table = 'item_todo_checklist';

    protected $fillable = [
        'checklist_id',
        'title',
        'description',
        'status'
    ];

    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }
}
