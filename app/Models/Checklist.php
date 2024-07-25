<?php

namespace App\Models;

use App\Traits\UseUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    protected $table = 'checklist';

    protected $fillable = [
        'title',
        'description'
    ];

    public function items()
    {
        return $this->hasMany(ItemTodoChecklist::class);
    }
}
